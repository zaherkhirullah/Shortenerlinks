<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class Admin
{

    public function handle($request, Closure $next)
    {
    	$checkAdmin =Sentinel:: getUser()->roles()->first()->name;

    	if(Sentinel::check()&& $checkAdmin == 'admin')
         return $next($request);
         else
            return redirect('/');
    }
    
}
