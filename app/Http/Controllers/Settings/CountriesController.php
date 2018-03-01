<?php

namespace App\Http\Controllers\Settings;

use App\Http\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryValidation;
use App\Http\Controllers\Controller;
use Session;
class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $country = new Country();
        $countries =$country->countries()->get();
        return view ('admin.countries',compact('countries'));
    }
    
    public function update(Request $request, Country $countries)
    {   
        foreach ($countries->all() as $value) 
        {
            $country =  Country::where('name',$value->name)->first();
                if($country){
                // $countries->ecmp = $request->input($value->ecmp);                
                $country->file_price = $request->input('file_price_'.$value->id);
                $country->link_price = $request->input('link_price_'.$value->id);
                $country->save();
            }
        }
        Session::flash('success','successfuly update all countries');
        return redirect()->back();
       
    }

}
