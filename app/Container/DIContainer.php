<?php

namespace App\Container;

use App\Singletons\Singleton;
use ReflectionClass;
use Exception;
use ReflectionNamedType;

class DIContainer extends Singleton
{
    protected $bindings = [];
    protected $instances = [];

    public function __construct()
    {
    }

    public function bind($interface, $className)
    {
        $this->bindings[$interface] = $className;
    }

    public function make($interface)
    {
        if (isset($this->instances[$interface])) :
            return $this->instances[$interface];
        endif;

        if (isset($this->bindings[$interface])) :
            $className = $this->bindings[$interface];
            $reflector = new ReflectionClass($className);
            $constructor = $reflector->getConstructor();
            if ($constructor === null) :
                $object = $reflector->newInstance();
                $this->instances[$interface] = $object;
                return $object;
            endif;
            $dependencies = [];
            $parameters = $constructor->getParameters();
            foreach ($parameters as $parameter) :
                $type = $parameter->getType();
                if ($type !== null && $type instanceof ReflectionNamedType) :
                    $dependencies[] = $this->make($type->getName());
                else :
                    throw new Exception("Can't resolve dependency for {$parameter->getName()}");
                endif;
            endforeach;
            $object = $reflector->newInstanceArgs($dependencies);
            $this->instances[$interface] = $object;
            return $object;
        endif;
    }
}
