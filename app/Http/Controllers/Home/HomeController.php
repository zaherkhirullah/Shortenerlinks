<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\linkVisitor;
use App\Http\Models\Options;
use App\Http\Models\fileDownloader;
use App\Http\Models\advertisements;
use App\Balance;
use App\User;
use Auth;
use Carbon\Carbon ;
class HomeController extends Controller
{
    public  function get_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        return $ipaddress;

        // $ip = $request->ip();
        // $x ="Country:" . geoip($ip)->country .
        // " ip:" .geoip($ip)->ip
        // ." State :" . geoip($ip)->state;
        // return  $x ;
    }
  
    public function index()
    {
        return view('home.home');
    }
    public function rates()
    {
        return view('home.rates');
    }
    public function terms()
    {
        return view('home.terms');
    }

    public function llink($slug)
    {
        $link = link::where('slug', $slug)->first();
        return  $link ; 
        
    }
    public function flink($slug)
    {        
        $file = File::where('slug', $slug)->first();  
        return  $file ; 
    }
    //  link
    public function visitLink($slug)
    {   
        $ads= advertisements::take(3);
        $capatcha_site_key = Options::where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        $link = $this->llink($slug);
        return view('visitor.captcha',compact('link','site_key','ads'));
    }
   
    public function Fc_visitLink($slug)
    {
        $ads= advertisements::take(3);
        $link = $this->llink($slug);
        $capatcha_site_key = Options::where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        return view('visitor.Fcaptcha',compact('link','site_key','ads'));
    }

    public function getLink(Request $request)
    {   
        $ads= advertisements::take(3);
        $Timer_value = Options::where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->intV;
        $capatcha_site_key = Options::where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        $link = $this->llink($request->slug);
        return view('visitor.link',compact('link','site_key','timer','ads'));
    }
   
    public function goToLink(Request $request)
    {   
        $visit_link = Options::where('name','count_visit_link')->first() ;
        $AllowedCount =  $visit_link->intV;
        $link = $this->llink($request->slug);
        $ip = $request->ip();
        $link_id = $link->id;
        $link_visitorr = linkVisitor::where([
                ['ip_visitor',$ip],['link_id',$link_id],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ]
           )->get();//Count
            //    return count($link_visitorr);
            // )->first(); 
            // if($link_visitorr == null)
            // count allow visit same user to link            
            if(count($link_visitorr) < $AllowedCount ){
            
                $linkVisitor = new linkVisitor();
                $linkVisitor->ip_visitor = $ip;
                $linkVisitor->link_id = $link_id;
                if($linkVisitor->save()){
    
                    $link->clicks += 1;
                    $link->earnings += 0.004;
                    $link->save();
        
                    $user_id = $link->user_id;
                    $User = User::where('id',$user_id)->first();
                    $Balance =$User->Balance;
                    $Balance->avilable_amount += 0.004;
                    $Balance->save();
                }
            // if($linkVisitor->save() && $link->save() && $Balance->save());
        }
     return redirect($link->url);
    }
    // file
    public function visitFile($slug)
    { 
        $ads= advertisements::skip(3)->take(3);
        $capatcha_site_key = Options::where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        $file =$this->flink($slug);

        return view('visitor.captcha',compact('file','site_key','ads'));
    }
    
    public function Fc_visitFile($slug)
    {   
        $ads= advertisements::skip(3)->take(3);        
        $file =$this->flink($slug);
        return view('visitor.Fcaptcha',compact('file','ads'));
    }
    public function getFile(Request $request)
    {
        $ads= advertisements::skip(3)->take(3);
        $Timer_value = Options::where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->intV;
        $file =$this->flink($request->slug);
        return view('visitor.file',compact('file','timer','ads'));
    }
    public function downloadFile(Request $request)
    {
        $ads= advertisements::skip(3)->take(3);  
        $Timer_value = Options::where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->intV;
        $file = $this->flink($request->slug);

        return view('visitor.downloadfile',compact('file','timer','ads'));
    }
    public function goToFile(Request $request)
    {
        $ads= advertisements::skip(3)->take(3);
        $Timer_value = Options::where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->intV;  
        $file = $this->flink($request->slug);
        $visit_file = Options::where('name','count_visit_file')->first();
        $AllowedCount =  $visit_file->intV;
        $file = $this->flink($request->slug);
        $ip = $request->ip();
        $file_id =$file->id;
        $file_visitorr = fileDownloader::where([
                ['ip_downloader',$ip],['file_id',$file_id],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();         
            if(count($file_visitorr) < $AllowedCount )
            {
                $fileDownloader = new fileDownloader();
                $fileDownloader->ip_downloader = $ip;
                $fileDownloader->file_id = $file_id;
                if($fileDownloader->save()){
                    $file->views += 1;
                    $file->earnings += 0.0004;
                    $file->save();
        
                    $user_id = $file->user_id;
                    $User = User::where('id',$user_id)->first();
                    $Balance =$User->Balance;
                    $Balance->avilable_amount += 0.004;
                    $Balance->save();
                }
            }        
        return view('visitor.downloadfile',compact('file','timer','ads'));
    }
}



         