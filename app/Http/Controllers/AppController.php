<?php
namespace App\Http\Controllers;

class AppController
{
    private $url;
    private $controller;
    private $action;
    private $params;

    public function __construct()
    {
        $this->url = $this->getUrl();
        $this->controller = $this->getController();
        $this->action = '';
        $this->params = [];
        $this->handleUrl();
    }

    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) :
            $url = $_SERVER['PATH_INFO'];
        else :
            $url = '/';
        endif;
        return $url;
    }

    public function getController()
    {
        if ($this->url != '/') :
            $urlAnalysis = array_filter(explode('/', $this->url));
            $urlAnalysis = array_values($urlAnalysis);
            $controller = ucfirst($urlAnalysis[0]) . 'Controller';
            return $this->controller = $controller;
        endif;
        return 'HomeController';
    }

    public function handleUrl()
    {
        $path = 'app/Http/Controllers/';
        $file = $path . $this->controller . '.php';
        if (file_exists($file)) :
            // require_once $path . $this->controller . '.php';
            // echo $this->controller;
            $this->controller = new $this->controller();
        else :
            echo "error";
        endif;
    }
}

