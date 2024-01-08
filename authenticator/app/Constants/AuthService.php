<?php

namespace App\Constants;

abstract class AuthService
{
    public const SANCTUM = "sanctum";
    public const MAX_LOGIN_ATTEMPT = 3;
    public const BLOCK_PERIOD = 3; // in minutes
}
