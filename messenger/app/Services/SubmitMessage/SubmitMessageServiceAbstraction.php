<?php

namespace App\Services\SubmitMessage;

interface SubmitMessageServiceAbstraction
{
    public function submitNewMessage(array $payload): void;
}
