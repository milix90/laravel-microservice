<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;
use Mindwingx\ServiceCallAdapter\ServiceCall;

class AuthRepository extends BaseRepository implements AuthRepositoryAbstraction
{
    public function login(array $payload): array
    {
        return ServiceCall::handle()->Authenticator($payload);
    }

    public function inquire(): array
    {
        return ServiceCall::handle()->Authenticator();
    }

    public function logout(): array
    {
        return ServiceCall::handle()->Authenticator();
    }
}
