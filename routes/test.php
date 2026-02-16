<?php

use App\Http\Controllers\TestController;


$router->get('/test', [TestController::class, 'index']);