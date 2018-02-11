<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
   protected $table = 'roles';
   protected $fillable = ['name','slug',];
   
   public function users()
   {
       return $this ->hasMany( 'App\User', 'role_id' );
   }
  
}
