<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\SubmitMessage\SubmitMessageServiceAbstraction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @param Request $request
     * @param SubmitMessageServiceAbstraction $submitMessageService
     * @return JsonResponse
     */
    public function submitMessage(Request $request, SubmitMessageServiceAbstraction $submitMessageService): JsonResponse
    {
        return $this->getJsonResponse($submitMessageService->submitMessage($request));
    }
}
