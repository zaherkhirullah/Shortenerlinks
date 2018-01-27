<?php

namespace App\Http\Middleware;

use Closure;

class admin
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    
}
