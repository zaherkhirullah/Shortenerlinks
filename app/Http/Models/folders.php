<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
class folders extends Model
{
protected $table = 'folders';
protected $fillable = ['name','user_id','isDeleted',];

    // list All folders
    public function folders()
    {
    return $this->where('isDeleted','0')->orderBy('created_at','desc');
    }
// list of  folders has been deleted and list (Desc) by create date
  public function deletedfolders()
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
}
