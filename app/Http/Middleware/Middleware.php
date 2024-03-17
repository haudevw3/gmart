<?php

namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;

abstract class Middleware
{
    public function __construct()
    {
    }

    abstract public function handle(Request $request, Closure $closure);
}
