<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function printsearch(Request $request)
    {




        $request->validate([
            'query' => 'required|min:0'
        ]);

        $search_text = $request->input('query');
        $couriers = DB::table('processes')
            ->where('gi_carrier_ref_no', 'LIKE', '%' . $search_text)
            //   ->orWhere('SurfaceArea','<', 10)
            //   ->orWhere('LocalName','like','%'.$search_text.'%')
            ->paginate(1);

        // $trackings = DB::table('trackingzs')
        //     ->where('gi_carrier_ref_no', 'LIKE', '%' . $search_text)
        //     //   ->orWhere('SurfaceArea','<', 10)
        //     //   ->orWhere('LocalName','like','%'.$search_text.'%')
        //     ->paginate(100000000);


        return view('printitem', [
            'couriers' => $couriers,
            //'trackings' => $trackings

        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:5'
        ]);

        $search_text = $request->input('query');
        $couriers = DB::table('processes')
            ->where('gi_carrier_ref_no', 'LIKE', '%' . $search_text)
            //   ->orWhere('SurfaceArea','<', 10)
            //   ->orWhere('LocalName','like','%'.$search_text.'%')
            ->paginate(1);

        $trackings = DB::table('trackingzs')
            ->where('gi_carrier_ref_no', 'LIKE', '%' . $search_text)
            //   ->orWhere('SurfaceArea','<', 10)
            //   ->orWhere('LocalName','like','%'.$search_text.'%')
            ->paginate(100000000);


        return view('search', [
            'couriers' => $couriers,
            'trackings' => $trackings

        ]);
    }
}
