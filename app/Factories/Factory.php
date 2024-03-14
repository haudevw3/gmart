<?php

namespace App\Factories;

use Exception;

class Factory
{
    public $bindings = [];
    public $subClass = [];
    public $listService = [];

    public function __construct()
    {
    }

    public function bind($interface, $className)
    {
        $this->bindings[$interface] = $className;
    }

    public function bindParams($bindings = [])
    {
        foreach ($bindings as $interface => $className) :
            $this->bind($interface, $className);
        endforeach;
    }

    public function make($interface, $subClass = [])
    {
        if (isset($this->bindings[$interface])) :
            $className = $this->bindings[$interface];
            if (!empty($subClass)) :
                return new $className(...$subClass);
            else :
                return new $className();
            endif;
        endif;
        throw new Exception("Dependency $interface not found.");
    }

    public function loadController($className)
    {
        return new $className(...$this->listService);
    }

    public function loadService($mainClass)
    {
        $listSubClass = $this->subClass[$mainClass];
        $listRepository = $this->loadRepository();
        foreach ($listSubClass as $className) :
            if (!empty($listRepository[$className])) :
                $listObject[] = $listRepository[$className];
            else :
                $listClassName[] = $className;
            endif;
        endforeach;
        if (!empty($listClassName)) :
            foreach ($listClassName as $className) :
                $listObject[] = [new $className()];
            endforeach;
        endif;
        return $this->listService[] = new $mainClass(...$listObject);
    }

    public function loadRepository()
    {
        foreach ($this->bindings as $interface => $className) :
            if (preg_match('/Repository/', $interface)) :
                $listRepository[$className] = $this->make($interface);
            endif;
        endforeach;
        return $listRepository;
    }
}
