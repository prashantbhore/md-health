<?php

namespace App\Http\Controllers\admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Country;
use DataTables;
use Crypt;

class CityController extends Controller
{

    public function index(){

        $countries = Country::where('status', 'active')
        ->orderBy('country_name', 'asc')
        ->get();

        // $cities = Cities::with('country')->where('status', '!=', 'delete')->get();

        // dd($cities);
        return view('admin.cities.add-cities',compact('countries'));

    }


    public function store(Request $request){

          $input['country_id'] = $request->country;
          $input['city_name'] = $request->city;
          $input['created_ip_address'] = $request->ip();
      
          $cities=Cities::create($input);

          return redirect('admin/add-cities')->with('success', 'City added successfully!');
       
    }


    public function data_table(Request $request)
    {
        $cities = Cities::with('country')->where('status', '!=', 'delete')->get();
    
        if ($request->ajax()) {
            return DataTables::of($cities)
                ->addIndexColumn()
                ->addColumn('city_name', function ($row) {
                    if(!empty($row->city_name)){
                    return ucfirst($row->city_name);
                    }
                })
                ->addColumn('country_name', function ($row) {
                    if(!empty($row->city_name)){
                    return ucfirst($row->country->country_name);
                    }
                })

                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/cities/' . Crypt::encrypt($row->id) . '/edit');
                    $actionBtn = '<a href="' . $editUrl . '">
                        <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit">
                            <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                        </button>
                    </a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="athletekar_event" data-flash="Event Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete">
                        <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                    </a>';
    
                    return $actionBtn;
                })
                ->rawColumns(['city_name', 'country_name','action'])
                ->make(true);
        }
    }
    

}
