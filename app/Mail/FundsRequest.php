<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundsRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 
    public function __construct($value)
    {
        $this->data=$value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Add Funds Requested')->view('mail.funds',compact('data'));
    }
}
