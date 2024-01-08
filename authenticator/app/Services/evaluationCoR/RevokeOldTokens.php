<?php

namespace App\Services\evaluationCoR;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class RevokeOldTokens extends EvaluationHandler
{
    /**
     * @var Model|null
     */
    private ?Model $model;

    /**
     * @param Model|null $model
     */
    public function __construct(?Model $model)
    {
        $this->model = $model;
    }


    /**
     * @inheritDoc
     * @throws ValidationException
     * @throws Exception
     */
    public function handle(): void
    {
        try {
            ($this->model->tokens()->count() > 0) && $this->model->tokens()->delete();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        $this->nextProcess();
    }
}
