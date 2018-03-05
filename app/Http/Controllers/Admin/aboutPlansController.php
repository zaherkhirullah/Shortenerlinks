<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\aboutPlan;
use App\Http\Requests\aboutPlanValidation;

use Illuminate\Http\Request;

use Session;
class aboutPlansController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(aboutPlan $aboutPlan)
    {
        $aboutPlans = $aboutPlan->aboutPlans()->paginate(20);
        return view('admin.aboutPlans.index',compact('aboutPlans'));
    }

    public function create()
    {
        return view('admin.aboutPlans.Form');
    }

  
    public function store(aboutPlanValidation $request)
    {   
        $aboutPlan =new aboutPlan();
        $aboutPlan->fill($request->all());
        $aboutPlan->save();
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' aboutPlan .');
        return redirect()->route('aboutPlans.index');
    }

    
    // show aboutPlan details
    public function show(aboutPlan $aboutPlan)
    {
        return view('admin.aboutPlans.show',compact('aboutPlan'));
    }
    // edit aboutPlan details
    public function edit(aboutPlan $aboutPlan)
    {
        return view('admin.aboutPlans.Form',compact('aboutPlan'));
    }
    // update function
    public function update(aboutPlanValidation $request, aboutPlan $aboutPlan)
    {         
        $aboutPlan->name =$request->name;
        $aboutPlan->description =$request->description;
        $aboutPlan->save();
            Session::flash('success',' Sucessfully update the ' .$request->name . ' aboutPlan .');
        return redirect()->route('aboutPlans.index');

    }
// for hide aboutPlan    
    public function destroy(aboutPlan $aboutPlan)
    {   
        $name = $aboutPlan->name;
        $aboutPlan = aboutPlan::find($aboutPlan)->first();
        $aboutPlan->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' aboutPlan .');
        return redirect()->route('aboutPlans.index');
    }
}
