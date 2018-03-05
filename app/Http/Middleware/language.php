<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;
class language
{
    public function handle($request, Closure $next)
    {
        if(Session::has('lang'))
		{   
            $lang =  Session::get('lang');           
            App::setLocale($lang);
        }
       return $next($request);  
    }
}
