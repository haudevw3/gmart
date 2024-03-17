<?php

namespace App\Providers;

use App\Container\DIContainer;
use App\Singletons\Singleton;

class ServiceContainer extends Singleton
{
    protected $DIContainer;
    public $serviceRegister;

    public function __construct()
    {
        $this->DIContainer = DIContainer::getInstance();
    }

    public function loadViews()
    {
    }

    public function loadRoutes()
    {
    }

    public function loadControllers()
    {
    }

    public function loadDependencies()
    {
        $dependencies = $this->serviceRegister['user']['dependencies'];
        foreach ($dependencies as $interface => $className) :
            $this->DIContainer->bind($interface, $className);
            $this->DIContainer->make($interface);
        endforeach;
    }
}
