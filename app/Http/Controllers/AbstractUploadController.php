<?php

namespace App\Http\Controllers;

use Core\Response;
use Core\Session;
use Core\ValidationException;

class AbstractUploadController extends Controller
{
  private $abstractModel;
  private $type = 'ftfl';

  public function __construct()
  {
    parent::__construct();
    $this->abstractModel = new \App\Models\AbstractModel();
  }


  public function index()
  {
    return Response::view('abstracts/index', 'layout');
  }

  public function store()
  {
    try {
      $file = $this->request->file('abstract_file');

      $validated = $this->request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100', 'split', 'alpha'],
        'email' => ['required', 'email', 'max:255'],
      ]);

      // Validate file size
      if ($file['size'] > 5 * 1024 * 1024) { // 5MB limit
        $this->toast->danger('Az absztrakt fájl mérete nem haladhatja meg az 5MB-ot.')->back();
      }
      
      // Set whitelist before adding the file
      $savedFileName = $this->storage
        ->setWhiteList(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
        ->file($file)
        ->save('/storage/uploads/abstracts/' . $this->type);

      if (!$savedFileName) {
        $this->toast->danger('Az absztrakt feltöltése nem sikerült. Kérjük próbálja meg újra.')->back();
      }

      $validated['fileName'] = $savedFileName;
      $validated['originalFileName'] = $file['name'];
      $validated['type'] = $this->type;
      $validated['created_at'] = date('Y-m-d H:i:s');

      $last_id = $this->abstractModel->create($validated);

      if(!$last_id) {
        $this->storage->deletePrevImages('/storage/uploads/abstracts/ai', [$savedFileName]);
        $this->toast->danger('Az absztrakt adatbázisba mentése nem sikerült. Kérjük próbálja meg újra.')->back();
      }

      $this->toast->success('Az absztrakt feltöltése sikeres!')->back();
    } catch (ValidationException $e) {
      Session::flash('errors', $e->errors);
      Session::flash('old', $e->old);
      $this->toast->danger('Validation failed. Please check your input and try again.')->back();
    }
  }
}

