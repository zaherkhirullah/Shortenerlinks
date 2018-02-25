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
    public function Options()
    {
    return $this::all();
    }
  
}
