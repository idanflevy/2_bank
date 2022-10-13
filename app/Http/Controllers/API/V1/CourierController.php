<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\Courier\CourierRequest;
use App\Mail\Welcome;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Process;

class CourierController extends BaseController
{


    protected $courier = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Process $courier)
    {
        $this->middleware('auth:api');
        $this->courier = $courier;
    }
    public function index()
    {
        $courier = Process::latest()->paginate(10);

        return $this->sendResponse($courier, 'schedule list');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return  $request->all();
        // $this->validate($request, [
        //     'vessel_name' => 'required|string|max:191',
        //     'voy_no' => 'required|string|max:191',
        //     'vessel_type' => 'required|string|max:191',

        // ]);


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
            'gi_pickup_time' => $request['gi_pickup_time'],
            'gi_status' => $request['gi_status'],
            'gi_typeof_shipment' => $request['gi_typeof_shipment'],
            'gi_payment_mode' => $request['gi_payment_mode'],
            'gi_departure_time' => $request['gi_departure_time'],
            'gi_comments' => $request['gi_comments'],


        ]);

        $name =  $request->ri_name;
        $si_email =  $request->si_email;
        $region =  $request->si_region;
        $ri_address =  $request->ri_address;
        $gi_carrier_ref_no =  $request->gi_carrier_ref_no;
        $mailto =  $request->ri_email;
        // $gi_carrier_ref_no = '538429117';
        //$mailto = 'Lamiebobo@hotmail.com';
        //  $mailto = 'info@bhlworld.space';

        Mail::to($mailto)->send(new Welcome($name, $gi_carrier_ref_no, $ri_address, $si_email, $region));


        return $this->sendResponse($courier, ' Created Successfully');

        // $request->all();
    }
    public function store2(Request $request)
    {
        $email_data = array(
            'name' => ['Nguyen'],
            'email' => ['info@bhlworld.space'],
            'gi_carrier_ref_no' => ['info@bhlworld.space'],
        );

        // $data = $request->all();
        $name =  $request->si_name;
        $gi_carrier_ref_no =  $request->gi_carrier_ref_no;
        $mailto =  $request->ri_email;
        // $gi_carrier_ref_no = '538429117';
        //$mailto = 'Lamiebobo@hotmail.com';
        //  $mailto = 'info@bhlworld.space';

        //Mail::to($mailto)->send(new Welcome($name, $gi_carrier_ref_no));

        //  return new Welcome($name, $gi_carrier_ref_no);

        // $data = array('name' => "Virat Gandhi");

        // Mail::send(['text' => 'mail'], $data, function ($message) {
        //     $message->to('info@bhlworld.space', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
        //     $message->from('info@bhlworld.space', 'Virat Gandhi');
        // });
        // echo "Basic Email Sent. Check your inbox.";
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'vessel_name' => 'required|string|max:191',
        //     'voy_no' => 'required|string|max:191',
        //     'vessel_type' => 'required|string|max:191',

        // ]);

        $courier = $this->courier::findOrFail($id);

        $courier->update([
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
            'gi_pickup_time' => $request['gi_pickup_time'],
            'gi_status' => $request['gi_status'],
            'gi_typeof_shipment' => $request['gi_typeof_shipment'],
            'gi_payment_mode' => $request['gi_payment_mode'],
            'gi_departure_time' => $request['gi_departure_time'],
            'gi_comments' => $request['gi_comments'],
        ]);

        //$ri_name  => ($request['gi_comments']);

        //  $data = $request->all();

        // Mail::to($mailto)->send(new Welcome($data));








        return $this->sendResponse($id, 'courier Information has been updated');

        // return ['message' => 'succesfully updated'];
    }


    public function updat(Request $request, $id)
    {
        return ['message' => 'update forn mew controller'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)


    {
        $this->authorize('isAdmin');
        $courier =  $this->courier::findOrFail($id);
        //delete the user

        $courier->delete();

        return $this->sendResponse($courier, 'courier has been Deleted');

        //   return ['message' => 'succesfully deleted'];
    }
}
