<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Adstype extends Model
{
    protected $table = 'ads_types';
    protected $fillable = ['name','description','isDeleted',];
    
    // list All Adstype
    public function Adstypes()
    {
     return $this->where('isDeleted','0')->orderBy('created_at','desc');
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
