<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Country;
use App\Http\Models\WithdrawalMethod;
use Hash;
use Auth;

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

  public function profile()
  {
    $countries = Country::pluck('name', 'id');
    $selectedCountry = 2;
    $withdrawMethods = Country::pluck('name', 'id');
    $selectedMethod = 2;
    return view('account.profile',compact('countries','selectedCountry',
      'withdrawMethods','selectedMethod'));
  }
  
  public function showchangePassword()
  {
    return view('account.changePassword');
  }
  
  public function changePassword(Request $request)
  {

    $current_password = $request->get('current_password');
    $new_password =     $request->get('new_password');

    if (!(Hash::check($current_password , Auth::user()->password))) {
// The passwords matches
      return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }

    if(strcmp($current_password , $new_password ) == 0){
//Current password and new password are same
      return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }

    $validatedData = $request->validate([
      'current_password' => 'required',
      'new_password' => 'required|string|min:6|confirmed',
    ]);

//Change Password
    $user = Auth::user();
    $user->password = bcrypt($new_password);
    $user->save();

    return redirect()->back()->with("success","Password changed successfully !");

  }
}
