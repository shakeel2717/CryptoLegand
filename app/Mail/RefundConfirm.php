<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundConfirm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user;
    public $plan;
    public $tid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$plan,$tid)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->tid = $tid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.refundConfirm');
    }
}
