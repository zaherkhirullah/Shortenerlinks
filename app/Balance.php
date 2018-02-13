<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'Balances';
    protected $fillable = ['avilable_amount','advertiser_balance','publisher_balance',];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
