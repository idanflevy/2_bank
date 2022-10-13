<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trackingz
extends Model
{
    use HasFactory;

    protected $fillable = [
        'gi_carrier_ref_no', 'ti_date', 'ti_time', 'ti_activities', 'ti_location'
    ];
}
