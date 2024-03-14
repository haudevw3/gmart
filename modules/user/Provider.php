<?php

namespace Modules\User;

use App\Providers\ServiceProvider;
use Modules\User\Repository\Impl\UserRepositoryImpl;
use Modules\User\Repository\UserRepository;
use Modules\User\Service\Impl\UserServiceImpl;
use Modules\User\Service\UserService;

class Provider extends ServiceProvider
{
    public function bindings()
    {
        return [
            UserRepository::class => UserRepositoryImpl::class,
            UserService::class => UserServiceImpl::class
        ];
    }

    public function subClass()
    {
        return [
            UserServiceImpl::class => [
                UserRepositoryImpl::class
            ]
        ];
    }
}
