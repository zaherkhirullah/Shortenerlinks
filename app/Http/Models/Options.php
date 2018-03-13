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

    public function site_key()
    {
        $capatcha_site_key = $this->where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        return $site_key;
    }
    public function timer()
    {
        $Timer_value = $this->where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->value;
        return $timer;
    }
}
