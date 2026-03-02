<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbstractModel;
use Core\Excel;
use Core\Log;
use Core\Response;

class AdminAbstractsController extends Controller
{
  private AbstractModel $abstractModel;

  public function __construct()
  {
    parent::__construct();
    $this->abstractModel = new AbstractModel();
  }

  public function index()
  {
    Log::info('Absztraktok lista megnyitva', ['admin' => auth('admin')->email ?? null], 'admin');

    $abstracts = $this->paginator->data($this->abstractModel->findAllBy('type', EVENT_TYPE) ?? [])
      ->paginate(10);

    return Response::view('admin/abstracts/index', 'admin-layout', [
      'title' => 'Absztraktok',
      'abstracts' => $abstracts,
    ]);
  }

  public function download($id)
  {
    if (is_array($id)) {
      $id = $id[0] ?? null;
    }

    if (empty($id)) {
      return abort(404);
    }

    $abstract = $this->abstractModel->find($id);
    if (!$abstract) {
      Log::warning('Absztrakt nem található letöltéshez', ['id' => $id, 'admin' => auth('admin')->email ?? null], 'admin');
      return abort(404);
    }

    $type = $abstract->type ?? 'unknown';
    $fileName = $abstract->fileName ?? null;
    if (!$fileName) {
      Log::warning('Absztrakt fájlnév hiányzik', ['id' => $id, 'admin' => auth('admin')->email ?? null], 'admin');
      return abort(404);
    }

    $path = base_path('storage/uploads/abstracts/' . $type . '/' . $fileName);
    if (!is_file($path)) {
      Log::warning('Absztrakt fájl nem található', ['id' => $id, 'path' => $path, 'admin' => auth('admin')->email ?? null], 'admin');
      return abort(404);
    }

    $downloadName = $abstract->originalFileName ?? $fileName;
    Log::info('Absztrakt letöltés', ['id' => $id, 'file' => $downloadName, 'admin' => auth('admin')->email ?? null], 'admin');
    return Response::download($path, $downloadName);
  }


  public function export() {
    $abstracts = obj_to_arr($this->abstractModel->findAllBy('type', EVENT_TYPE)) ?? [];
    // export with Excel class and download
    $exporter = new Excel();
    $exporter->data($abstracts)
      ->download('absztraktok.xlsx');
     }
}
