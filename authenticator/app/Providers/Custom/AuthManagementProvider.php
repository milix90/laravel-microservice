<?php

namespace App\Providers\Custom;

use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryAbstraction;
use App\Services\UserInquire\UserInquireService;
use App\Services\UserInquire\UserInquireServiceAbstraction;
use App\Services\UserLogin\UserLoginService;
use App\Services\UserLogin\UserLoginServiceAbstraction;
use App\Services\UserLogout\UserLogoutService;
use App\Services\UserLogout\UserLogoutServiceAbstraction;
use Illuminate\Support\ServiceProvider;

class AuthManagementProvider extends ServiceProvider
{
    private User $userModel;
    private UserRepositoryAbstraction $userRepository;

    public function __construct()
    {
        parent::__construct($this->app);
        $this->userModel = new User();
        $this->userRepository = new UserRepository($this->userModel);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        app()->bind(UserLoginServiceAbstraction::class, function () {
            return (new UserLoginService($this->userRepository));
        });

        app()->bind(UserInquireServiceAbstraction::class, function () {
            return (new UserInquireService($this->userRepository));
        });

        app()->bind(UserLogoutServiceAbstraction::class, function () {
            return (new UserLogoutService($this->userRepository));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
