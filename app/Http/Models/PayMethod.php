<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\withdraw;

class PayMethod extends Model
{
    //
    protected $table = 'withdraw_methods';
    protected $fillable = ['name','min_amount','icon'];

     /* list All PayMethod  */      
     public function PayMethods()
     {
      return $this->orderBy('created_at','desc');
     }
     public function create()
     {
         return view('admin.PayMethods.Form');
     }
     public function withdraws()
     {
         return $this ->hasMany( withdraw::class );
     }
   
}
