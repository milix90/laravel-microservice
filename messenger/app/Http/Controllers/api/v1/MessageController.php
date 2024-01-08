<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\SubmitMessage\SubmitMessageService;
use App\Services\SubmitMessage\SubmitMessageServiceAbstraction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private SubmitMessageServiceAbstraction $MsgService;

    /**
     *
     */
    public function __construct()
    {
        $this->MsgService = new SubmitMessageService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $this->MsgService->submitNewMessage($request->all());
        } catch (\Exception $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.catch"), $e->getMessage());
        }

        return success_api_response(__("custom.valid.success"), []);
    }
}
