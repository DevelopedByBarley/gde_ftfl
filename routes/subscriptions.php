<?php

use App\Http\Controllers\SubscriptionController;

  $router->get('/subscription', [SubscriptionController::class, 'index']);
  $router->post('/subscription', [SubscriptionController::class, 'store']);
?>  