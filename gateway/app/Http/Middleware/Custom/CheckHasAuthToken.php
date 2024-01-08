<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class CheckHasAuthToken
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->bearerToken()) {
            return fail_api_response(__("custom.err.catch"), __("custom.err.invalid_token"));
        }

        return $next($request);
    }
}
