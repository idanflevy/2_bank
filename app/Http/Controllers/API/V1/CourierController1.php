<?php

namespace App\Http\Controllers\API\V1;

//use App\Http\Requests\;

use Illuminate\Http\Request;
use App\Models\Courier;
use Illuminate\Support\Facades\DB;

class CourierController extends  BaseController
{
    //

    protected $courier = '';

    public function __construct(Courier $courier)
    {
        $this->middleware('auth:api');
        $this->courier = $courier;
    }

    public function index()
    {
        $courier = Courier::latest()->paginate(10);

        return $this->sendResponse($courier, ' courier');
    }

    public function store(Request $request)
    {


        $courier = $this->courier->create([

            //Shipper Info
            'si_name' => $request['si_name'],
            'si_region' => $request['si_region'],
            'si_phone_number' => $request['si_phone_number'],
            'gi_carrier_ref_no' => $request['gi_carrier_ref_no'],
            'si_email' => $request['si_email'],

            //Reciever Info
            'ri_name' => $request['ri_name'],
            'ri_address' => $request['ri_address'],
            'ri_number' => $request['ri_number'],
            'ri_email' => $request['ri_email'],

            //Goods info Info

            'gi_origin' => $request['gi_origin'],
            'gi_destination' => $request['gi_destination'],
            'gi_weight' => $request['gi_weight'],
            'gi_product' => $request['gi_product'],
            'gi_total_freight' => $request['gi_total_freight'],
            'gi_pickup_date' => $request['gi_pickup_date'],
            'gi_package' => $request['gi_package'],
            'gi_shipment_mode' => $request['gi_shipment_mode'],
            'gi_qty' => $request['gi_qty'],
            'gi_edd' => $request['gi_edd'],
            'gi_status' => $request['gi_status'],
            'gi_typeof_shipment' => $request['gi_typeof_shipment'],
            'gi_payment_mode' => $request['gi_payment_mode'],
            'gi_departure_time' => $request['gi_departure_time'],
            'gi_comments' => $request['gi_comments'],

        ]);

        return $this->sendResponse($courier, 'Courier Created Successfully');

        // $request->all();
    }


    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'vessel_name' => 'required|string|max:191',
        //     'voy_no' => 'required|string|max:191',
        //     'vessel_type' => 'required|string|max:191',

        // ]);

        $courier = $this->courier::findOrFail($id);


        $courier->update($request->all());



        return $this->sendResponse($courier, ' CourierInformation has been updated');
        // return ['message' => 'succesfully updated'];
    }
}
