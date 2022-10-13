<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'tracking';

    protected $primaryKey = 'id';

    protected $fillable = [
        'gi_carrier_ref_no', 'ti_date', 'ti_activities', 'ti_location'
    ];


    //A tracking belong to courier proccess 
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
