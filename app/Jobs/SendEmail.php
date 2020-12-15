<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RequestMail;
use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Data request.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param Illuminate\Contracts\Mail\Mailer $mailer
     * 
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $emails = User::where('type', 1)->get();
        $emails = $emails->toArray();
        foreach ($emails as $key => $value) {
            $emails[$key] = $value['email'];
        }
        Mail::to($emails)->send(new RequestMail($this->data));
    }
}
