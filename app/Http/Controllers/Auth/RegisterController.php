<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Balance;
use App\Http\Models\address;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
use Cookie;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/user/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm($ref =null)
    {
            $ref = Input::get('ref');
            return view('auth.register',compact('ref'));
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, 
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',

            ]);
    }
  

    protected function create(array $data)
    {    
        // $referred_by = Cookie::get('referral');

        $code = $data['ref'];
        $referred_by =null;
        if($code!=null)
        {
            $userr = User::where([['affiliate_id',$code]])->first();
            $referred_by =  $userr->id;
        }
        $ip =\Request::ip();
        $ip =geoip($ip)->ip;
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'plan_id' => 2,
            'ip' =>$ip,
            'password' => bcrypt($data['password']),
            'affiliate_id' => str_random(10),
            'referred_by'   => $referred_by,
        ]);
        $profile=$user->profile()->save(new Profile);
        if(!$profile)
             $user->delete();
       $Balance= $user->Balance()->save(new Balance);
        if(!$Balance)
            $user->delete();
       $address= $profile->address()->save(new address);
        if(!$address)
        $user->delete();

     return $user;
    }

}
