<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Country;
use App\Http\Models\WithdrawalMethod;

class AccountController extends Controller
{
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
  public function changepassword()
  {
    return view('account.changepassword');
  }
}
