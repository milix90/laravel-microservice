<?php

namespace App\Services\SubmitMessage;

use App\Repositories\Msg\MessageRepositoryAbstraction;
use Illuminate\Http\Request;

class SubmitMessageService implements SubmitMessageServiceAbstraction
{
    private MessageRepositoryAbstraction $msgRepo;

    public function __construct(MessageRepositoryAbstraction $msgRepo)
    {
        $this->msgRepo = $msgRepo;
    }

    public function submitMessage(Request $request): array
    {
        $payload = array_merge($request->attributes->get('user'), $request->all());
        return $this->msgRepo->submitMessage($payload);
    }
}
