<?php

namespace App\Services\evaluationCoR;

use App\Entities\UserEntityAbstraction;
use Exception;
use Illuminate\Database\Eloquent\Model;

class GenerateAccessToken extends EvaluationHandler
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
     * @param Model|null $model
     * @param UserEntityAbstraction $entity
     */
    public function __construct(?Model $model, UserEntityAbstraction &$entity)
    {
        $this->model = $model;
        $this->entity = $entity;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(): void
    {
        try {
            $token = $this->model->createToken(config("custom.auth-token"), ['*'], now()->addDay())->plainTextToken;
            $this->entity->setAccessToken($token);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        $this->nextProcess();
    }
}
