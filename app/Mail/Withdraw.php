<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Withdraw extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $amount;
    public $method;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount, $method, $address)
    {
        $this->amount = $amount;
        $this->method = $method;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.withdraw');
    }
}
