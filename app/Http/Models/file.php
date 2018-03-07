<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Models\folder;
use App\User;
use Auth ;
class file extends Model
{
  protected $table = 'files';

    protected $fillable = ['user_id','domain_id','folder_id','slug','path','title','description',
    'isDeleted','size','downloads','file_name','views' ,
    'isPrivate','password','shorted_url','ip',
                          ];
     
// list All files
    public function files()
    {
    return $this->where('isDeleted','0')->orderBy('created_at','desc');
    }
    public function AllFiles()
    {
    return $this::all();
    }
// list of  files has been deleted and list (Desc) by create date
    public function deletedFiles()
    {
     return $this->where('isDeleted','1')->orderBy('updated_at','desc');
    }
     // list all files for a user
     public function UserFiles($user_id=null)
     {  
      $user_id = $user_id ? : $user_id=Auth::id();   
       return $this->files()->where([['user_id',$user_id]]);
     }

     public function UserDeletedFiles()
     {
         return $this->deletedFiles()->where([['user_id',Auth::id()]]);
     }
// list of  files has been deleted and list (Desc) by create date
public function private()
{
 return $this->where([['isDeleted','0'],['isPrivate','1']])->orderBy('updated_at','desc');
}
 // list of  files has been deleted and list (Desc) by create date
 public function public()
 {
  return $this->where([['isDeleted','0'],['isPrivate','0']])->orderBy('updated_at','desc');
 }
  // list of  files has been deleted and list (Desc) by create date
  public function user_public_files($user_id=null)
  {
    $user_id = $user_id ? : $user_id=Auth::id(); 
   return $this->where([['isDeleted','0'],['isPrivate','0'],['user_id',$user_id]])->orderBy('updated_at','desc');
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
