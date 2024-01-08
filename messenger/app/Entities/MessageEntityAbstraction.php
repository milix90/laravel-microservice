<?php

namespace App\Entities;

use DateTime;

interface MessageEntityAbstraction extends EntityAbstraction
{
    public function getUuid(): string;

    public function setUuid(string $uuid): self;

    public function getUserUuid(): string;

    public function setUserUuid(string $userUuid): self;

    public function getUserEmail(): string;

    public function setUserEmail(string $userEmail): self;

    public function getUserName(): string;

    public function setUserName(string $userName): self;

    public function getMessage(): string;

    public function setMessage(string $message): self;

    public function getReceivedAt(): DateTime;

    public function setReceivedAt(DateTime $receivedAt): self;
}
