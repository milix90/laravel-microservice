<?php

namespace App\Repositories\Msg;

use Mindwingx\ServiceCallAdapter\ServiceCall;

class MessageRepository implements MessageRepositoryAbstraction
{

    public function submitMessage(array $payload): array
    {
        return ServiceCall::handle()->Messenger($payload);
    }
}
