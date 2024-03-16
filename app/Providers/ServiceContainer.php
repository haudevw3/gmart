<?php

namespace App\Providers;

use App\Singletons\Singleton;

class ServiceContainer extends Singleton
{
    public $listServiceProvider;

    public function __construct()
    {
    }

    public function getView($module)
    {
        return $this->listServiceProvider[$module]['loadViewsFrom'];
    }

    public function getRoute($module)
    {
        return $this->listServiceProvider[$module]['loadRoutesFrom'];
    }

    public function getRegisterClass($module)
    {
        $listServiceProvider = $this->listServiceProvider[$module];
        unset($listServiceProvider['loadViewsFrom']);
        unset($listServiceProvider['loadRoutesFrom']);
        return $listServiceProvider;
    }
}
