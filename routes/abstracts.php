<?php

use App\Http\Controllers\AbstractUploadController;
use App\Http\Controllers\Admin\AdminAbstractsController;

$router->get('/admin/abstracts', [AdminAbstractsController::class, 'index'])->middleware(['admin']);
$router->get('/admin/abstracts/download/{id}', [AdminAbstractsController::class, 'download'])->middleware(['admin']);

$router->get('/admin/abstracts/export', [AdminAbstractsController::class, 'export'])->middleware(['admin']);
  
$router->get('/absztrakt', [AbstractUploadController::class, 'index']);
$router->post('/absztrakt', [AbstractUploadController::class, 'store']);

?>
