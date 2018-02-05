<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\session;

use Illuminate\Support\Facades\Input;
use App ;
use Lang ;

class LanguageController extends Controller
{
   public function changelang(Request $request)
   {
   	if($request->ajax())
   	   {
	   		$request->session()->put('locale',$request->locale);
	   		$request->session()->flash('alert-success',('app.Locale_Change_Success'));
		}
      
   }

}
