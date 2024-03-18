<?php

namespace App\Providers;

use App\Container\DIContainer;
use App\Facades\View;
use App\Singletons\Singleton;

class ServiceContainer extends Singleton
{
    protected $DIContainer;
    protected $view;
    public $serviceRegister;

    public function __construct()
    {
        $this->DIContainer = DIContainer::getInstance();
    }

    public function loadViewPath()
    {
        $viewPath = $this->serviceRegister['view'];
        View::setViewPath($viewPath);
    }

    public function loadController($className, $method)
    {
        $array = explode('\\', $className);
        $interface = end($array) . 'Interface';
        $this->DIContainer->bind($interface, $className);
        $controller = $this->DIContainer->make($interface);
        $controller->$method();
    }

    public function loadDependencies()
    {
        $dependencies = $this->serviceRegister['dependencies'];
        foreach ($dependencies as $interface => $className) :
            $this->DIContainer->bind($interface, $className);
            $this->DIContainer->make($interface);
        endforeach;
    }
}
