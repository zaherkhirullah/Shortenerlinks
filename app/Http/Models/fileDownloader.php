<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class fileDownloader extends Model
{
    protected $table = 'fileDownloaders';    
    protected $fillable =   ['ip_downloader','file_id','country',  ];
}
