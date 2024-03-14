<?php

namespace App\Facades;

use App\Factories\Factory;
use App\Singletons\Singleton;
use Modules\User\Provider as UserProvider;

class Facade extends Singleton
{
    private $factory;
    private $route;

    public function __construct()
    {
        $this->factory = Factory::getInstance();
        $this->route = Route::getInstance();
    }

    public function loadFactory()
    {
        $userProvider = new UserProvider();
        $this->factory->bindParams($userProvider->bindings());
        $this->factory->subClass = $userProvider->subClass();
        $this->factory->loadRepository();
        $this->factory->loadService('Modules\User\Service\Impl\UserServiceImpl');
    }

    public function loadRoute()
    {
        $pathInfo = $this->route->getPathInfo();
        $routeCurrent = $this->route->getRoute($pathInfo);
        if (!empty($routeCurrent)) :
            $method = $routeCurrent['method'];
            $controller = $this->factory->loadController($routeCurrent['controller']);
            $controller->$method();
        else :
            echo '404 not found';
        endif;
    }
}
