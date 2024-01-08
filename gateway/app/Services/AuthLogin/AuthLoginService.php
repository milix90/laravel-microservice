<?php

namespace App\Services\AuthLogin;

use App\Repositories\Auth\AuthRepositoryAbstraction;
use Illuminate\Http\Request;

class AuthLoginService implements AuthLoginServiceAbstraction
{
    private AuthRepositoryAbstraction $authRepo;

    public function __construct(AuthRepositoryAbstraction $authRepo)
    {
        $this->authRepo = $authRepo;
    }


    public function login(Request $request): array
    {
        return $this->authRepo->login($request->all());
    }
}
