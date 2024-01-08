<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Routing\Router;

/** @var Router $router */

//public routes
$router->post("login", [AuthController::class, "login"])->name("login");

// protected routes
$router->group(["middleware" => ["has.token"]], function ($router) {
    $router->get("inquire", [AUthController::class, "inquire"])->name("inquire");
    $router->post("logout", [AUthController::class, "logout"])->name("logout");
});
