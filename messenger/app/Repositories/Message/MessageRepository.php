<?php

namespace App\Repositories\Message;

use App\Models\Message;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class MessageRepository extends BaseRepository implements MessageRepositoryAbstraction
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function createNewMessage(array $payload): Model
    {
        return $this->model->query()->create($payload);
    }
}
