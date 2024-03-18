<?php

namespace App\Providers;

abstract class ServiceProvider
{
    protected $module;
    protected $serviceContainer;

    public function __construct()
    {
        $this->serviceContainer = ServiceContainer::getInstance();
        $this->boot();
        $this->register();
    }

    /**
     * Bootstrap the application Service.
     *
     * @return void
     */
    abstract public function boot();

    /**
     * Register the application Service.
     *
     * @return void
     */
    abstract public function register();

    public function loadRoutesFrom($path)
    {
        $this->serviceContainer->serviceRegister['route'] = $path;
    }

    public function loadViewsFrom($path)
    {
        $this->serviceContainer->serviceRegister['view'] = $path;
    }

    public function bindParams($interface, $className)
    {
        $this->serviceContainer->serviceRegister['dependencies'][$interface] = $className;
    }
}
