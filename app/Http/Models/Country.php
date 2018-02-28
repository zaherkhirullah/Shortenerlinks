<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
     protected $table = 'country';
    protected $fillable =  ['name','link_price','file_price','sembol'];

     /* list All Countries  */      
     public function countries()
     {
      return $this->where('isDeleted','0')->orderBy('created_at','desc');
     }
    /* list of  Countries has been deleted and list (Desc) by create date */
    public function deletedCountries()
    {
    return $this->where('isDeleted','1')->orderBy('updated_at','desc');
    }
    
     
}
