<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimpleMiddleware1
{
    public function handle(Request $request, Closure $next)
    {
        //logic, rate limitter bir user 10 zapros minutiga
        return $next($request);
    }
}
