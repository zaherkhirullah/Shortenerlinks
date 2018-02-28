<?php

namespace App\Http\Models;
use App\Profile;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';
    protected $fillable =  ['user_id','country_id','city_id','state','city','Address1','Address2','zip_code'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
