<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Models\plan;
use App\Http\Models\aboutPlan;
use Illuminate\Http\Request;
use App\Http\Requests\PlanValidation;

use Session;

class PlanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(plan $plan ,aboutPlan $aboutPlan)
    {
        $plans = $plan->plans()->paginate(20);
        $about_plans =$aboutPlan->aboutPlans()->get();
        return view('users.plans.index',compact('plans','about_plans'));
    }

  
    public function create()
    {
        return view('users.plans.Form');
    }
    public function store(planValidation $request)
    {   
        $plan =new plan();
        $plan->fill($request->all());
        $plan->save();
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' plan .');
        return redirect()->route('plan.index');
    }

    
    // show plan details
    public function show(plan $plan)
    {
        return view('users.plans.show',compact('plan'));
    }
    // edit plan details
    public function edit(plan $plan)
    {
        return view('users.plans.Form',compact('plan'));
    }
    // update function
    public function update(planValidation $request, plan $plan)
    {         
        $plan->name =$request->name;
        $plan->slug =$request->slug;
        $plan->url =$request->url;
        $plan->save();
            Session::flash('success',' Sucessfully update the ' .$request->name . ' plan .');
        return redirect()->route('plan.index');

    }
// for hide plan    
    public function destroy(plan $plan)
    {   
        $name = $plan->name;
        $plan = plan::find($plan)->first();
        $plan->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' plan .');
        return redirect()->route('plan.index');
    }
}
