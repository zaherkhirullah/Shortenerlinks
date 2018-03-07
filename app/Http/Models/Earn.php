<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\link;
use App\Http\Models\file;
use Auth ;
use App\User ;
use Carbon\Carbon;
class Earn extends Model
{
    // Today()->Format('Y-m-d')
    public function userlinks($user_id)
    {
        return link::where('user_id',$user_id);
    }
    public function userfiles($user_id)
    {
        return file::where('user_id',$user_id);
    }
    public function TodayLinkEarnings($user_id )
    {   $link = new link();
        $links = $link->where(
            [
                ['user_id',$user_id],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();
       $earn = 0;
        foreach($links as $linkk)
        {
            $earn += $linkk->earnings;
        }

        return $earn;
    }

    public function TodayFileEarnings($user_id)
    {   $file = new file();
        $earn = 0;
        $files = $file->where(
            [
                ['user_id',$user_id],
                ['created_at',">",Today()],
                ['created_at',"<",Carbon::today()->addDay(1)]
            ])->get();

         foreach($files as $filee)
        {
            $earn += $filee->earnings;
        }
        return $earn;
    }

    public function TotalLinkEarnings($user_id)
    {
        $earn = 0;
        $links = $this->userlinks($user_id)->get();

        foreach($links as $linkk)
        {
            $earn += $linkk->earnings;
        }
        return $earn;
    }
    public function TotalFileEarnings($user_id)
    {
        $earn = 0;
        $files = $this->userfiles($user_id)->get();
        foreach($files as $filee)
        {
            $earn += $filee->earnings;
        }
        return $earn;
    }
    public function TotalEarnings($user_id)
    {
        $earn =  $this->TotalFileEarnings($user_id) +
                 $this->TotalLinkEarnings($user_id)+
                 $this->Referral_MyEarnings($user_id);
        return $earn;
    }
    public function ReferralEarnings($user_id)
    {
        $earn = 0;
        $refUsers = User::where('referred_by',$user_id)->get();
        foreach($refUsers as $refUser)
        {
            $earn += $this->TotalEarnings($refUser->id);
        }
        return $earn;
    }
    // calculate user referal earnings
    public function Referral_MyEarnings($user_id)
    {
        $earn = 0;
        $refUsers=User::where('referred_by',$user_id)->get();
        $ref_earnings = Options::where('name','ref_earnings')->first();
        $ref_earnings =$ref_earnings->value;
        if(count($refUsers))
        {
            $user_earnings = $this->ReferralEarnings($user_id);
            $my_earnings =($user_earnings * $ref_earnings)  / 100;
            $earn = $my_earnings;
        }
        return $earn;
    }
     // calculate user referal earnings
     public function userRef_Earnings($user_id,$ref_id)
     {
         $earn = 0;
         $refUsers=User::where('referred_by',$user_id)->get();
         $ref_earnings = Options::where('name','ref_earnings')->first();
         $ref_earnings =$ref_earnings->value;
         if(count($refUsers))
         {
            //  $user_earnings = $this->ReferralEarnings($user_id);
             $user_earnings = $this->TotalEarnings($ref_id);
             $my_earnings =($user_earnings * $ref_earnings)  / 100;
             $earn = $my_earnings;
         }
         return $earn;
     }
    public function add_to_ref_Balance($ref_id, $price)
    {
        $earn = 0;
        $ref_User = User::where('id',$ref_id)->first();

        if($ref_User)
        {
            $ref_earnings = Options::where('name','ref_earnings')->first();
            $ref_earnings =$ref_earnings->value;
            $earn = ( $price * $ref_earnings)  / 100;
            $Balance =$ref_User->Balance;
            $Balance->avilable_amount +=   $earn ;
            $Balance->save();
        }
        return $earn;
    }
}
