<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon;
class Downloads extends Model
{    
    public function AlldateFileDownloads($date)
    { 
         $file = new file();
        $files = $file->where(
            [
                ['created_at',">",$date],
                ['created_at',"<",Carbon::parse($date)->addDay(1)]
            ])->get();
    
        $Download = 0;
        foreach($files as $filee)
        {
            $Download += $filee->downloads;
        }
        return $Download;
    }
    public function dateFileDownloads($date,$user_id = null)
    { 
        $user_id =$user_id ? $user_id: Auth::id();  
         $file = new file();
        $files = $file->where(
            [
                ['user_id',$user_id],
                ['created_at',">",$date],
                ['created_at',"<",Carbon::parse($date)->addDay(1)]
            ])->get();
    
        $Download = 0;
        foreach($files as $filee)
        {
            $Download += $filee->downloads;
        }
        return $Download;
    }
    public function TodayFileDownloads($user_id=null)
    {   
        $date = Today();
        return $this->dateFileDownloads($date,$user_id);
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
