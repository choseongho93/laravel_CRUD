<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailable;
//use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;



class EmailController extends Controller
{
    public function sendEmail(){
        SendEmailJob::dispatch();


//        $to_name = 'nate';
//        $to_email = 'choseongho93@naver.com';
//        $data = array("name"=>$to_name);
//
//        Mail::send("mail", $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name) ->subject("안내문");
//            $message->from("choseongho93@gmail.com", "루나소프트");
//        });
//
//        return 'Email sent Successfully';


    }
}
