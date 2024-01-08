<?php

namespace App\Traits;

use App\Entities\UserEntityAbstraction;
use App\Repositories\User\UserRepositoryAbstraction;
use App\Services\evaluationCoR\CheckUserInstance;
use App\Services\evaluationCoR\GenerateAccessToken;
use App\Services\evaluationCoR\HandleBlockedUser;
use App\Services\evaluationCoR\RevokeOldTokens;
use App\Services\evaluationCoR\ValidatePasswordCompatibility;
use Illuminate\Database\Eloquent\Model;

trait UserServiceTrait
{
    /**
     * @param Model|null $user
     * @param UserEntityAbstraction $entity
     * @param UserRepositoryAbstraction $repo
     * @return array
     */
    public function userEvaluationFlows(
        ?Model $user,
        UserEntityAbstraction $entity,
        UserRepositoryAbstraction $repo
    ): array {
        return [
            new CheckUserInstance($user, $entity),
            new HandleBlockedUser($user, $entity, $repo),
            new RevokeOldTokens($user),
            new ValidatePasswordCompatibility($user, $entity, $repo),
            new GenerateAccessToken($user, $entity)
        ];
    }
}
