<?php

namespace App\Factories;

use App\Singletons\Singleton;
use Exception;

class Factory extends Singleton
{
    protected $bindings = [];

    public function __construct()
    {
    }

    public function bind($interface, $className)
    {
        $this->bindings[$interface] = $className;
    }

    public function make($interface)
    {
        if (isset($this->bindings[$interface])) :
            $className = $this->bindings[$interface];
            return new $className();
        endif;
        throw new Exception("Dependency $interface not found.");
    }
}
