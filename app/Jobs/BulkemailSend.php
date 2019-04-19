<?php

namespace App\Jobs;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BulkemailSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $message;
    protected $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$subject, $message)
    {
        $this->user = $user;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $user = $this->user;
      $message = $this->message;
      $subject = $this->subject;


      Mail::send('email' ,[  'message' =>  ' kool'], function($m) use ($user){
            $m->to($user)->subject($this->subject);

    });
    }
}
