<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{

    protected $table = 'profile';

    protected $fillable = 
    [   'phone_number',  'user_id','withdrawal_email','withdrawal_method_id','avatar'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->hasOne('App\Http\Models\address','user_id');
    }

    
}
