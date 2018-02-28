<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use Carbon\Carbon;
class Views extends Model
{
    public function AlldateLinkViews($date)
    {          
        $link = new link();
        $links = $link->where([
            [ 'created_at' ,'>',Carbon::parse($date)],
            [ 'created_at' ,'<',Carbon::parse($date)->addDay(1)]
            ])->get();
        $view = 0;
        foreach($links as $linkk)
        {
            $view += $linkk->clicks;
        }
        return $view;
    }
    public function dateLinkViews($date,$user_id =null )
    {   
        $user_id =$user_id ? $user_id: Auth::id();  
       
        $link = new link();
        // $link_date = date('Y-m-d', strtotime('created_at'));
        // dd(Carbon::parse($date)->addDay(1));
        $links = $link->where([
            ['user_id',$user_id],
            [ 'created_at' ,'>',Carbon::parse($date)],
            [ 'created_at' ,'<',Carbon::parse($date)->addDay(1)]
            ])->get();
        $view = 0;
        foreach($links as $linkk)
        {
            $view += $linkk->clicks;
        }
        return $view;
    }
    public function TodayLinkViews($user_id=null)
    {   
        $date = Today();
        return $this->dateLinkViews($date,$user_id);
    }
//     $link = new link();
//     $links = $link->where(
//         [
//             ['user_id',$user_id],
//             ['created_at',">",Today()],
//             ['created_at',"<",Carbon::today()->addDay(1)]
//         ])->get();

//    $view = 0;
//     foreach($links as $linkk)
//     {
//         $view += $linkk->clicks;
//     }
//     return $view;
    public function TodayFileViews($user_id)
    {   $file = new file();
        $files = $file->where(
            [
                ['user_id',$user_id],
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

    public function TotalLinkViews($user_id)
    {   $link = new link();
        $view = 0;
        $links = $link->where([['user_id',$user_id]])->get();
        foreach($links as $linkk)
        {
            $view += $linkk->clicks;
        }
        return $view;
    }
    public function TotalFileViews($user_id)
    {   $file = new file();
        $view = 0;
        $files = $file->where([['user_id',$user_id]])->get();
        
        foreach($files as $filee)
        {
            $view += $filee->views;
        }
        return $view;
    }
    public function TotalViews($user_id)
    {   
        $view =  $this->TotalFileViews($user_id) +  $this->TotalLinkViews($user_id);
        return $view;
    } 
}
