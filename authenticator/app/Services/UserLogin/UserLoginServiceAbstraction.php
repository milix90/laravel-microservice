<?php

namespace App\Services\UserLogin;

use Exception;

interface UserLoginServiceAbstraction
{
    public function doLogin(array $payload): array|Exception;
}
