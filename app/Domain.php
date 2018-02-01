<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\link;
use App\file;
class Domain extends Model
{
    //
     protected $fillable = ['Name','slug','url','isDeleted',];

    // list All files
      public function Domains()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    // list of  files has been deleted and list (Desc) by create date
      public function deletedDomains()
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

       public function Dominlinks()
     {
         return $this->links()->where([['domain_id',$this->id]]);
     }
     public function Dominfiles()
     {
         return $this->files()->where([['domain_id',$this->id]]);
     }


}
