<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email, $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id,$email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $to_name = $this->id;
            $to_email = $this->email;
            $data = array("name"=>$to_name);

            Mail::send("mail", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name) ->subject("안내문");
                $message->from("choseongho93@gmail.com", "루나소프트");
            });

        }catch (Exception $e){
            return "job error";
        }

    }
}
