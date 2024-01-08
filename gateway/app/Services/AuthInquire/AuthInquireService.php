<?php

namespace App\Services\AuthInquire;

use App\Repositories\Auth\AuthRepositoryAbstraction;
use Illuminate\Http\Request;

class AuthInquireService implements AuthInquireServiceAbstraction
{
    private AuthRepositoryAbstraction $authRepo;

    public function __construct(AuthRepositoryAbstraction $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function inquire(Request $request): array
    {
        return $this->authRepo->inquire();
    }
}
