<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\aboutPlan;
class aboutsPlans extends Model
{
    protected $table = 'plans_abouts';
    protected $fillable = ['plan_id','about_id','value',];
    
      // list All users
      public function aboutsPlans()
      {
       return $this->orderBy('created_at','desc');
      }
      public function plans()
      {
        return $this->belongsToMany( 'App\Http\Models\plan' ,'plans_abouts','plan_id','about_id');
      }
      public function aboutplans()
      {
        return $this->belongsToMany( 'App\Http\Models\aboutPlan' ,'plans_abouts','plan_id','about_id');
      }
      public function about_plans($about_id)
      {
        $aboutPlan =new aboutPlan();
        return  $aboutPlan->where('id',$about_id);
      }
    }
