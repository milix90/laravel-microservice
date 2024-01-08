<?php

namespace App\Entities;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class MessageEntity implements MessageEntityAbstraction
{
    /**
     * @var int|null
     */
    private ?int $id;
    /**
     * @var string|null
     */
    private ?string $uuid;

    /**
     * @var string
     */
    private string $userUuid;

    /**
     * @var string
     */
    private string $userEmail;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var DateTime|null
     */
    private ?DateTime $receivedAt = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MessageEntity
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return MessageEntity
     */
    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserUuid(): string
    {
        return $this->userUuid;
    }

    /**
     * @param string $userUuid
     * @return MessageEntity
     */
    public function setUserUuid(string $userUuid): self
    {
        $this->userUuid = $userUuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     * @return MessageEntity
     */
    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return MessageEntity
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return MessageEntity
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReceivedAt(): DateTime
    {
        return $this->receivedAt;
    }

    /**
     * @param DateTime $receivedAt
     * @return MessageEntity
     */
    public function setReceivedAt(DateTime $receivedAt): self
    {
        $this->receivedAt = $receivedAt;
        return $this;
    }

    /**
     * @param Model $model
     * @return EntityAbstraction
     */
    public function fromObject(Model $model): self
    {
        $this->id = $model->id ?? 0;
        $this->uuid = $model->uuid ?? "";
        $this->userUuid = $model->user_uuid ?? "";
        $this->userEmail = $model->user_email ?? "";
        $this->userName = $model->user_name ?? "";
        $this->message = $model->message ?? "";
        $this->receivedAt = $model->received_at ?? null;
        return $this;
    }

    /**
     * @param array $data
     * @return EntityAbstraction
     */
    public function fromArray(array $data): self
    {
        $this->id = $data["id"] ?? 0;
        $this->uuid = $data["uuid"] ?? "";
        $this->userUuid = $data["user_uuid"] ?? "";
        $this->userEmail = $data["user_email"] ?? "";
        $this->userName = $data["user_name"] ?? "";
        $this->message = $data["message"] ?? "";
        $this->receivedAt = $data["received_at"] ?? null;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "id" => $this->id ?? 0,
            "uuid" => $this->uuid ?? "",
            "user_uuid" => $this->userUuid ?? "",
            "user_email" => $this->userEmail ?? "",
            "user_name" => $this->userName ?? "",
            "message" => $this->message ?? "",
            "received_at" => $this->receivedAt?->format("Y-m-d H:i:s.u") ?? null,
        ];
    }
}
