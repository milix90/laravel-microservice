<?php

namespace App\Repositories\Msg;

interface MessageRepositoryAbstraction
{
    public function submitMessage(array $payload): array;
}
