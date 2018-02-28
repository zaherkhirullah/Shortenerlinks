<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;
class language
{
    public function handle($request, Closure $next)
    {
        if($lang = Session::get('language'))
		{   
            $lang =  Session::get('language');
            App::setLocale($lang);
            // dd($lang);
        }
       return $next($request);  
    }
}
