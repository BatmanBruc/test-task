<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Data request.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * 
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pupkinandroit@gmail.com', 'Сервис заявок')
        ->subject('Новая заявка')
        ->view('mail')
        ->with($this->data)
        ->attach(public_path().'/uploads/'.$this->data['file'], ['as'=> $this->data['file']]);
    }
}
