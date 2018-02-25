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
	public function index($lang)
	{
	 $langs = ['en','ar'];
	 if (in_array($lang , $langs))
	 {
		Session([['lang' => $lang]]);
		
		Session::flash('success','dil degistirdi '.Session::get('lang'));
		return Redirect::back();
	 } 
	 return Redirect::back()->with('error','dil not fund '.Session::get('lang'));

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
