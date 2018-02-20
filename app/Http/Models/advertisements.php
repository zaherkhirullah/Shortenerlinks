<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class advertisements extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['name','value','rank',];
}
