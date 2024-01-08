<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @param array $res
     * @return JsonResponse
     */
    public function getJsonResponse(array $res): JsonResponse
    {
        $body = $res["body"]["data"] ?? $res["body"];

        return ($res["status"] <= 300)
            ? success_api_response(
                $res["body"]["message"] ?? "",
                $body["result"] ?? [],
                $res["status"] ?? 200,
                $body["total"] ?? 1,
                $body["per_page"] ?? 1
            )
            : fail_api_response(
                $res["body"]["message"] ?? "",
                $res["body"]["error"] ?? "",
                $body["result"] ?? [],
            );
    }
}
