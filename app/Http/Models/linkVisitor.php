<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class linkVisitor extends Model
{
  protected $table = 'linkVisitors';    
     protected $fillable =   ['ip_visitor','link_id','country',  ];
}
