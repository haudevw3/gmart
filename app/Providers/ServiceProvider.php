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

    public function loadModule($moduleName)
    {
        $this->module = $moduleName;
    }

    public function loadRoutesFrom($path)
    {
        $this->serviceContainer->listServiceProvider[$this->module]['loadRoutesFrom'] = $path;
    }

    public function loadViewsFrom($path)
    {
        $this->serviceContainer->listServiceProvider[$this->module]['loadViewsFrom'] = $path;
    }

    public function bindParams($interface, $className)
    {
        if (preg_match('/Repository/', $interface)) :
            $this->serviceContainer->listServiceProvider[$this->module]['repository'][$interface] = $className;
        endif;
        if (preg_match('/Service/', $interface)) :
            $this->serviceContainer->listServiceProvider[$this->module]['service'][$interface] = $className;
        endif;
    }
}
