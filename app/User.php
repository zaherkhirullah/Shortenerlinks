<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\Ticket;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable =
     [
      'first_name','last_name','username','email','confirm_email','password', 'affiliate_id', 'referred_by','role','status','isDeleted',
    ];

    protected $hidden = [ 'password', 'remember_token',];
  
      public function UserId()
      {
        return Auth::id();
      } 
    
      public function Profile()
      {
          return $this->hasOne('App\Profile','user_id');
      }

      public function Balance()
      {
          return $this->hasOne('App\Balance','user_id');
      }
      
      public function Role()
      {
          return $this ->belongsTo( 'App\Http\Models\role', 'role_id' );
      }

      public function referrer()
      {
          return $this ->belongsTo( 'App\User', 'referrer_by' );
      }
      

      public function referrals()
      {
          return $this ->hasMany( 'App\User', 'referrer_by' );
      }
      public function tickets()
      {
          return $this ->hasMany( Ticket::class)->orderBy('created_at','desc');;
      }

     // list All users
     public function users()
     {
      return $this->where([['isDeleted','0'],['role_id','<>','1']])->orderBy('created_at','desc');
     }
    // list of  users has been deleted and list (Desc) by create date
     public function deletedusers()
     {
      return $this->where(['isDeleted','1'],['role_id','<>','1'])->orderBy('updated_at','desc');
     }
     public function links()
     {
         return $this->hasMany(link::class)->orderBy('created_at','desc');
     }
     public function files()
     {
         return $this->hasMany(file::class)->orderBy('created_at','desc');
     }
     public function Userlinks()
     {
         return $this->links()->where([['user_id',UserId()]]);
     }
     public function Userfiles()
     {
         return $this->files()->where([['user_id',UserId()]]);
     }
}
