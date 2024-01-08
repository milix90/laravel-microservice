<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class EvaluateUserByAccessTokenMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $res = Http::withHeaders([
            "Accept" => "application/json",
            "authorization" => sprintf("Bearer %s", $request->bearerToken()),
        ])->get(config("custom.inquire_url"));

        if ($res->status() != Response::HTTP_OK) {
            return fail_api_response(__("custom.err.catch"), __("custom.err.invalid"),);
        }

        $request->attributes->add(["user" => $res->json()["data"]["result"]]);

        return $next($request);
    }
}
