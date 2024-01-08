<?php

namespace App\Services\evaluationCoR;

use App\Constants\AuthService;
use App\Entities\UserEntityAbstraction;
use App\Exceptions\Custom\InvalidPasswordException;
use App\Repositories\User\UserRepositoryAbstraction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ValidatePasswordCompatibility extends EvaluationHandler
{
    /**
     * @var Model|null
     */
    private ?Model $model;

    /**
     * @var UserEntityAbstraction
     */
    private UserEntityAbstraction $entity;

    /**
     * @var UserRepositoryAbstraction
     */
    private UserRepositoryAbstraction $repo;

    /**
     * @param Model|null $model
     * @param UserEntityAbstraction $entity
     * @param UserRepositoryAbstraction $repo
     */
    public function __construct(
        ?Model $model,
        UserEntityAbstraction &$entity,
        UserRepositoryAbstraction $repo,
    ) {
        $this->model = $model;
        $this->entity = $entity;
        $this->repo = $repo;
    }

    /**
     * @inheritDoc
     * @throws InvalidPasswordException
     */
    public function handle(): void
    {
        if (!Hash::check(request("password"), $this->entity->getPassword())) {
            $this->repo->handleLoginAttemptCounter($this->model, $this->entity);

            if ($this->entity->getLoginAttempt() == AuthService::MAX_LOGIN_ATTEMPT) {
                $this->repo->modifyUserActiveStatus($this->model);
            }

            throw new InvalidPasswordException();
        }

        $this->nextProcess();
    }
}
