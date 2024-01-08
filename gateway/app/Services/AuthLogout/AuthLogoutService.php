<?php

namespace App\Services\AuthLogout;

use App\Repositories\Auth\AuthRepositoryAbstraction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthLogoutService implements AuthLogoutServiceAbstraction
{
    private AuthRepositoryAbstraction $authRepo;

    public function __construct(AuthRepositoryAbstraction $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function logout(Request $request): array
    {
        return $this->authRepo->logout();
    }
}
