<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon ;
class Earn extends Model
{
    // Today()->Format('Y-m-d')
    public function TodayLinkEarnings()
    {   $link = new link();
        $links = $link->where(
            [
                ['user_id',Auth::id()],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
       $earn = 0;
        foreach($links as $linkk)
        {
            $earn += $linkk->earnings;
        }
       
        return $earn;
    }

    public function TodayFileEarnings()
    {   $file = new file();
        $earn = 0;
        $files = $file->where(
            [
                ['user_id',Auth::id()],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
    
         foreach($files as $filee)
        {
            $earn += $filee->earnings;
        }
        return $earn;
    }

    public function TotalLinkEarnings()
    {   $link = new link();
        $earn = 0;
        $links = $link->where([['user_id',Auth::id()]])->get();
        foreach($links as $linkk)
        {
            $earn += $linkk->earnings;
        }
        return $earn;
    }
    public function TotalFileEarnings()
    {   $file = new file();
        $earn = 0;
        $files = $file->where([['user_id',Auth::id()]])->get();
        
        foreach($files as $filee)
        {
            $earn += $filee->earnings;
        }
        return $earn;
    }
    public function TotalEarnings()
    {   
        $earn =  $this->TotalFileEarnings() +  $this->TotalLinkEarnings();
        return $earn;
    }
}
