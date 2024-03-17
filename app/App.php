<?php

namespace App;

use App\Facades\Route;
use App\Http\Requests\Request;

class App
{
    protected $request;
    protected $route;

    public function __construct()
    {
        $this->request = new Request();
        $this->route = Route::getInstance();
    }

    public function receiveRequest()
    {
        $requestInfo = $this->request->getRequestInfo();
        if (!empty($requestInfo['path_info'])) :
            $this->route->resolveRouteFromRequest($requestInfo);
        else:
            
        endif;
    }

    public function runApp()
    {
        $this->receiveRequest();
    }
}
