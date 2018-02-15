<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Country;
use App\Http\Models\WithdrawalMethod;
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
    $countries = Country::pluck('name', 'id');
    $withdrawMethods = Country::pluck('name', 'id');

    return view('account.profile',compact('countries',
      'withdrawMethods'));
  }
  // public function profile (Request $request)
  // { 
  //   $profile = new Profile();
  //   $profile = new Profile();
  //   $request-> ;
  
  
  // }
  
  public function showchangePassword()
  {
    return view('account.changePassword');
  }
  
  public function changePassword(Request $request)
  {

    $current_password = $request->get('current-password');
    $new_password =     $request->get('new-password');
    // The passwords matches
    if (!(Hash::check($current_password , Auth::user()->password))) {
      Session::flash("error","Your current password does not matches with the password you provided. Please try again.");
      return redirect()->back();
    }
    //Current password and new password are same
    if(strcmp($current_password , $new_password ) == 0){
      Session::flash("error","New Password cannot be same as your current password. Please choose a different password.");
      return redirect()->back();
    }

    $validatedData = $request->validate([
      'current-password' => 'required',
      'new-password' => 'required|string|min:6|confirmed',
    ]);

    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($new_password);
    $user->save();
    Session::flash("success","Password changed successfully !");
    return redirect()->route('account.profile');

  }
}
