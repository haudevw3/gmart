<?php
namespace Core\Build;

class Route
{
    private static $url;
    private static $prefix;
    private static $alias;
    private static $instance = null;

    public function __construct()
    {
    }

    private static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new Route();
        return self::$instance;
    }

    private static function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) :
            $url = $_SERVER['PATH_INFO'];
        else :
            $url = '/';
        endif;
        return $url;
    }

    private static function getPrefix()
    {
        self::$url = self::getUrl();
        $urlArray = array_filter(explode('/', self::$url));
        $urlArray = array_values($urlArray);
        if (!empty($urlArray[0])) :
            $prefix = $urlArray[0];
        else :
            $prefix = null;
        endif;
        return $prefix;
    }

    public static function prefix($name, $callBack)
    {
        self::$prefix = self::getPrefix();
        if (self::$prefix == $name) :
            $callBack();
        else :
            echo "Không tìm thấy tuyến đường";
        endif;
        return self::getInstance();
    }

    public static function get($alias, $controller = [])
    {
        $url = self::$prefix . '/' . rtrim(ltrim($alias, '/'), '/');
        self::$url = rtrim(ltrim(self::$url, '/'), '/');
        if ($url == self::$url) :
            $namespace = $controller[0];
            $method = $controller[1];
            $object = new $namespace();
            if (method_exists($object, $method)) :
                $object->$method();
            else :
                echo "Phương thức này không tồn tại";
            endif;
        else :
            echo "Không tìm thấy tuyến đường";
        endif;
        return self::getInstance();
    }
}
