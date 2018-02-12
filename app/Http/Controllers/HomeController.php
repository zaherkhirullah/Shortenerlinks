<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\link;
use App\Http\Models\file;

class HomeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        return view('home.home');
    }
    public function rates()
    {
        return view('home.rates');
    }

    
    //  link
    public function visitLink($slug)
    { 
        $link = link::where('slug', $slug)->first();
        return view('home.captcha',compact('link'));
    }
    public function Fc_visitLink($link)
    {
        $link = link::where('slug', $slug)->first();
        return view('home.Fcaptcha',compact('link'));
    }
    public function getLink(link $link)
    {
        $link = link::where('slug', $slug)->first();
        return view('home.link',compact('link'));
    }
    public function goToLink(link $link)
    {

    }
    // file
    public function visitFile($title)
    {   $file = file::where('slug', $title)->first();
        return view('home.captcha',compact('file'));
    }
    
    public function Fc_visitFile($title)
    {   
        $file = file::where('slug', $title)->first();
        return view('home.Fcaptcha',compact('file'));
    }
    public function getFile(file $file)
    {
        $file = link::where('slug', $slug)->first();
        return view('home.file',compact('file'));
    }
    public function goToFile(file $file)
    {

    }
}
