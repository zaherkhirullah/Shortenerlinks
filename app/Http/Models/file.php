<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Domain;
use App\User;
use App\Http\Models\Adstype;
use App\Http\Models\folder;
class file extends Model
{
  protected $table = 'files';

    protected $fillable = 
     [
          'user_id','domain_id','folder_id','slug','path','title',
          'description','isDeleted','downloads','views' ,'isPrivate','password','shorted_url',
     ];
     
    // list All files
      public function files()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    // list of  files has been deleted and list (Desc) by create date
      public function deletedFiles()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
      // list all files for a user
      public function userfiles(User $user)
      {
      }
      public function domain()
      {
        return $this->belongsTo(Domain::class); 
      }
       public function user()
      {
        return $this->belongsTo(User::class); 
      }
         public function folder()
      {
        return $this->belongsTo(folder::class); 
      }
      public function adstype()
      {
        return $this->belongsTo(Adstype::class); 
      }
}
