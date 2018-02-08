<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
     protected $table = 'contacts';

 	 protected $fillable = 
      [
     	'name','email','subject', 'Message',
      ];
      
      // list All files
      public function contacts()
      { 
      	 // return $this->where('isDeleted','0')->orderBy('created_at','desc');
         return $this->orderBy('created_at','desc');
      }

      // list of  files has been deleted and list (Desc) by create date
      public function deletedContacts()
      {
       return $this->orderBy('updated_at','desc');
       // return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }

}
