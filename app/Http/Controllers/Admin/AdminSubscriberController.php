<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Core\Log;
use Core\Response;

class AdminSubscriberController extends Controller
{
  private Subscriber $subscriber;

  public function __construct()
  {
    parent::__construct();
    $this->subscriber = new Subscriber();
  }

  public function index()
  {
    Log::info('Feliratkozók lista megnyitva', [
      'search' => $_GET['search'] ?? null,
      'admin' => auth('admin')->email ?? null
    ], 'admin');

    $data = $this->subscriber->getByConference(EVENT_TYPE) ?? [];
    $subscribers = $this->paginator->data($data)->filter($_GET['search'] ?? null, ['email', 'name'])->paginate(20);

    return Response::view('admin/subscribers/index', 'admin-layout', [
      'title' => 'Feliratkozók kezelése',
      'subscribers' => $subscribers,
    ]);
  }

  public function show($id)
  {
    $subscriber = $this->subscriber->find($id);
    if (!$subscriber) {
      Log::warning('Feliratkozó nem található', ['id' => $id, 'admin' => auth('admin')->email ?? null], 'admin');
      return abort(404);
    }

    Log::info('Feliratkozó megtekintése', ['id' => $id, 'email' => $subscriber->email ?? null, 'admin' => auth('admin')->email ?? null], 'admin');

    return Response::view('admin/subscribers/show', [
      'title' => 'Feliratkozó részletek',
      'subscriber' => $subscriber,
      'conferences' => $this->subscriber->getConferencesByEmail($subscriber->email ?? ''),
    ]);
  }

  public function destroy($id)
  {
    $subscriber = $this->subscriber->find($id);
    if (!$subscriber) {
      Log::warning('Feliratkozó nem található törléshez', ['id' => $id, 'admin' => auth('admin')->email ?? null], 'admin');
      return abort(404);
    }

    Log::info('Feliratkozó törlése: ' . ($subscriber->email ?? ''), ['admin' => auth('admin')->email ?? null], 'admin');
    $this->subscriber->destroy($id);
    Log::info('Feliratkozó törlés befejezve', ['deleted_id' => $id, 'deleted_email' => $subscriber->email ?? null, 'admin' => auth('admin')->email ?? null], 'admin');

    return $this->toast->success('Feliratkozó sikeresen törölve.')->back();
  }

  public function exportAll()
  {
    try {
      Log::info('Feliratkozók export indítva', ['admin' => auth('admin')->email ?? null], 'admin');
      $this->subscriber->exportSubscribersToExcel();
    } catch (\Throwable $e) {
      Log::error('Feliratkozók export hiba', ['message' => $e->getMessage(), 'admin' => auth('admin')->email ?? null], 'admin');
      return $this->toast->danger('Hiba történt az export során.')->back();
    }
  }

  public function exportFullByEvent()
  {
    try {
      Log::info('FTFL feliratkozók export indítva', ['admin' => auth('admin')->email ?? null], 'admin');
      $this->subscriber->exportSubscribersToExcelByConference(EVENT_TYPE, 'subscribers-ftfl.xlsx');
    } catch (\Throwable $e) {
      Log::error('FTFL feliratkozók export hiba', ['message' => $e->getMessage(), 'admin' => auth('admin')->email ?? null], 'admin');
      return $this->toast->danger('Hiba történt az export során.')->back();
    }
  }

  public function exportOnlySpeakers()
  {
    try {
      Log::info('Csak előadók export indítva', ['admin' => auth('admin')->email ?? null], 'admin');
      $this->subscriber->exportOnlySpeakersToExcel();
    } catch (\Throwable $e) {
      Log::error('Csak előadók export hiba', ['message' => $e->getMessage(), 'admin' => auth('admin')->email ?? null], 'admin');
      return $this->toast->danger('Hiba történt az export során.')->back();
    }
  }


  public function exportOnlyAttendee()
  {
    try {
      Log::info('Csak FTFL résztvevők export indítva', ['admin' => auth('admin')->email ?? null], 'admin');
      $this->subscriber->exportOnlyAttendeesToExcel();
    } catch (\Throwable $e) {
      Log::error('Csak FTFL résztvevők export hiba', ['message' => $e->getMessage(), 'admin' => auth('admin')->email ?? null], 'admin');
      return $this->toast->danger('Hiba történt az export során.')->back();
    }
  }

  public function create()
  {
    return abort(404);
  }

  public function store()
  {
    return abort(404);
  }

  public function edit($id)
  {
    return abort(404);
  }

  public function update($id)
  {
    return abort(404);
  }
}
