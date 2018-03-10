<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\PayMethod;
use App\Http\Models\Earn;
use App\Http\Models\Views;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\Options;
use App\Http\Models\linkVisitor;
use App\Http\Models\fileDownloader;
use App\Http\Models\Downloads;
use App\User;
use Charts;
use Auth;
use App\Mail\withdrawMail;
use Mail;
use Carbon\Carbon;
use \Khill\Lavacharts\Lavacharts;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $links = $link->UserLinks($user_id)->get();
        $files = $file->UserFiles($user_id)->get();
        $files_links_count = $lava->DataTable();
        $files_links_count ->addDateColumn('Date')
                            ->addNumberColumn(\Lang::get('lang.Links').' '.\Lang::get('lang.visit'))
                            ->addNumberColumn(\Lang::get('lang.Files').' '.\Lang::get('lang.download'));                        
                            $date = Carbon::now(); 
        for($i=1 ; $i<31;$i++)
        {   
            $i = $i<10 ? '0'.$i : $i;
            $date->month = $date->month< 10 ? '0'.$date->month : $date->month;
            $link_views = $view->dateLinkViews($date->year.'-'.$date->month.'-'.$i);
            $file_downloads = $download->dateFileDownloads($date->year.'-'.$date->month.'-'.$i);
            $files_links_count->addRow([$date->year.'-'.$date->month.'-'.$i, $link_views , $file_downloads]); 
        }
        return $files_links_count;
    }
    public function visitors()
    { 
        $lava = new Lavacharts;
        $link = new link;
        $visitors = $lava->DataTable();
     $visitors->addStringColumn('Country')
                   ->addNumberColumn('visitors');
    $links = $link->userLinks(Auth::id())->get();
    
    foreach($links as $link)
    {   
        $linkVisitors =linkVisitor::where('link_id',$link->id)->get();
        //        
        foreach($linkVisitors as $visitor)
        {
            $links_count =linkVisitor::where('country',$visitor->country)->count();
            $visitors->addRow(array($visitor->country, $links_count ));
        }
    }
    return $visitors;
}
    

    public function dashboard(Earn $earn ,Views $view,Downloads $download)
    {   
        $user_id = Auth::id();
        $TodayLinkEarnings= $earn->TodayLinkEarnings($user_id);
        $TodayFileEarnings= $earn->TodayFileEarnings($user_id);
        $TotalLinkEarnings= $earn->TotalLinkEarnings($user_id);
        $TotalFileEarnings= $earn->TotalFileEarnings($user_id);
            $TotalEarnings    = $earn->TotalEarnings($user_id);
            $ReferralEarnings = $earn->ReferralEarnings($user_id);
            $Referral_MyEarnings = $earn->Referral_MyEarnings($user_id);
            
        $TodayLinkViews= $view->TodayLinkViews($user_id);
        $TodayFileViews= $view->TodayFileViews($user_id);
        $TotalLinkViews= $view->TotalLinkViews($user_id);
        $TotalFileViews= $view->TotalFileViews($user_id);
            $TotalViews    = $view->TotalViews($user_id);
        $TodayFileDownloads= $download->TodayFileDownloads($user_id);
        $TotalFileDownloads= $download->TotalFileDownloads($user_id);

        $DayTime = Carbon::today()->Format('Y-m-d');
        $NowTime = Carbon::now(); 
              
        $lava = new Lavacharts; // See note below for Laravel
        $files_links= $this->chart_files_links();
        $visitors =          $this->visitors();
        $reasons =          $this->chart_space();
        $lava->DonutChart('IMDB', $reasons,     ['title' => \Lang::get('lang.use_cloud_space'),]);
        $lava->LineChart('Temps', $files_links, ['title' => \Lang::get('lang.Files') .' & '.  \Lang::get('lang.Links')]);
        $lava->GeoChart('visitors', $visitors);

    $array = array([
        'TodayLinkEarnings','TodayFileEarnings','TotalLinkEarnings','TotalFileEarnings','TotalEarnings','ReferralEarnings','Referral_MyEarnings',
        'TodayLinkViews','TodayFileViews','TotalLinkViews','TotalFileViews','TotalViews',
        'TodayFileDownloads','TotalFileDownloads',
        'NowTime', 'DayTime','lava','all_space',
      ]);
     return view('users.dashboard', compact($array));
    }
    public function referrals(Earn $earn)
    {
        $user_id = Auth::id();
        $refUsers=User::where('referred_by',$user_id)->get();
         if(count($refUsers))
         {
             $user_earnings = $earn->ReferralEarnings($user_id);
             $my_earnings =$earn->Referral_MyEarnings($user_id);
        }

        return view('users.referrals',compact('refUsers','my_earnings','user_earnings','earn'));
    }

    public function withdraw()
    {  
       $User= Auth::user();
       $method_id = $User->profile->withdrawal_method_id;

       $method = PayMethod::where('id',$method_id)->first();
       $Balance=  $User->Balance->avilable_amount;
     
       $PaymentMethod = $method->name;
       return view('users.withdraw',compact('PaymentMethod','Balance') );
    }
  
  
}
    
