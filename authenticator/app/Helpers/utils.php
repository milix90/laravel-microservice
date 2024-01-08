<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('success_api_response')) {
    /**
     *  success response.
     *
     * @param string $message
     * @param array $data
     * @param int $httpStatusCode
     * @param int $total
     * @param int $perPage
     * @param array|null $extra
     *
     * @return JsonResponse
     */
    function success_api_response(
        string $message,
        array $data,
        int $httpStatusCode = Response::HTTP_OK,
        int $total = 1,
        int $perPage = 1,
        ?array $extra = []
    ): JsonResponse {
        return api_response($message, $data, $httpStatusCode, $total, $perPage, null, $extra);
    }
}


if (!function_exists('fail_api_response')) {
    /**
     *  fail response.
     *
     * @param string $message
     * @param string $error
     * @param array $data
     * @param int $httpStatusCode
     *
     * @return JsonResponse
     */
    function fail_api_response(
        string $message,
        string $error,
        array $data = [],
        int $httpStatusCode = Response::HTTP_UNPROCESSABLE_ENTITY
    ): JsonResponse {
        return api_response($message, $data, $httpStatusCode, 0, 0, $error);
    }
}

if (!function_exists('api_response')) {
    /**
     * API response.
     *
     * @param string|null $message
     * @param array|null $entityData
     * @param int $httpStatusCode
     * @param int|null $total
     * @param int|null $perPage
     * @param string|null $error
     * @param array|null $extra
     *
     * @return JsonResponse
     */
    function api_response(
        ?string $message,
        ?array $entityData,
        int $httpStatusCode,
        ?int $total,
        ?int $perPage,
        ?string $error,
        ?array $extra = []
    ): JsonResponse {
        $data = !$extra ?
            [
                'total' => $total,
                'per_page' => $perPage,
                'result' => $entityData,
            ] :
            [
                'total' => $total,
                'per_page' => $perPage,
                'result' => $entityData,
                'extra' => $extra,
            ];
        if ($httpStatusCode === 503) {
            return response()->json([
                'message' => $message,
                'error' => $error,
                'server_time' => date('Y-m-d H:i:s.u'),
                'data' => $data
            ], $httpStatusCode, ["Retry-After" => 11], JSON_UNESCAPED_UNICODE);
        }
        return response()->json([
            'message' => $message,
            'error' => $error,
            'server_time' => date('Y-m-d H:i:s.u'),
            'data' => $data
        ], $httpStatusCode, [], JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('log_custom_error')) {
    /**
     * @param Exception $e
     * @return void
     */
    function log_custom_error(Exception $e): void
    {
        Log::error(sprintf("%s\n%s", $e->getMessage(), $e->getTraceAsString()));
    }
}
