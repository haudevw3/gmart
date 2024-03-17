<?php

namespace Modules\User;

use App\Providers\ServiceProvider;
use Modules\User\Repository\Impl\UserRepositoryImpl;
use Modules\User\Repository\UserRepository;
use Modules\User\Service\Impl\UserServiceImpl;
use Modules\User\Service\UserService;

class Provider extends ServiceProvider
{
    /**
     * Bootstrap the application Service.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadModule('user');
        $this->loadRoutesFrom('modules/user/routes.php');
        $this->loadViewsFrom('modules/user/View');
    }

    /**
     * Register the application Service.
     *
     * @return void
     */
    public function register()
    {
        $this->bindParams(UserRepository::class, UserRepositoryImpl::class);
        $this->bindParams(UserService::class, UserServiceImpl::class);
    }
}
