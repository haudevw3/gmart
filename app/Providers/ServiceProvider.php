<?php

namespace App\Providers;

abstract class ServiceProvider
{
    public function __construct()
    {
        $this->bindings();
        $this->subClass();
    }

    abstract public function bindings();
    abstract public function subClass();
}
