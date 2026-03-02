<?php

use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\SubscriptionController;

$router->get('/subscription', [SubscriptionController::class, 'index']);
$router->post('/subscription', [SubscriptionController::class, 'store']);

$router->resources('/admin/subscribers', AdminSubscriberController::class, ['admin']);
$router->get('/admin/subscribers/export/full', [AdminSubscriberController::class, 'exportFullByEvent'])->middleware(['admin']);
$router->get('/admin/subscribers/export/all', [AdminSubscriberController::class, 'exportAll'])->middleware(['admin']);
$router->get('/admin/subscribers/export/speakers', [AdminSubscriberController::class, 'exportOnlySpeakers'])->middleware(['admin']);
$router->get('/admin/subscribers/export/attendees', [AdminSubscriberController::class, 'exportOnlyAttendee'])->middleware(['admin']);