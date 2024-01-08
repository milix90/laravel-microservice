<?php

namespace App\Services\UserInquire;

use App\Entities\UserEntity;

interface UserInquireServiceAbstraction
{
    public function inquireLoggedInUser(): array;
}
