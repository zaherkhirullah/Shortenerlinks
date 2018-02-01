<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domain;
use App\User;
use App\AdsTypes;
class link extends Model
{
     protected $fillable = ['user_id','domain_id','ad_id',
     'status','url','alias','title','description','hits','isDeleted' , ];

    // list All Links
      public function links()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    // list of  Links has been deleted and list (Desc) by create date
      public function deletedLinks()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
      // list all Links for a user
      public function userLinks(User $user)
      {
      }
      public function Domain()
     {
       return $this->belongsTo(Domain::class); 
     }
      public function User()
     {
       return $this->belongsTo(User::class); 
     }
      public function AdsTypes()
     {
       return $this->belongsTo(AdsTypes::class); 
     }
}
