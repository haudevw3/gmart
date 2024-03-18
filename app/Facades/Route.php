<?php

namespace App\Facades;

use App\Singletons\Singleton;

class Route extends Singleton
{
    private static $prefix;
    private static $method;
    protected $routes = [];

    public function __construct()
    {
    }

    public function resolveRouteFromRequest($requestInfo = [])
    {
        $pathInfoRequest = $requestInfo['path_info'];
        $uriRequest = $requestInfo['uri'];
        $queryStringRequest = $requestInfo['query_string'];
        if (empty($queryStringRequest)) :
            $route = $this->getRoute('path_info', $pathInfoRequest);
            return $route;
        else :
        endif;
    }

    public static function resolveUrlByType($key, $uri)
    {
        global $regex;
        switch ($key) {
            case 'pathInfo':
                if (preg_match($regex['urlRegex'], $uri, $matches)) :
                    $pathInfo = self::$prefix . '/' . $matches[0];
                    return $pathInfo;
                endif;
                break;

            case 'uri':
                $uri = 'gmart/' . self::$prefix . '/' . $uri;
                return $uri;
                break;
        }
    }

    private static function parseUriParams($uri)
    {
        global $regex;
        $uri = explode('/', $uri);
        $params = end($uri);
        if (preg_match($regex['clRegex'], $params)) :
            $params = trimBothEndsIfMatch($params, '{', '}');
            return count(explode(',', $params)) > 1 ? explode(',', $params) : $params;
        endif;
    }

    private static function route($method, $uri, $controller = [])
    {
        self::$method = [
            'method' => $method,
            'prefix' => self::$prefix,
            'path_info' => self::resolveUrlByType('pathInfo', $uri),
            'uri' => self::resolveUrlByType('uri', $uri),
            'params' => self::parseUriParams($uri),
            'controller' => [
                'name' => $controller[0],
                'method' => $controller[1]
            ]
        ];
        return self::getInstance();
    }

    private function getRoute($key, $value)
    {
        foreach ($this->routes as $routeName => $params) :
            if ($params[$key] == $value) :
                $params['routeName'] = $routeName;
                return $params;
            endif;
        endforeach;
    }

    public static function prefix($name, $callBack)
    {
        self::$prefix = $name;
        $callBack();
        return self::getInstance();
    }

    public static function get($uri, $controller = [])
    {
        return self::route('get', $uri, $controller);
    }

    public static function post($uri, $controller = [])
    {
        return self::route('post', $uri, $controller);
    }

    public function name($name)
    {
        return $this->routes[$name] = self::$method;
    }
}
