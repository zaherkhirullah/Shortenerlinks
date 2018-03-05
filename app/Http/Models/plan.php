<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $table = 'plans';
    protected $fillable = ['name','display_name','space_size','monthly_price','yearly_price',];
    
    public function users()
    {
        return $this ->hasMany( 'App\User', 'plan_id' );
    }
      // list All users
      public function plans()
      {
       return $this->orderBy('created_at','desc');
      }
      public function about_plans()
      {
          return $this->belongsToMany( 'App\Http\Models\aboutPlan' ,'plans_abouts','plan_id','about_id')
          ->withPivot('value');
      }
      
}
