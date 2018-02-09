<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
class Domain extends Model
{
    
    protected $table = 'domains';
    protected $fillable = ['name','slug','url','isDeleted',];

   // list All domains
   public function Domains()
   {
    return $this->where('isDeleted','0')->orderBy('created_at','desc');
   }
    // list of  domains has been deleted and list (Desc) by create date
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
