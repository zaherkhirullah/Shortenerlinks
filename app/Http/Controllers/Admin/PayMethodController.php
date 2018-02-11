<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\PayMethod;
use App\Http\Requests\PayMethodValidation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class PayMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {    
        $PayMethod = new PayMethod();
        $PayMethods = $PayMethod->PayMethods()->paginate(20);
        $PayMethods =PayMethod::all();
        return view('admin.PayMethods.index',compact('PayMethods'));
    }
    public function create()
    {
        return view('admin.PayMethods.Form');
    }

    public function store(PayMethodValidation $request)
    {  
         $PayMethod= new PayMethod();
        $PayMethod->fill($request->all());
        $PayMethod->save();
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' PayMethod .');
        return redirect()->route('PayMethods.index');
    
    }
    // show PayMethod details
    public function show(PayMethod $PayMethod)
    {
        return view('admin.PayMethods.show',compact('PayMethod'));
    }
    // edit PayMethod details
    public function edit(PayMethod $PayMethod)
    {
        return view('admin.PayMethods.Form',compact('PayMethod'));
    }
    // update function
    public function update(PayMethodValidation $request, PayMethod $PayMethod)
    {  
            $PayMethod->name =$request->name;
            $PayMethod->min_amount = $request->min_amount;
            $PayMethod->icon =$request->icon;
            $PayMethod->save();
            Session::flash('success',' Sucessfully update the ' .$request->name . ' PayMethod .');
        return redirect()->route('PayMethods.index');

    }
// for hide PayMethod    
    public function destroy(PayMethod $PayMethod)
    {
        $PayMethod =PayMethod::find($PayMethod)->first();
        $PayMethod->delete();
        Session::flash('success',' Sucessfully deleted the ' .$PayMethod->name . ' PayMethod .');
      
        return redirect()->route('PayMethods.index');
    }
}
