<?php

namespace App\Repositories\Auth;

use Illuminate\Http\JsonResponse;

interface AuthRepositoryAbstraction
{
    public function login(array $payload): array;

    public function inquire(): array;

    public function logout(): array;
}
