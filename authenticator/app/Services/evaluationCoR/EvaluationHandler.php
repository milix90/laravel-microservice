<?php

namespace App\Services\evaluationCoR;


abstract class EvaluationHandler
{
    /**
     * @var EvaluationHandler
     */
    protected EvaluationHandler $item;


    /**
     * @return void
     */
    abstract public function handle(): void;

    /**
     * @param EvaluationHandler $item
     * @return void
     */
    public function processWith(EvaluationHandler $item): void
    {
        $this->item = $item;
    }

    /**
     * @return void
     */
    protected function nextProcess(): void
    {
        if (isset($this->item)) {
            $this->item->handle();
        }
    }
}
