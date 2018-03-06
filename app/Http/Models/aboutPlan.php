<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class aboutPlan extends Model
{
    protected $table = 'about_plans';
    protected $fillable = ['name','description'];
    
      // list All 
      public function aboutPlans()
      {
       return $this->orderBy('created_at','desc');
      }
      public function plans()
      {
        return $this->belongsToMany( 'App\Http\Models\plan' ,'plans_abouts','plan_id','about_id');
          
      }
    }
