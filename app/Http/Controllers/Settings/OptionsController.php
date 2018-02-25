<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use App\Http\Models\Options;
use Illuminate\Http\Request;
use Session;
class OptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $option = new Options();
        $options =$option->Options();
        return view ('admin.settings',compact('options'));

    }
    
    
    public function update(Request $request, Options $options)
    {   
        // foreach ($request->photos as $photo) {
        //     $filename = $photo->getClientOriginalName();
        //     $photo->storeAs('public/upload', $filename);
        // }
        
        foreach ($options->all() as $value) 
        {
            $options =  Options::where('name',$value->name)->first();
            $options->value =$request->value;
            dd($request->all());
            $options->save();      
        }
        Session::flash('success','successfuly update all settings');
        return redirect()->back();
        // $project->users()->sync($request->users);


        // $optionss =  $options::all();
        // foreach($optionss as  $option){
        //     // $option->value =$request->Input($option->value);
        //     // $option->intV =$request->Input($option->intV); 
          
            
        // }
    }
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(Options $options)
    {
        //
    }


    public function edit(Options $options)
    {
    }


   

    public function destroy(Options $options)
    {
        //
    }
}
