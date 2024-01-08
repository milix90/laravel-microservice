<?php

namespace App\Services\UserLogin;

use App\Entities\UserEntity;
use App\Entities\UserEntityAbstraction;
use App\Exceptions\Custom\UserNotFoundException;
use App\Repositories\User\UserRepositoryAbstraction;
use App\Traits\UserServiceTrait;
use Exception;

class UserLoginService implements UserLoginServiceAbstraction
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

    public function __construct(UserRepositoryAbstraction $userRepository)
    {
        $this->UserEntity = new UserEntity();
        $this->UserRepository = $userRepository;
    }

    /**
     * @param array $payload
     * @return array|Exception
     * @throws UserNotFoundException
     */
    public function doLogin(array $payload): array|Exception
    {
        $user = $this->UserRepository->retrieveUserByField("email", $payload["email"]);

        [
            $checkUser,
            $handleBlock,
            $revokeOldTokens,
            $checkPassword,
            $generateToken
        ] = $this->userEvaluationFlows(
            $user,
            $this->UserEntity,
            $this->UserRepository
        );

        $checkUser->processWith($handleBlock);
        $handleBlock->processWith($checkPassword);
        $checkPassword->processWith($revokeOldTokens);
        $revokeOldTokens->processWith($generateToken);
        $checkUser->handle();

        return [
            "access_token" => $this->UserEntity->getAccessToken(),
            "user_uuid" => $this->UserEntity->getUuid(),
            "name" => $this->UserEntity->getName(),
            "email" => $this->UserEntity->getEmail(),
        ];
    }
}
