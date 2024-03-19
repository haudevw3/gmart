<?php

namespace Core\Middleware;

use App\Facades\Response;
use App\Http\Middleware\Middleware;
use App\Http\Requests\Request;
use Closure;

class UserAuth extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \App\Http\Requests\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $request->all();
        if ($data['username'] == 'vanhau' && $data['password'] == '123456'):
            return $next($request);
        else:
            return Response::redirect();
        endif;
    }
}