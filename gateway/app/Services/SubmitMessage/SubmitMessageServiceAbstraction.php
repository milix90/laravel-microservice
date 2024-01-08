<?php

namespace App\Services\SubmitMessage;

use Illuminate\Http\Request;

interface SubmitMessageServiceAbstraction
{
    public function submitMessage(Request $request): array;
}
