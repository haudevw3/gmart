<?php

namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;

abstract class Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \App\Http\Requests\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    abstract public function handle(Request $request, Closure $next);
}
