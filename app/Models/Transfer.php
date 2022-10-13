<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'transferFrom', 'transferTo', 'memo', 'amount'
    ];
    protected $table = 'transfers';
}
