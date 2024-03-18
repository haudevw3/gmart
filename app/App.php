<?php

namespace App;

use App\Facades\Route;
use App\Http\Requests\Request;
use App\Providers\ServiceContainer;

class App
{
    protected $request;
    protected $route;
    protected $serviceContainer;

    public function __construct()
    {
        $this->request = new Request();
        $this->route = Route::getInstance();
        $this->serviceContainer = ServiceContainer::getInstance();
    }

    public function receiveRequest()
    {
        global $providers;
        $requestInfo = $this->request->getRequestInfo();
        if (!empty($requestInfo['path_info'])) :
            $route = $this->route->resolveRouteFromRequest($requestInfo);
            if (!empty($providers[$route['prefix']])) :
                $provider = new $providers[$route['prefix']]();
                $this->serviceContainer->loadDependencies();
                $this->serviceContainer->loadViewPath();
                $this->serviceContainer->loadController($route['controller']['name'], $route['controller']['method']);
            endif;
        else :

        endif;
    }

    public function runApp()
    {
        $this->receiveRequest();
    }
}
