<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use App\Mail\withdrawMail;

class MailController extends Controller
{
    public function sendMail(Request $request ,$page)
    {
        $email = new Mailer();
        $from='from@from.com';
        $subject='subject';
        $to=$request->mail;
        $data=[
            'username'=>'Shortenerlinks',
            // 'username'=>'Shortenerlinks',
            // 'username'=>'Shortenerlinks',
            ];
        // $email->to($to)->send(new WithdrawMail($request->title));
        
        $email->send($page,$data,function($message) use($to,$subject,$from) {
            $message->from($from);
            $message->to($to);
            $message->subject($subject);
        });
    }
    public function welcome(Request $request,$page)
    {
        $page = "mail.welcome";
        $this->sendMail($request::all() ,$page);
    }
    public function confirmEmail(Request $request,Mailer $email)
    {
        $page = "mail.confirmEmail";
        $this->sendMail($request::all() ,$page);
        

        
    }
    public function contact(Request $request,Mailer $email)
    {
        $page = "mail.contatcs";
        $this->sendMail($request::all() ,$page);
        

        
    }
    public function withdraw(Request $request,Mailer $email)
    {
        $page = "mail.withdraw";
        $this->sendMail($request::all() ,$page);
        
        

    }
   
    
}
