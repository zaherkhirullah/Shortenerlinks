<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\link;
use App\file;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
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
          return $this->hasOne('App\Profile');
      }

      public function Balance()
      {
          return $this->hasOne('App\Balance');
      }
      
      public function referrer()
      {
          return $this ->belongsTo( 'App\User', 'referrer_by' );
      }

      public function referrals()
      {
          return $this ->hasMany( 'App\User', 'referrer_by' );
      }

     // list All users
      public function users()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
     // list of  users has been deleted and list (Desc) by create date
      public function deletedusers()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
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
