<?php

use App\Http\Controllers\api\v1\MessageController;
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(["middleware" => ["has.token", "user.inquire"]], function ($router) {
    $router->post("message/submit", [MessageController::class, "submitMessage"])->name("submit");
});
