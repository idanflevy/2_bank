<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public  $gi_carrier_ref_no;
    public  $ri_address;
    public  $si_email;
    public  $region;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $gi_carrier_ref_no, $ri_address, $si_email, $region)
    {
        //

        $this->name = $name;
        $this->gi_carrier_ref_no = $gi_carrier_ref_no;
        $this->ri_address = $ri_address;
        $this->si_email = $si_email;
        $this->region = $region;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome')->subject("On the way");
    }
}
