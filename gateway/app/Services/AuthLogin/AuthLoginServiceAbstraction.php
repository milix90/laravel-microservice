<?php

namespace App\Services\AuthLogin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface AuthLoginServiceAbstraction
{
    public function login(Request $request): array;
}
