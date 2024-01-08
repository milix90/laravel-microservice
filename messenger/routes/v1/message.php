<?php

use App\Http\Controllers\api\v1\MessageController;
use Illuminate\Routing\Router;

/** @var Router $router */

$router->post("message/submit", MessageController::class)->name("submit");
