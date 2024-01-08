<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

interface EntityAbstraction
{
    public function fromObject(Model $model): self;

    public function fromArray(array $data): self;

    public function toArray(): array;
}

