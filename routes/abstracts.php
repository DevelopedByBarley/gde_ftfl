<?php

use App\Http\Controllers\AbstractUploadController;

$router->get('/absztrakt', [AbstractUploadController::class, 'index']);
$router->post('/absztrakt', [AbstractUploadController::class, 'store']);

?>
