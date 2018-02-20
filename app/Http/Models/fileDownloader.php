<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class fileDownloader extends Model
{
    protected $table = 'file_downloaders';    
    protected $fillable =   ['ip_downloader','file_id','country',  ];
}
