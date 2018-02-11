<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   
    public function dashboard()
    {
        return view('admin.dashboard');
    }
     public function links()
    {
        return view('admin.links');
    }
    public function files()
    {
        return view('admin.files');
    }
    public function users()
    {
        return view('admin.users');
    }
      public function paymentMethods()
    {
        return view('admin.paymentMethods');
    }
     public function withdraws()
    {
        return view('admin.withdraws');
    }

}
