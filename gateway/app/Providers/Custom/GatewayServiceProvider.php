<?php

namespace App\Providers\Custom;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryAbstraction;
use App\Repositories\Msg\MessageRepository;
use App\Repositories\Msg\MessageRepositoryAbstraction;
use App\Services\AuthInquire\AuthInquireService;
use App\Services\AuthInquire\AuthInquireServiceAbstraction;
use App\Services\AuthLogin\AuthLoginService;
use App\Services\AuthLogin\AuthLoginServiceAbstraction;
use App\Services\AuthLogout\AuthLogoutService;
use App\Services\AuthLogout\AuthLogoutServiceAbstraction;
use App\Services\SubmitMessage\SubmitMessageService;
use App\Services\SubmitMessage\SubmitMessageServiceAbstraction;
use Illuminate\Support\ServiceProvider;

class GatewayServiceProvider extends ServiceProvider
{
    private AuthRepositoryAbstraction $authRepo;
    private MessageRepositoryAbstraction $msgRepo;

    public function __construct()
    {
        parent::__construct($this->app);
        $this->authRepo = new AuthRepository();
        $this->msgRepo = new MessageRepository();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        app()->bind(AuthLoginServiceAbstraction::class, function () {
            return (new AuthLoginService($this->authRepo));
        });

        app()->bind(AuthInquireServiceAbstraction::class, function () {
            return (new AuthInquireService($this->authRepo));
        });

        app()->bind(AuthLogoutServiceAbstraction::class, function () {
            return (new AuthLogoutService($this->authRepo));
        });

        app()->bind(SubmitMessageServiceAbstraction::class, function () {
            return (new SubmitMessageService($this->msgRepo));
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
