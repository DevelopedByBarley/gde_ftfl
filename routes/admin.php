<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSubscriberController;

$router->resources('admins', AdminController::class, ['admin']);
$router->get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin');
$router->get('/admin/invite/accept', [AdminController::class, 'acceptInviteForm']);
$router->post('/admin/invite/accept', [AdminController::class, 'acceptInvite']);

require base_path('routes/activities.php');
