<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\Shipschedule\ShipscheduleRequest;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipschedule;

class All_ScheduleController extends BaseController
{

    public function index_one()
    {
        $shipschedule = Shipschedule::latest()->paginate(4);

        return $this->sendResponse($shipschedule, 'schedule list');
    }
}
