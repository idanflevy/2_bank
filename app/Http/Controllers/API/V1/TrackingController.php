<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\Courier\CourierRequest;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trackingz;

class TrackingController extends BaseController
{


    protected $tracking = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Trackingz $tracking)
    {
        $this->middleware('auth:api');
        $this->tracking = $tracking;
    }
    public function index()
    {
        $tracking = Trackingz::latest()->paginate(10);

        return $this->sendResponse($tracking, 'tracking list');
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


        $tracking = $this->tracking->create([

            'gi_carrier_ref_no' => $request['gi_carrier_ref_no'],
            'ti_date' => $request['ti_date'],
            'ti_time' => $request['ti_time'],
            'ti_activities' => $request['ti_activities'],
            'ti_location' => $request['ti_location'],


        ]);

        return $this->sendResponse($tracking, ' Created Successfully');

        // $request->all();
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

        $tracking = $this->tracking::findOrFail($id);

        $tracking->update([
            //Shipper Info
            'ti_date' => $request['ti_date'],
            'ti_time' => $request['ti_time'],
            'ti_activities' => $request['ti_activities'],
            'ti_location' => $request['ti_location'],
        ]);

        // return $id;

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
        $tracking =  $this->tracking::findOrFail($id);
        //delete the user

        $tracking->delete();

        return $this->sendResponse($tracking, 'courier has been Deleted');

        //return ['message' => 'succesfully deleted'];
    }
}
