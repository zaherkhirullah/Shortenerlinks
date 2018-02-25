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

    public function __construct()
    {
        $this->middleware('language');
    }

	public function index($lang)
	{
	 $langs = ['en','ar'];
	 if (in_array($lang , $langs))
	 {
		Session(['language' => $lang]);
// return Session::forget('languages');		
// return Session::all();
		Session::flash('success', Lang::get('lang.change_language',['name'=>Session::get('language')]));
		return Redirect::back();
	 } 
	 return Redirect::back()->with('error', Lang::get('lang.not_found' , ['name' => Lang::get('lang.language')]) . ' ' .$lang);
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
