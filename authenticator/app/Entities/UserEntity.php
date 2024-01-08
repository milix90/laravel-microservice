<?php

namespace App\Entities;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class UserEntity implements EntityAbstraction, UserEntityAbstraction
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $uuid;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var DateTime|null
     */
    private ?DateTime $emailVerifiedAt;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var int
     */
    private int $loginAttempt;

    /**
     * @var bool
     */
    private bool $active;

    /**
     * @var DateTime|null
     */
    private ?DateTime $createdAt;

    /**
     * @var DateTime|null
     */
    private ?DateTime $updatedAt;

    /**
     * @var string
     */
    private string $token;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserEntity
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
     * @return UserEntity
     */
    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserEntity
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailVerifiedAt(): string
    {
        return $this->emailVerifiedAt;
    }

    /**
     * @param DateTime $emailVerifiedAt
     * @return UserEntity
     */
    public function setEmailVerifiedAt(DateTime $emailVerifiedAt): self
    {
        $this->emailVerifiedAt = $emailVerifiedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserEntity
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getLoginAttempt(): int
    {
        return $this->loginAttempt;
    }

    /**
     * @param int $attempt
     * @return UserEntity
     */
    public function setLoginAttempt(int $attempt): UserEntity
    {
        $this->loginAttempt = $attempt;
        return $this;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return UserEntity
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt->format("Y-m-d H:i:s.u");
    }

    /**
     * @param DateTime $createdAt
     * @return UserEntity
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format("Y-m-d H:i:s.u");
    }

    /**
     * @param DateTime $updatedAt
     * @return UserEntity
     */
    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function fromObject(Model $model): self
    {
        $this->id = $model->id ?? 0;
        $this->uuid = $model->uuid ?? "";
        $this->name = $model->name ?? "";
        $this->email = $model->email ?? "";
        $this->emailVerifiedAt = $model->email_verified_at ?? null;
        $this->password = $model->password ?? "";
        $this->loginAttempt = $model->login_attempt ?? 0;
        $this->active = $model->active ?? false;
        $this->createdAt = $model->created_at ?? null;
        $this->updatedAt = $model->updated_at ?? null;

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data): self
    {
        $this->id = $data["id"] ?? 0;
        $this->uuid = $data["uuid"] ?? "";
        $this->name = $data["name"] ?? "";
        $this->email = $data["email"] ?? "";
        $this->emailVerifiedAt = $data["email_verified_at"] ?? null;
        $this->password = $data["password"] ?? "";
        $this->loginAttempt = $model["login_attempt"] ?? 0;
        $this->active = $data["active"] ?? false;
        $this->createdAt = $data["created_at"] ?? null;
        $this->updatedAt = $data["updated_at"] ?? null;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "uuid" => $this->uuid,
            "name" => $this->name,
            "email" => $this->email,
            "email_verified_at" => $this->emailVerifiedAt,
            "password" => $this->password,
            "login_attempt" => $this->loginAttempt,
            "active" => $this->active,
            "created_at" => $this->createdAt->format("Y-m-d H:i:s.u"),
            "updated_at" => $this->updatedAt->format("Y-m-d H:i:s.u"),
        ];
    }

    // not a model based property

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return UserEntity
     */
    public function setAccessToken(string $token): UserEntity
    {
        $this->token = $token;
        return $this;
    }
}
