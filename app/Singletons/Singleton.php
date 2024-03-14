<?php

namespace App\Singletons;

class Singleton
{
    protected static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        $className = static::class;
        if (!isset(self::$instances[$className])) :
            self::$instances[$className] = new static();
        endif;
        return self::$instances[$className];
    }
}
