<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon;
class Downloads extends Model
{

    public function TodayFileDownloads($user_id)
    {   $file = new file();
        $files = $file->where(
            [
                ['user_id',$user_id],
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
    public function TotalFileDownloads($user_id)
    {   $file = new file();
        $Download = 0;
        $files = $file->where([['user_id',$user_id]])->get();
        
        foreach($files as $filee)
        {
            $Download += $filee->downloads;
        }
        return $Download;
    }
}
