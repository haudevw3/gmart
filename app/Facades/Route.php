<?php

namespace App\Facades;

use App\Singletons\Singleton;

class Route extends Singleton
{
    private static $prefix;
    private static $method;
    public $listMethod = [];

    public function __construct()
    {
        // $this->listMethod['PATH_INFO'] = $this->getPathInfo();
    }

    public function getPathInfo()
    {
        if (!empty($_SERVER['PATH_INFO'])) :
            $pathInfo = $_SERVER['PATH_INFO'];
        else :
            $pathInfo = '/';
        endif;
        return rtrim(ltrim($pathInfo, '/'), '/');
    }

    private static function mergeUrl($uri)
    {
        if (!empty(self::$prefix)) :
            $url = self::$prefix . '/' . rtrim(ltrim($uri, '/'), '/');
        else :
            $url = rtrim(ltrim($uri, '/'), '/');
        endif;
        return $url;
    }

    public static function prefix($name, $callBack)
    {
        self::$prefix = $name;
        $callBack();
        return self::getInstance();
    }

    public static function get($uri, $controller = [])
    {
        self::$method = [
            '_method' => 'GET',
            'url' => self::mergeUrl($uri),
            'controller' => $controller[0],
            'method' => $controller[1]
        ];
        return self::getInstance();
    }

    public static function post($uri, $controller = [])
    {
        self::$method = [
            '_method' => 'POST',
            'url' => self::mergeUrl($uri),
            'controller' => $controller[0],
            'method' => $controller[1]
        ];
        return self::getInstance();
    }

    public function name($name)
    {
        return $this->listMethod[$name] = self::$method;
    }

    public function getRoute($pathInfo)
    {
        foreach ($this->listMethod as $key => $value) :
            if ($value['url'] == $pathInfo) :
                $value['routeName'] = $key;
                return $value;
            endif;
        endforeach;
    }
}
