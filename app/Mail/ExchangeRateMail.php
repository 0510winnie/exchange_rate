<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExchangeRateMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $rate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.exchange_rate');
    }
}
