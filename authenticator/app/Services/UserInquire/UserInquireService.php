<?php

namespace App\Services\UserInquire;

use App\Entities\UserEntity;
use App\Entities\UserEntityAbstraction;
use App\Repositories\User\UserRepositoryAbstraction;
use App\Traits\UserServiceTrait;
use Exception;

class UserInquireService implements UserInquireServiceAbstraction
{
    use UserServiceTrait;

    /**
     * @var UserEntityAbstraction
     */
    private UserEntityAbstraction $UserEntity;

    /**
     * @var UserRepositoryAbstraction
     */
    private UserRepositoryAbstraction $UserRepository;

    public function __construct(
        UserRepositoryAbstraction $userRepositoryAbstraction,
    ) {
        $this->UserEntity = new UserEntity();
        $this->UserRepository = $userRepositoryAbstraction;
    }

    /**
     * @throws Exception
     */
    public function inquireLoggedInUser(): array
    {
        $user = $this->UserRepository->retrieveLoggedInUser();

        [
            $checkUser,
            $handleBlock,
        ] = $this->userEvaluationFlows(
            $user,
            $this->UserEntity,
            $this->UserRepository
        );

        $checkUser->processWith($handleBlock);
        $checkUser->handle();

        return [
            "user_uuid" => $this->UserEntity->getUuid(),
            "name" => $this->UserEntity->getName(),
            "email" => $this->UserEntity->getEmail(),
        ];
    }
}
