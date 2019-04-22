<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data; 
    public function __construct($value)
    {
        $this->data=$value;
    }


    public function build()
    {
        return $this->subject('Notification')->view('mail.registrationCode',compact('data'));
    }
}
