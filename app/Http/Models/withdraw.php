<?php

namespace App\Http\Models;

use App\Http\Models\PayMethod;
use Illuminate\Database\Eloquent\Model;
use Auth ;
use App\User ;
class withdraw extends Model
{
    protected $table = 'withdraws';
    protected $fillable =  ['user_id','amount','withdraw_address','withdrawal_method_id',
    'transaction_id','isDeleted','status'];

     /* list All Withdraws  */      
     public function Withdraws()
     {
      return $this->where('isDeleted','0')->orderBy('created_at','desc');
     }
     public function UserWithdraws()
     {
      return $this->where([['isDeleted','0'],['user_id',Auth::id()]])->orderBy('created_at','desc');
     }
     
     public function UserdeletedWithdraws()
    {
    return $this->where([['isDeleted','1'],['user_id',Auth::id()]])->orderBy('updated_at','desc');
    }
    /* list of  Withdraws has been deleted and list (Desc) by create date */
    public function deletedWithdraws()
    {
    return $this->where('isDeleted','1')->orderBy('updated_at','desc');
    }
    public function paymethod()
    {
      return $this->belongsTo('App\Http\Models\PayMethod','withdrawal_method_id'); 
    }
    public function User()
    {
      return $this->belongsTo(User::class); 
    }
   
    
}
