<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;
class language
{
    public function handle($request, Closure $next)
    {
        if( $lang = Session::get('language'))
		{
            $lang =  Session::get('language');
        }
        else 
        {
            $lang ="ar";
        }
        App::setLocale($lang);
       return $next($request);  
    }
}
