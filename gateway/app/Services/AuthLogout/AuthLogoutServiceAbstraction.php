<?php

namespace App\Services\AuthLogout;

use Illuminate\Http\Request;

interface AuthLogoutServiceAbstraction
{
    public function logout(Request $request): array;
}
