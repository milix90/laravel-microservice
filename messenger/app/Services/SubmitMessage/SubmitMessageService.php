<?php

namespace App\Services\SubmitMessage;

use App\Entities\MessageEntity;
use App\Entities\MessageEntityAbstraction;
use App\Models\Message;
use App\Repositories\Message\MessageRepository;
use App\Repositories\Message\MessageRepositoryAbstraction;

class SubmitMessageService implements SubmitMessageServiceAbstraction
{
    /**
     * @var MessageEntityAbstraction
     */
    private MessageEntityAbstraction $MsgEntity;

    /**
     * @var MessageRepositoryAbstraction
     */
    private MessageRepositoryAbstraction $MsgRepository;

    public function __construct()
    {
        $this->MsgEntity = new MessageEntity();
        $this->MsgRepository = new MessageRepository(new Message);
    }

    /**
     * @param array $payload
     * @return void
     */
    public function submitNewMessage(array $payload): void
    {
        $this->MsgEntity
            ->setUserUuid($payload["user_uuid"])
            ->setUserEmail($payload["email"])
            ->setUserName($payload["name"])
            ->setMessage($payload["message"])
            ->setReceivedAt(now());

        $this->MsgRepository->createNewMessage($this->MsgEntity->toArray());
    }
}
