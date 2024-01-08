<?php

namespace App\Repositories\Message;

use Illuminate\Database\Eloquent\Model;

interface MessageRepositoryAbstraction
{
    public function createNewMessage(array $payload): Model;
}
