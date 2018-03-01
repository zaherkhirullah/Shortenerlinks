<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\Earn;
use App\Http\Models\linkVisitor;
use App\Http\Models\Options;
use App\Http\Models\Country;
use App\Http\Models\fileDownloader;
use App\Http\Models\advertisements;
use App\Balance;
use App\User;
use Auth;
use Session;
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

         //  $ip = \Request::ip();
        // // dd(geoip()->getLocation($ip));
        // dd(geoip($ip)->ip);
    }
    

    public function index()
    {
   
        return view('home.home');
    }
    public function rates()
    {
        $country = new Country();
        $countries =$country->countries()->paginate(20);
        return view ('home.rates',compact('countries'));
    }

    public function terms()
    {
        return view('home.terms');
    }
    public function user_files(file $file,$user)
    {
        $user= User::where('username',$user)->first();
        if($user)   
        { 
            $files = $file->user_public_files($user->id)->paginate(10);
        return view('home.user_files',compact('files','user'));
        }
         Session::flash('error','This User not found');
        return back();
    }
    public function user_links(link $link,$user)
    {   
        $user= User::where('username',$user)->first();     
        if($user)   
        {
            $links = $link->UserLinks($user->id)->paginate(10);
            return view('home.user_links',compact('links','user'));
        }
         Session::flash('error','This User not found');
         return back();
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
        $site_key=  $this->site_key();
        $link = $this->llink($slug);
        return view('visitor.captcha',compact('link','site_key','ads'));
    }
   
    public function Fc_visitLink($slug)
    {
        $ads= advertisements::take(3);
        $link = $this->llink($slug);
        $site_key=  $this->site_key();
        return view('visitor.Fcaptcha',compact('link','site_key','ads'));
    }

    public function getLink(Request $request)
    {   

        $ads= advertisements::take(3);
        $timer =$this->timer();
        $site_key=  $this->site_key();
        $link = $this->llink($request->slug);
        return view('visitor.link',compact('link','site_key','timer','ads'));
    }
   
    public function goToLink(Request $request)
    {   
        $visit_link = Options::where('name','count_visit_link')->first() ;
        $AllowedCount =  $visit_link->value;
        $link = $this->llink($request->slug);
        $ip = $request->ip();
        $ip =geoip($ip)->ip;
        // $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $country = null;
        if(!empty($details->country))
        {
            $country=$details->country;
            $country= Country::where('cca2', 'like','%'.$country. '%')->first();       
        }
        $country_id = $country ? $country->id : 1;
        $country= Country::where('id',  $country_id )->first();                           
        $link_price = $country->link_price;

        $link_id = $link->id;
        $link_visitorr = linkVisitor::where([
                ['ip',$ip],['link_id',$link_id],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ]
           )->get();//Count
            //    return count($link_visitorr);
            // )->first(); 
            // if($link_visitorr == null)
            // count allow visit same user to link            
            if(count($link_visitorr) < $AllowedCount){
            
                $linkVisitor = new linkVisitor();
                $linkVisitor->ip = $ip;
                $linkVisitor->link_id = $link_id;
                $linkVisitor->country = $country->name;
                $linkVisitor->city = geoip($ip)->city;
                if($linkVisitor->save()){
                    $link->clicks += 1;
                    $link->earnings += $link_price;
                    $link->save();
        
                    $user_id = $link->user_id;
                    $User = User::where('id',$user_id)->first();
                    $ref_id =$User->referred_by;
                    $ref_User = User::where('id',$ref_id)->first();
                    if($ref_User)
                    {   $earn = new Earn();
                        $earn->add_to_ref_Balance($ref_id);
                    }
                    $Balance =$User->Balance;
                    $Balance->avilable_amount += $link_price;
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
        $site_key=  $this->site_key();        
        $file =$this->flink($slug);

        return view('visitor.captcha',compact('file','site_key','ads'));
    }
    
    public function Fc_visitFile($slug)
    {   
        $ads= advertisements::skip(3)->take(3); 
        $site_key=  $this->site_key();               
        $file =$this->flink($slug);
        return view('visitor.Fcaptcha',compact('file','site_key','ads'));
    }
    public function getFile(Request $request)
    {
        $ads= advertisements::skip(3)->take(3);
        $timer =$this->timer();
        $site_key=  $this->site_key();        
        $file =$this->flink($request->slug);
        return view('visitor.file',compact('file','timer','site_key','ads'));
    }
    public function downloadFile(Request $request)
    {
        $ads= advertisements::skip(3)->take(3);  
        $timer =$this->timer();
        $site_key=  $this->site_key();                
        $file = $this->flink($request->slug);
        return view('visitor.downloadfile',compact('file','timer','site_key','ads'));
    }
    public function goToFile(Request $request)
    {
       $this->download_file($request);
       return redirect()->route('homepage');
    }
public function download_file(Request $request)
{
    $ads= advertisements::skip(3)->take(3);
    $timer =$this->timer();  
    $file = $this->flink($request->slug);
    if($file->password) {
        if($file->password!= $request->password){
            Session::flash('error','please insert correct password');
            return redirect()->route('visitFile',$file->slug);
        }            
    }
    $visit_file = Options::where('name','count_visit_file')->first();
    $AllowedCount =  $visit_file->value;
    $file = $this->flink($request->slug);
    $site_key = $this->site_key();
    $ip = $request->ip();
    $ip =geoip($ip)->ip;
    // $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
    $country = null;
    if(!empty($details->country))
    {
        $country=$details->country;
        $country= Country::where('cca2', 'like','%'.$country. '%')->first();       
    }
    $country_id = $country ? $country->id : 1;
    $country= Country::where('id',  $country_id )->first();                           
    $file_price = $country->file_price;

    $file_id =$file->id;
    $file_visitorr = fileDownloader::where([
            ['ip',$ip],['file_id',$file_id],
            ['created_at',">",Today()],
            ['created_at',"<",Carbon::today()->addDay(1)]
        ])->get();         
        if(count($file_visitorr) < $AllowedCount )
        // if(count($file_visitorr) < 100 )
        {
            $fileDownloader = new fileDownloader();
            $fileDownloader->ip = $ip;
            $fileDownloader->country = $country->name;
            $fileDownloader->city = geoip($ip)->city;
            $fileDownloader->file_id = $file_id;
            if($fileDownloader->save()){
                $file->views += 1;
                $file->save();

                $user_id = $file->user_id;
                $User = User::where('id',$user_id)->first();
                $Balance =$User->Balance;
                 //PDF file is stored under project/public/download/info.pdf
                $filee= public_path(). "/uploads/files/". $file->file_name;
                 Session::flash('download.in.the.next.request', $filee);
                 $file->downloads += 1;
                 $file->earnings +=$file_price; 
                 $file->save();                   
                 $Balance->avilable_amount += $file_price;
                 $Balance->save();
                return response()->download($filee, $file->file_name);
            }
        }      
}

    public function site_key()
    {
        $capatcha_site_key = Options::where('name','captcha_site_key')->first() ;
        $site_key= $capatcha_site_key->value;
        return $site_key;
    }
    public function timer()
    {
        $Timer_value = Options::where('name','Link_Timer')->first() ;
        $timer =   $Timer_value->value;
        return $timer;
    }
    
}



         