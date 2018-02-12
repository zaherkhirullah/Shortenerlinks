<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon;
class Views extends Model
{
    public function TodayLinkViews()
    {   $link = new link();
        $links = $link->where(
            [
                ['user_id',Auth::id()],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
    
       $view = 0;
        foreach($links as $linkk)
        {
            $view += $linkk->clicks;
        }
        return $view;
    }

    public function TodayFileViews()
    {   $file = new file();
        $files = $file->where(
            [
                ['user_id',Auth::id()],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
    
        $view = 0;
        foreach($files as $filee)
        {
            $view += $filee->views;
        }
        return $view;
    }

    public function TotalLinkViews()
    {   $link = new link();
        $view = 0;
        $links = $link->where([['user_id',Auth::id()]])->get();
        foreach($links as $linkk)
        {
            $view += $linkk->clicks;
        }
        return $view;
    }
    public function TotalFileViews()
    {   $file = new file();
        $view = 0;
        $files = $file->where([['user_id',Auth::id()]])->get();
        
        foreach($files as $filee)
        {
            $view += $filee->views;
        }
        return $view;
    }
    public function TotalViews()
    {   
        $view =  $this->TotalFileViews() +  $this->TotalLinkViews();
        return $view;
    } 
}
