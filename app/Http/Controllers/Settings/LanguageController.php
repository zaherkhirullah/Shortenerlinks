<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App ;
use Lang ;
class LanguageController extends Controller
{
	// return Session::forget('languages');		
	// return Session::all();
	// Session::put(['lang' => $lang]);
	// App::setLocale($lang);
	public function index($lang)
	{
	 $langs = ['en','ar'];
	 if (in_array($lang , $langs))
	 {
		Session(['lang' => $lang]);
		App::setLocale($lang);
		Session::flash('success', Lang::get('lang.change_language',['name'=>Session::get('lang')]));
		return Redirect::back();
	 } 
	 Session::flash('error', Lang::get('lang.not_found' , ['name' => Lang::get('lang.lang')]) . ' ' .$lang);	 
	 return Redirect::back();
	}


   public function changelang(Request $request)
   {
    	if($request->ajax())
   	   {
	   		$request->session()->put('locale',$request->locale);
	   		$request->session()->flash('alert-success',('app.Locale_Change_Success'));
		}
      
   }

}
