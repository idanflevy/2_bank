<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //use HasFactory;

    protected $fillable = [

        ///  SI = Shipper Information////
        'si_name', 'si_region', 'si_phone_number', 'gi_carrier_ref_no', 'si_email', 'ri_name', 'ri_address', 'ri_number', 'ri_email', 'gi_origin', 'gi_destination', 'gi_weight', 'gi_product', 'gi_total_freight', 'gi_pickup_date', 'gi_package', 'gi_shipment_mode', 'gi_qty', 'gi_edd', 'gi_pickup_time', 'gi_status', 'gi_typeof_shipment', 'gi_payment_mode', 'gi_departure_time', 'gi_comments'

    ];
}
