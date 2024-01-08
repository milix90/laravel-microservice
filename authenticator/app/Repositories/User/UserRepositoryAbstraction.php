<?php

namespace App\Repositories\User;

use App\Entities\UserEntityAbstraction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryAbstraction
{
    public function retrieveUserByField(string $field, mixed $value): ?Model;

    public function retrieveLoggedInUser(): ?Model;

    public function modifyUserActiveStatus(Model $model): void;

    public function revokeLoggedInUserAuthTokens(): void;

    public function handleLoginAttemptCounter(User $model, UserEntityAbstraction &$ue): void;
}
