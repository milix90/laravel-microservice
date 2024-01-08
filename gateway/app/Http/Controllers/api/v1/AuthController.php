<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\AuthInquire\AuthInquireServiceAbstraction;
use App\Services\AuthLogin\AuthLoginServiceAbstraction;
use App\Services\AuthLogout\AuthLogoutServiceAbstraction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // NOTE: request validations will be handled by the related services

    /**
     * @param Request $request
     * @param AuthLoginServiceAbstraction $loginService
     * @return JsonResponse
     */
    public function login(Request $request, AuthLoginServiceAbstraction $loginService): JsonResponse
    {
        return $this->getJsonResponse($loginService->login($request));
    }

    /**
     * @param Request $request
     * @param AuthInquireServiceAbstraction $inquireService
     * @return JsonResponse
     */
    public function inquire(Request $request, AuthInquireServiceAbstraction $inquireService): JsonResponse
    {
        return $this->getJsonResponse($inquireService->inquire($request));
    }

    /**
     * @param Request $request
     * @param AuthLogoutServiceAbstraction $logoutService
     * @return JsonResponse
     */
    public function logout(Request $request, AuthLogoutServiceAbstraction $logoutService): JsonResponse
    {
        return $this->getJsonResponse($logoutService->logout($request));
    }
}
