<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $table = 'options';
    protected $fillable = ['name','value','intV','intV',];

      /*
    |------------------------
    |  Public Functions
    |------------------------
    */
  
    /* list All Links  */      
    public function Options()
    {
     return $this->orderBy('created_at','desc')->get();
    }
}
