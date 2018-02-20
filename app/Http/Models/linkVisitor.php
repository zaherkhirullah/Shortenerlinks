<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class linkVisitor extends Model
{
  protected $table = 'link_visitors';    
     protected $fillable =   ['ip_visitor','link_id','country',  ];
}
