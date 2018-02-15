<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
class Ticket extends Model
{ 
    protected $table = 'tickets';

    protected $fillable = [  'user_id','subject','message','path',];

    /* list All Tickets  */      
    public function Tickets()
    {
     return $this->where('isDeleted','0')->orderBy('created_at','desc');
    }
    /* list of  Tickets has been deleted and list (Desc) by create date */
      public function deletedTickets()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
    /* list of  Tickets has been deleted and list (Desc) by create date */
      public function closedTickets()
      {
      return $this->where('isClosed','1')->orderBy('updated_at','desc');
      }
    
      public function UserTickets()
      {
        return $this->Tickets()->where('user_id',Auth::id());
      }
      public function UserDeletedTickets()
      {
        return $this->deletedTickets()->where('user_id',Auth::id());
      }
      public function UserClosedTickets()
      {
        return $this->closedTickets()->where('user_id',Auth::id());
      }
   
      public function user()
      {
        return $this->belongsTo(User::class); 
      }
}
