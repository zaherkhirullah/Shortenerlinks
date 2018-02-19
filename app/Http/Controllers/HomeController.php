<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\linkVisitor;
use App\Http\Models\fileDownloader;
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
    }
  
    public function index()
    {
        return view('home.home');
    }
    public function rates()
    {
        return view('home.rates');
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
        $link = $this->llink($slug);
        return view('home.captcha',compact('link'));
    }
   
    public function Fc_visitLink($slug)
    {
        $link = $this->llink($slug);
        return view('home.Fcaptcha',compact('link'));
    }

    public function getLink(Request $request)
    { $ip = $request->ip();
        $x = geoip($ip)->country;
        return  $x ;
        $link = $this->llink($request->slug);
        return view('home.link',compact('link'));
    }
   
    public function goToLink(Request $request)
    {   
        $link = $this->llink($request->slug);
        $ip = $request->ip();
        $link_id =$link->id;
    $link_visitorr = linkVisitor::where([
            ['ip_visitor',$ip],['link_id',$link_id],
            ['created_at',">",Today()],
            ['created_at',"<",Carbon::today()->addDay(1)]
        ]
        )->first();
        return $link_visitorr ;
            if($link_visitorr == null){
            $link->clicks += 1;
            $link->earnings += 0.004;
            $link->save();
            $linkVisitor = new linkVisitor();
            $linkVisitor->ip_visitor = $ip;
            $linkVisitor->link_id = $link_id;
            $linkVisitor->save();
        }
            
        return redirect($link->url);
    }
    // file
    public function visitFile($slug)
    {    
        $file =$this->flink($slug);

        return view('home.captcha',compact('file'));
    }
    
    public function Fc_visitFile($slug)
    {   
        $file =$this->flink($slug);
        return view('home.Fcaptcha',compact('file'));
    }
    public function getFile(Request $request)
    {
        $file =$this->flink($request->slug);
        return view('home.file',compact('file'));
    }
    public function goToFile(Request $request)
    {
        $file =$this->flink($request->slug);
        
        $file->views += 1;
        $file->earnings += 0.0004;
        $file->save();

        return view('home.downloadfile',compact('file'));
    }
}
