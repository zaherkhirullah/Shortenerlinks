<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\plan;
use App\Http\Models\aboutPlan;
use App\Http\Models\aboutsPlans;

use Illuminate\Http\Request;
use App\Http\Requests\PlanValidation;
use Session;

class PlansController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(plan $plan ,aboutPlan $aboutPlan)
    {
        $plans = $plan->plans()->paginate(20);
        $about_plans =$aboutPlan->aboutPlans()->get();
        
        return view('admin.plans.index',compact('plans','about_plans'));
    }

  
    public function create(aboutPlan $aboutPlan)
    {
        $about_plans =$aboutPlan->aboutPlans()->get();        
        return view('admin.plans.Form',compact('about_plans'));
    }

  
    public function store(planValidation $request)
    {
        
        $plan =new plan();
        $plan = $plan->fill($request->all());
         $plan->save();
        $aboutPlan = new aboutPlan();       
        $abouts =  aboutPlan::all();
        foreach ($abouts as $about) 
        {   // $about =  aboutPlan::find($about->id)->first();   
             $abouts_plans =new aboutsPlans();            
            $val= $request->input('about_'.$about->id);
                $val =$val? 1:0; 
                $abouts_plans->plan_id = $plan->id; 
                $abouts_plans->about_id = $about->id;
                $abouts_plans->value = $val;
                $abouts_plans->save();                      
        }   
        $about_plans =$aboutPlan->aboutPlans()->get();    
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' plan .');
        return redirect()->route('plans.index',compact('about_plans'));
    }

    
    // show plan details
    public function show(plan $plan)
    {
        return view('admin.plans.show',compact('plan'));
    }
    // edit plan details
    public function edit(plan $plan,aboutPlan $aboutPlan)
    {
        $about_plans =$aboutPlan->aboutPlans()->get();        
        return view('admin.plans.Form',compact('plan','about_plans'));
    }
    // update function
    public function update(planValidation $request, plan $plan)
    {         
        $plan->name =$request->name;
        $plan->display_name =$request->display_name;
        $plan->monthly_price =$request->monthly_price;
        $plan->yearly_price  =$request->yearly_price;
        $plan->space_size =$request->space_size;
        $plan->save();
        $aboutPlan = new aboutPlan();       
        $abouts =  aboutPlan::all();
        foreach ($abouts as $about) 
        {   // $about =  aboutPlan::find($about->id)->first();   
            $abouts_plans =aboutsPlans::where([['plan_id',$plan->id],['about_id',$about->id]])->first();            
             if(empty($abouts_plans))
             $abouts_plans = new aboutsPlans();   
             $val= $request->input('about_'.$about->id);
                $val =$val? 1:0; 
                $abouts_plans->plan_id = $plan->id; 
                $abouts_plans->about_id = $about->id;
                $abouts_plans->value = $val;
                $abouts_plans->save();                      
        }   
        $about_plans =$aboutPlan->aboutPlans()->get();    
            Session::flash('success',' Sucessfully update the ' .$request->name . ' plan .');
        return redirect()->route('plans.index',compact('about_plans'));
        

    }
// for hide plan    
    public function destroy(plan $plan)
    {   
        $name = $plan->name;
        // $about =  aboutPlan::find($about->id)->first();   
        $abouts_plans = aboutsPlans::where('plan_id',$plan->id)->get();        
        foreach($abouts_plans as $ab_plns)
        {
            $ab_plns =  aboutsPlans::find($ab_plns->id)->first(); 
            $ab_plns->delete();
        }
        $plan->delete();

        Session::flash('success',' Sucessfully deleted the ' .$name . ' plan .');
        return redirect()->route('plans.index');
    }
}
