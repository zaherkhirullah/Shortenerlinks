<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon;
class Downloads extends Model
{

    public function TodayFileDownloads()
    {   $file = new file();
        $files = $file->where(
            [
                ['user_id',Auth::id()],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
    
        $Download = 0;
        foreach($files as $filee)
        {
            $Download += $filee->downloads;
        }
        return $Download;
    }
    public function TotalFileDownloads()
    {   $file = new file();
        $Download = 0;
        $files = $file->where([['user_id',Auth::id()]])->get();
        
        foreach($files as $filee)
        {
            $Download += $filee->downloads;
        }
        return $Download;
    }
}
