<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;
class language
{
    public function handle($request, Closure $next)
    {
        app()->setLocale(\lang());  // lang helper
       return $next($request);  
    }
}
