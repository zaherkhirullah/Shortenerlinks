<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\PayMethod;
use App\Http\Models\Earn;
use App\Http\Models\Views;
use App\Http\Models\file;
use App\Http\Models\link;
use App\Http\Models\Options;
use App\Http\Models\Downloads;
use App\User;
use Auth;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   
    public function dashboard()
    {
        $lava = new Lavacharts; // See note below for Laravel
        $files_links= $this->chart_files_links();
        $visitors =  $this->visitors();
        $reasons =  $this->chart_space();
        $lava->DonutChart('IMDB', $reasons,     ['title' => \Lang::get('lang.use_cloud_space'),]);
        $lava->LineChart('Temps', $files_links, ['title' => \Lang::get('lang.Files') .' & '.  \Lang::get('lang.Links')]);
        $lava->GeoChart('visitors', $visitors);
        $array = array([
        'TodayLinkEarnings','TodayFileEarnings','TotalLinkEarnings','TotalFileEarnings','TotalEarnings','ReferralEarnings','Referral_MyEarnings',
        'TodayLinkViews','TodayFileViews','TotalLinkViews','TotalFileViews','TotalViews',
        'TodayFileDownloads','TotalFileDownloads',
        'NowTime', 'DayTime','lava',
      ]);
     return view('admin.dashboard', compact($array));
    }

    public function chart_space()
    {   
        $User = Auth::user();        
        $all_space_int = $User->plan->space_size;
        $used_space_int =0.2;
        $used_space = human_filesize($used_space_int);
        $all_space =space_size($all_space_int); //  this function in app/helpers/file.php
        $remining_space = $all_space_int - $used_space_int;
        if( $remining_space < 0){ $remining_space = 0; }
        $lava = new Lavacharts; // See note below for Laravel
         $reasons = $lava->DataTable();
         return $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow([\Lang::get('lang.remaining_space'),  $remining_space])
            ->addRow([\Lang::get('lang.used_space'), $used_space_int]);               
    }
    function chart_files_links()
    {   
        $lava = new Lavacharts;
        $view = new Views;
        $download = new Downloads;
        $link = new link;
        $file = new file;
        $user_id =Auth::id();
        $links = $link->AllLinks();
        $files = $file->AllFiles();
        $files_links_count = $lava->DataTable();
        $files_links_count ->addDateColumn('Date')
                            ->addNumberColumn(\Lang::get('lang.Links').' '.\Lang::get('lang.visit'))
                            ->addNumberColumn(\Lang::get('lang.Files').' '.\Lang::get('lang.download'));                        
                            $date = Carbon::now(); 
        for($i=1 ; $i<31;$i++)
        {   
            $i = $i<10 ? '0'.$i : $i;
            $date->month = $date->month< 10 ? '0'.$date->month : $date->month;
            $link_views = $view->AlldateLinkViews($date->year.'-'.$date->month.'-'.$i);
            $file_downloads = $download->AlldateFileDownloads( $date);
            $files_links_count->addRow([$date->year.'-'.$date->month.'-'.$i, $link_views , $file_downloads]); 
        }
        return $files_links_count;
    }
    public function visitors()
    { 
        $lava = new Lavacharts;
        $visitors = $lava->DataTable();
        return $visitors->addStringColumn('Country')
                   ->addNumberColumn('visitors')
                   ->addRow(array('Germany', 10))
                   ->addRow(array('United States', 300))
                   ->addRow(array('Brazil', 400))
                   ->addRow(array('Canada', 500))
                   ->addRow(array('France', 600))
                   ->addRow(array('Sy', 600))
                   ->addRow(array('RU', 700));
    }   
}
