<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Country;
use App\Http\Models\address;
use App\Http\Models\PayMethod;
use App\Http\Models\WithdrawalMethod;
use App\Profile;
use App\Balance;
use App\User;
use Hash;
use Auth;
use Session;

class AccountController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function Settings()
  {
    return view('account.settings');
  }

  public function showprofile()
  {
    $profile =profile::where('user_id',Auth::id())->first();
    $countries = Country::pluck('name', 'id');
    // $countries = \Countries::all()->pluck('name.common');
    $withdrawMethods = PayMethod::pluck('name', 'id');

    return view('account.profile',compact('countries',
    'withdrawMethods','profile'));
  }
  public function profile (Request $request)
  { 
    $user =User::where('id',Auth::id())->first();
    $user->first_name =$request->first_name;
    $user->last_name =$request->last_name;
    $user->save();
    $profile =profile::where('user_id',Auth::id())->first();
    $profile->user_id =   Auth::id() ;
    $profile->avatar = $request->avatar ;
    $profile->phone_number = $request->phone_number ;
    $profile->withdrawal_email = $request->withdrawal_email ;
    $profile->withdrawal_method_id = $request->withdrawal_method_id ;
    $profile->save();
    $address = address::where('user_id',Auth::id())->first();
    $address->city = $request->city ;
    $address->user_id = Auth::id() ;
    $address->state = $request->state ;
    $address->Address1 = $request->Address1 ;
    $address->Address2 = $request->Address2 ;
    $address->country_id = $request->country ;
    $address->zip_code = $request->zip_code ;
    $address->save();
    $countries = Country::pluck('name', 'id');
    $withdrawMethods = PayMethod::pluck('name', 'id');
    Session::flash('success',' Sucessfully Update ' .$profile->user_id . '  Profile informations .');
    return view('account.profile',compact('countries',
    'withdrawMethods','profile'));
  }
  
  public function showchangePassword()
  {
    return view('account.changePassword');
  }
  
  public function changePassword(Request $request)
  {

    $current_password = $request->current_password;
    $password =  $request->password;
    // The passwords matches
    if (!(Hash::check($current_password , Auth::user()->password))) {
      Session::flash("error","Your current password does not matches with the password you provided. Please try again.");
      return redirect()->back();
    }
    //Current password and new password are same
    if(strcmp($current_password , $password ) == 0){
      Session::flash("error","New Password cannot be same as your current password. Please choose a different password.");
      return redirect()->back();
    }

    $validatedData = $request->validate([
      'current_password' => 'required',
      'password' => 'required|string|min:6|confirmed',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($password);
    $user->save();
    Session::flash("success","The password  has been changed  successfully !");
    return redirect()->route('account.profile');

  }
}
