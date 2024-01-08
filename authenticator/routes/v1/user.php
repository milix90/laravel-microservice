<?php

use App\Http\Controllers\api\v1\AuthManagementController;
use Illuminate\Routing\Router;

/** @var Router $router */

$router->post("login", [AuthManagementController::class, "login"])->name("login");

$router->group(["middleware" => ["auth:sanctum"]], function ($router) {
    $router->get("inquire", [AuthManagementController::class, "inquire"])->name("inquire");
    $router->post("logout", [AuthManagementController::class, "logout"])->name("logout");
});
