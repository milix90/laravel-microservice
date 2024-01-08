<?php

namespace App\Entities;

use DateTime;

interface UserEntityAbstraction extends EntityAbstraction
{
    public function getId(): int;

    public function setId(int $id): self;

    public function getUuid(): string;

    public function setUuid(string $uuid): self;

    public function getName(): string;

    public function setName(string $name): self;

    public function getEmail(): string;

    public function setEmail(string $email): self;

    public function getEmailVerifiedAt(): string;

    public function setEmailVerifiedAt(DateTime $emailVerifiedAt): self;

    public function getPassword(): string;

    public function setPassword(string $password): self;

    public function getLoginAttempt(): int;

    public function setLoginAttempt(int $attempt): self;

    public function getActive(): bool;

    public function setActive(bool $active): self;

    public function getCreatedAt(): string;

    public function setCreatedAt(DateTime $createdAt): self;

    public function getUpdatedAt(): string;

    public function setUpdatedAt(DateTime $updatedAt): self;

    // not a model based property

    public function getAccessToken(): string;

    public function setAccessToken(string $token): self;
}
