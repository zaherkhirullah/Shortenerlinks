<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Domain;
use App\User;
use App\Http\Models\AdsTypes;
use App\Http\Models\folders;
class file extends Model
{
  protected $table = 'files';

    protected $fillable = 
     [
     
          'user_id','domain_id','folder_id','slug','path','title',
          'description','isDeleted','downloads','views' ,'isPrivate','password' ,
     ];
     
    // list All files
      public function files()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    // list of  files has been deleted and list (Desc) by create date
      public function deletedfiles()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
      // list all files for a user
      public function userfiles(User $user)
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
        public function folders()
     {
       return $this->belongsTo(folders::class); 
     }
     public function AdsTypes()
     {
       return $this->belongsTo(AdsTypes::class); 
     }
}
