<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin
{

    public function handle($request, Closure $next)
    {
    	$checkAdmin =Auth::User()->role->name;

    	if($checkAdmin == 'admin')
         return $next($request);
         else
         {
             Session::flash('error', "You are don't authorize to open admin Area ");
            return redirect()->route('user');
         }
            
    }
    
}
