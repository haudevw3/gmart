<?php

namespace Core\Build;

class Route
{
    private $url;
    private $module;
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
            $url = 'trang-chu';
        endif;
        return $url;
    }

    public function getController()
    {
        global $routes;
        $urlAnalysis = array_filter(explode('/', $this->url));
        $urlAnalysis = array_values($urlAnalysis);
        if (!empty($routes[$urlAnalysis[0]])) :
            $this->module = $urlAnalysis[0];
            $controller = $routes[$urlAnalysis[0]]['controller'];
            unset($urlAnalysis[0]);
            $this->url = implode('/', $urlAnalysis);
            return $this->controller = $controller;
        else :
            $this->module = null;
            $this->controller = null;
        endif;
        return;
    }

    public function handleUrl()
    {
        global $routes;
        $method = null;
        if (!empty($this->module) && !empty($this->url) && !empty($routes[$this->module][$this->url])) :
            $method = $routes[$this->module][$this->url]['method'];
        endif;
        if (!empty($this->module) && empty($this->url)) :
            $method = $routes[$this->module]['method'];
        endif;
        if (!empty($method)) :
            $namespace = ucfirst(implode('\\', explode('/', $routes[$this->module]['path'])));
            $class = $namespace . $this->controller;
            $this->controller = new $class;
            $this->controller->$method();
        else :
            echo "Không tìm thấy tuyến đường";
        endif;
    }
}
