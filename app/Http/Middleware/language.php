<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;
class language
{
    public function handle($request, Closure $next)
    {
        if( Session::has('lang'))
        {
            $lang = Session::get('lang',Config::get('app.locale'));
        }
        else{
            $lang ='ar';
        }
        App::setLocale($lang);
       return $next($request);  
    }
}
