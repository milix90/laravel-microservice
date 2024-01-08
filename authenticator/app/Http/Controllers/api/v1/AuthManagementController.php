<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\Custom\InvalidPasswordException;
use App\Exceptions\Custom\UserBlockedException;
use App\Exceptions\Custom\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Services\UserInquire\UserInquireServiceAbstraction;
use App\Services\UserLogin\UserLoginServiceAbstraction;
use App\Services\UserLogout\UserLogoutServiceAbstraction;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthManagementController extends Controller
{
    // NOTE: THE REGISTER IS BYPASSED BY THE CODE CHALLENGE SCENARIO

    /**
     * @param UserLoginRequest $request
     * @param UserLoginServiceAbstraction $userLoginService
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request, UserLoginServiceAbstraction $userLoginService): JsonResponse
    {
        try {
            $result = $userLoginService->doLogin($request->all());
        } catch (UserNotFoundException|InvalidPasswordException|UserBlockedException $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.catch"), $e->getMessage());
        } catch (Exception $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.service"), $e->getMessage(), [],Response::HTTP_SERVICE_UNAVAILABLE
            );
        }

        return success_api_response(__("custom.valid.success"), $result);
    }

    /**
     * @param UserInquireServiceAbstraction $userInquireService
     * @return JsonResponse
     */
    public function inquire(UserInquireServiceAbstraction $userInquireService): JsonResponse
    {
        try {
            $result = $userInquireService->inquireLoggedInUser();
        } catch (UserNotFoundException|UserBlockedException $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.catch"), $e->getMessage());
        } catch (Exception $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.service"), $e->getMessage(), [],Response::HTTP_SERVICE_UNAVAILABLE
            );
        }

        return success_api_response(__("custom.valid.success"), $result);
    }

    /**
     * @param UserLogoutServiceAbstraction $userLogoutService
     * @return JsonResponse
     */
    public function logout(UserLogoutServiceAbstraction $userLogoutService): JsonResponse
    {
        try {
            $userLogoutService->doLogoutAuthUser();
        } catch (Exception $e) {
            log_custom_error($e);
            return fail_api_response(__("custom.err.service"), $e->getMessage(), [],Response::HTTP_SERVICE_UNAVAILABLE
            );
        }

        return success_api_response(__("custom.valid.success"), []);
    }
}
