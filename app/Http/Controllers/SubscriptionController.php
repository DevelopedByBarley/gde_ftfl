<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Core\Response;
use Core\Session;
use Core\ValidationException;

class SubscriptionController extends Controller
{

  private Subscriber $subscriber;
  const ABSTRACT_UPLOAD_URLS = [
    'ai' => 'https://aikonferencia.gde.hu/absztrakt',
    'ftfl' => 'https://ftfl.gde.hu/absztrakt',
    'drone' => 'https://dronkonferencia.gde.hu/absztrakt',
    'fsft' => 'https://informaciobiztonsag.gde.hu/absztrakt',
  ];
  private $short_map = [
    'artificial_intelligence' => 'FIFI',
    'ftfl' => 'FTFL',
    'drone_technology' => 'FDFV',
    'information_security' => 'FSFT', // Assuming info security uses drone URL
  ];

  public function __construct()
  {
    parent::__construct();
    $this->subscriber = new Subscriber();
  }


  public function index()
  {
    return Response::view('subscriptions/index', 'layout');
  }

  public function store()
  {
    try {
      // Validate the incoming request data
      $validated = $this->request->validate([
        'registration_type' => ['required', 'string', 'in:attendee|speaker'],
        'participation_type' => ['required', 'string', 'in:online|inperson'],
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email', 'max:255'],
        'company' => ['required', 'string', 'min:2', 'max:255'],
        'phone' => ['required', 'min:5', 'max:20'],
        'speaker_talk_title' => ['nullable', 'string', 'max:255'],
        'speaker_talk_summary' => ['nullable', 'string', 'max:3000'],
        'conferences' => ['required'],
        'terms_agree' => ['required', 'boolean'],
      ]);

      $validated['is_erasmus'] = isset($_POST['is_erasmus']) && $_POST['is_erasmus'] == '1' ? 1 : 0;

      $allowed = ['artificial_intelligence', 'information_security', 'drone_technology', 'ftfl'];
      $c = $validated['conferences'] ?? null;

      if (!is_array($c)) {
        Session::flash('errors', ['conferences' => ['errors' => ['Legalább egy konferenciát ki kell választani.']]]);
        $this->toast->danger('Legalább egy konferenciát ki kell választani.')->back();
      }

      $c = array_values(array_filter(array_map(fn($v) => is_string($v) ? trim($v) : '', $c)));
      $c = array_values(array_diff($c, ['', 'null', 'NULL']));

      if (!$c || array_diff($c, $allowed) || (($validated['registration_type'] ?? '') === 'speaker' && count($c) > 1)) {
        Session::flash('errors', ['conferences' => ['errors' => ['Érvénytelen konferencia választás.']]]);
        $this->toast->danger('Érvénytelen konferencia választás.')->back();
      }

      $validated['conferences'] = $c;

      // Check if registration type is speaker and if so, we allow only one conference selection
      if ($validated['registration_type'] === 'speaker' && count($validated['conferences']) > 1) {
        $errorMessage = 'Előadóként csak egy konferenciára lehet regisztrálni.';
        Session::flash('old', $validated);
        Session::flash('errors', ['conferences' => ['errors' => [$errorMessage]]]);
        $this->toast->danger($errorMessage)->back();
      }

      // Check if the user subscribed to conferences  
      $existing_conferences = $this->subscriber->getConferencesByEmail($validated['email']);
      $duplicate_conferences = array_intersect($existing_conferences, $validated['conferences']);



      if (!empty($duplicate_conferences)) {
        // Map conference values to titles based on current language
        $confItems = lang('welcome__registration.all_conf_items');
        $valueToTitle = [];
        foreach ($confItems as $item) {
          $valueToTitle[$item['value']] = $item['title'];
        }

        $duplicateTitles = array_map(function ($value) use ($valueToTitle) {
          return $valueToTitle[$value] ?? $value;
        }, $duplicate_conferences);

        $errorMessage = lang('welcome__registration.already_subscribed') . implode(', ', $duplicateTitles);
        Session::flash('old', $validated);
        Session::flash('errors', ['conferences' => ['errors' => [$errorMessage]]]);
        $this->toast->danger($errorMessage)->back();
      }

      // Additional validation for speaker registration type
      if ($validated['registration_type'] === 'speaker') {
        $errors = [];

        // Check if speaker talk title and summary are provided
        if (empty($validated['speaker_talk_title'] ?? null)) {
          $errors['speaker_talk_title']['errors'][] = 'Kitöltés kötelező!';
        }

        // Check if speaker talk summary is provided
        if (empty($validated['speaker_talk_summary'] ?? null)) {
          $errors['speaker_talk_summary']['errors'][] = 'Kitöltés kötelező!';
        }

        // If there are validation errors, throw a ValidationException
        if (!empty($errors)) {
          ValidationException::throw($errors, $validated);
        }
      }

      $validated['conferences'] = json_encode($validated['conferences']);
      $validated['created_at'] = date('Y-m-d H:i:s');

      $created_id = $this->subscriber->create($validated);

      // If creation failed, show error message and return back!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      if (!$created_id) {
        $this->toast->danger(lang('welcome__registration.subscription_failed'))->back();
      }



      $new_conferences = json_decode($validated['conferences'], true);

      // Determine language from cookie
      $lang = explode('-', $_COOKIE['lang'] ?? 'hu-HU')[0];
      $templateName = 'feedback-' . $lang;

      // Map conference values to translated titles
      $confItems = lang('welcome__registration.all_conf_items');
      $valueToTitle = [];
      foreach ($confItems as $item) {
        $valueToTitle[$item['value']] = $item['title'];
      }

      // Translate conference values to titles
      $new_conference_titles = array_map(function ($value) use ($valueToTitle) {
        return $valueToTitle[$value] ?? $value;
      }, $new_conferences);

      $existing_conference_titles = array_map(function ($value) use ($valueToTitle) {
        return $valueToTitle[$value] ?? $value;
      }, $existing_conferences);


      // Filter abstract URLs to only include URLs for new conferences
      $new_conference_urls = [];
      if ($validated['registration_type'] === 'speaker') {
        foreach ($new_conferences as $conf_value) {
          // Map the abstract URL keys to conference values
          $url_map = [
            'artificial_intelligence' => 'ai',
            'ftfl' => 'ftfl',
            'drone_technology' => 'drone',
            'information_security' => 'fsft', // Assuming info security uses drone URL
          ];

          if (isset($url_map[$conf_value]) && isset(self::ABSTRACT_UPLOAD_URLS[$url_map[$conf_value]])) {
            $new_conference_urls[$url_map[$conf_value]] = self::ABSTRACT_UPLOAD_URLS[$url_map[$conf_value]];
          }
        }
      }

      
      $conferences_string_by_short = implode(', ', array_map(function($conf) {
        return $this->short_map[$conf] ?? $conf;
      }, $new_conferences));

      $paricipation_type_str = $validated['participation_type'] === 'online' ? (($_COOKIE['lang'] === 'en') ? 'Online' : 'Online') : (($_COOKIE['lang'] === 'en') ? 'In Person' : 'Személyes');
      $subject = lang('subscription-mail__subject') . ' - ' . $conferences_string_by_short;
      $this->mailer->prepare($validated['email'], $subject)
        ->template($templateName, [
          'name' => $validated['name'],
          'participation_type' => $paricipation_type_str,
          'registration_type' => $validated['registration_type'],
          'new_conferences' => $new_conference_titles,
          'existing_conferences' => $existing_conference_titles,
          'abstract_urls' => $new_conference_urls,
        ])
        ->send();

      $this->toast->success(lang('welcome__registration.subscription_success'))->back();
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      $this->toast->danger('Validation failed. Please check your input and try again.')->back();
    }
  }
}
