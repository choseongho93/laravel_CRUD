<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailable;
//use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;

/*************************
 * 이메일 발송 (API)
 * Queue Redis를 이용한 이메일 발송
 *
 * Class EmailController
 * @package App\Http\Controllers
 *************************/

class EmailController extends Controller
{
    public function sendEmail(){
        SendEmailJob::dispatch();


//        $to_name = 'nate';
//        $to_email = '';
//        $data = array("name"=>$to_name);
//
//        Mail::send("mail", $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name) ->subject("안내문");
//            $message->from("", "");
//        });
//
//        return 'Email sent Successfully';


    }
}
