<?php

namespace App\Services\UserLogout;

use App\Entities\UserEntity;

interface UserLogoutServiceAbstraction
{
    public function doLogoutAuthUser(): void;
}
