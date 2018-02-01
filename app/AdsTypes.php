<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsTypes extends Model
{
    //
    public function links()
     {
         return $this->hasMany(link::class)->orderBy('created_at','desc');
     }
      public function files()
     {
         return $this->hasMany(file::class)->orderBy('created_at','desc');
     }
}
