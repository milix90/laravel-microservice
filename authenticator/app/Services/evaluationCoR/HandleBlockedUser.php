<?php

namespace App\Services\evaluationCoR;

use App\Constants\AuthService;
use App\Entities\UserEntityAbstraction;
use App\Exceptions\Custom\UserBlockedException;
use App\Repositories\User\UserRepositoryAbstraction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HandleBlockedUser extends EvaluationHandler
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
    public function __construct(?Model $model, UserEntityAbstraction $entity, UserRepositoryAbstraction $repo)
    {
        $this->model = $model;
        $this->entity = $entity;
        $this->repo = $repo;
    }

    /**
     * @return void
     * @throws UserBlockedException
     */
    public function handle(): void
    {
        if (!$this->entity->getActive()) {
            if (Carbon::now()->diffInMinutes($this->entity->getUpdatedAt()) <= AuthService::BLOCK_PERIOD) {
                throw new UserBlockedException();
            } else {
                $this->repo->handleLoginAttemptCounter($this->model, $this->entity);
                $this->repo->modifyUserActiveStatus($this->model);
            }
        }

        $this->nextProcess();
    }
}
