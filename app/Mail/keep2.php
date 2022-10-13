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
    public $gi_carrier_ref_no;
    public  $si_region;
    public $si_phone_number;
    public $si_email;
    public $ri_name;
    public $ri_address;
    public $ri_number;
    public $ri_email;
    public $gi_origin;
    public $gi_destination;
    public $gi_weight;
    public $gi_product;
    public $gi_total_freight;
    public $gi_status;
    public $gi_typeof_shipment;
    public $gi_payment_mode;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $gi_carrier_ref_no,
        $si_region,
        $si_phone_number,
        $si_email,
        $ri_name,
        $ri_address,
        $ri_number,
        $ri_email,
        $gi_origin,
        $gi_destination,
        $gi_weight,
        $gi_product,
        $gi_total_freight,
        $gi_status,
        $gi_typeof_shipment,
        $gi_payment_mode
    ) {
        //

        $this->name = $name;
        $this->gi_carrier_ref_no = $gi_carrier_ref_no;
        $this->si_region = $si_region;
        $this->si_phone_number = $si_phone_number;
        $this->si_email = $si_email;
        $this->ri_name = $ri_name;
        $this->ri_address = $ri_address;
        $this->ri_number = $ri_number;
        $this->ri_email = $ri_email;
        $this->gi_origin = $gi_origin;
        $this->gi_destination = $gi_destination;
        $this->gi_weight = $gi_weight;
        $this->gi_product = $gi_product;
        $this->gi_total_freight = $gi_total_freight;
        $this->gi_status = $gi_status;
        $this->gi_typeof_shipment = $gi_typeof_shipment;
        $this->gi_payment_mode = $gi_payment_mode;
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
