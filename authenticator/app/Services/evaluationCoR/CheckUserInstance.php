<?php

namespace App\Services\evaluationCoR;

use App\Entities\UserEntityAbstraction;
use App\Exceptions\Custom\UserNotFoundException;
use Illuminate\Database\Eloquent\Model;

class CheckUserInstance extends EvaluationHandler
{
    /**
     * @var Model|null
     */
    private ?Model $model;
    private UserEntityAbstraction $entity;

    /**
     * @param Model|null $model
     * @param UserEntityAbstraction $entity
     */
    public function __construct(?Model $model, UserEntityAbstraction &$entity)
    {
        $this->model = $model;
        $this->entity = $entity;
    }

    /**
     * @throws UserNotFoundException
     */
    public function handle(): void
    {
        if (is_null($this->model)) {
            throw new UserNotFoundException();
        } else {
            $this->entity->fromObject($this->model);
        }

        $this->nextProcess();
    }
}
