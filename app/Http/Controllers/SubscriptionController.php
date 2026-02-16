<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Core\Response;
use Core\Session;
use Core\ValidationException;

class SubscriptionController extends Controller
{

  private Subscriber $subscriber;

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
      $validated = $this->request->validate([
        'registration_type' => ['required', 'string', 'in:attendee|speaker'],
        'name' => ['required', 'string', 'min:3', 'max:100', 'split', 'alpha'],
        'email' => ['required', 'email', 'max:255'],
        'company' => ['required', 'string', 'min:2', 'max:255'],
        'phone' => ['required', 'phone'],
        'speaker_talk_title' => ['nullable', 'string', 'max:255'],
        'speaker_talk_summary' => ['nullable', 'string', 'max:3000'],
        'conferences' => ['required', 'array'],
        'terms_agree' => ['required', 'boolean'],
      ]);


      if ($validated['registration_type'] === 'speaker') {
        $errors = [];

        if (empty($validated['speaker_talk_title'] ?? null)) {
          $errors['speaker_talk_title']['errors'][] = 'Kitöltés kötelező!';
        }

        if (empty($validated['speaker_talk_summary'] ?? null)) {
          $errors['speaker_talk_summary']['errors'][] = 'Kitöltés kötelező!';
        }

        if (!empty($errors)) {
          ValidationException::throw($errors, $validated);
        }
      }

      $validated['conferences'] = json_encode($validated['conferences']);

      
      $created_id = $this->subscriber->create($validated);
      dd($validated);


      if (!$created_id) {
        $this->toast->danger('Subscription could not be created. Please try again later.')->back();
      }

      $this->toast->success('Subscription created successfully!')->back();
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      dd($e->errors);
      $this->toast->danger('Validation failed. Please check your input and try again.')->back();
    }
  }
}
