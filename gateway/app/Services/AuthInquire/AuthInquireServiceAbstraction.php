<?php

namespace App\Services\AuthInquire;

use Illuminate\Http\Request;

interface AuthInquireServiceAbstraction
{
    public function inquire(Request $request): array;
}
