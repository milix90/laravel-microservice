<?php

namespace App\Services\UserLogout;

use App\Entities\EntityAbstraction;
use App\Entities\UserEntity;
use App\Entities\UserEntityAbstraction;
use App\Repositories\User\UserRepositoryAbstraction;
use Exception;

class UserLogoutService implements UserLogoutServiceAbstraction
{
    /**
     * @var UserRepositoryAbstraction
     */
    private UserRepositoryAbstraction $UserRepository;

    public function __construct(
        UserRepositoryAbstraction $userRepositoryAbstraction,
    ) {
        $this->UserRepository = $userRepositoryAbstraction;
    }

    /**
     * @throws Exception
     */
    public function doLogoutAuthUser(): void
    {
        $this->UserRepository->revokeLoggedInUserAuthTokens();
    }
}
