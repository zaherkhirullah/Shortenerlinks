<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profile';

    protected $fillable = 
    [   'phone_number',  'user_id','withdrawal_email','withdrawal_method_id','city', 'country','avatar'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    
}
