<?php

namespace App\Container;

use App\Singletons\Singleton;
use ReflectionClass;
use Exception;
use ReflectionNamedType;
use ReflectionObject;

class DIContainer extends Singleton
{
    protected $bindings = [];
    protected $instances = [];

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

    public function getArgumentsForMethod($type, $subject, $methodName)
    {
        if ($type == 'object') :
            $reflector = new ReflectionObject($subject);
            if ($reflector->hasMethod($methodName)) :
                $method = $reflector->getMethod($methodName);
            else :
                throw new Exception("Method $methodName does not exist in the object");
            endif;
        elseif ($type == 'class') :
            $reflector = new ReflectionClass($subject);
            if ($reflector->hasMethod($methodName)) :
                $method = $reflector->getMethod($methodName);
            else :
                throw new Exception("Method $methodName does not exist in the class $subject");
            endif;
        else :
            throw new Exception("Invalid type");
        endif;
        $parameters = $method->getParameters();
        $dependencies = [];
        foreach ($parameters as $parameter) :
            $type = $parameter->getType();
            if ($type !== null && $type instanceof ReflectionNamedType) :
                $interface = getLastElement($type->getName()) . 'Interface';
                $this->bind($interface, $type->getName());
                $dependencies[] = $this->make($interface);
            else :
                throw new Exception("Can't resolve dependency for {$parameter->getName()}");
            endif;
        endforeach;
        return $dependencies;
    }
}
