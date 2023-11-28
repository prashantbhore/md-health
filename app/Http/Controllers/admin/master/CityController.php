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
       
         dd('hh');
        // $cities = Cities::with('country')->where('status', '!=', 'delete')->get();

        $cities = Cities::where('status', '!=', 'delete')->get();

 

   
        if ($request->ajax($$cities)){
            return DataTables::of()
                ->addIndexColumn()

                ->addColumn('city_name', function ($row) {
                    if (!empty($row->city_name)) {
                        return ucfirst($row->city_name);
                    }
                })

                ->addColumn('country_name', function ($row){
                    if (!empty($row->country->country_name)) {
                        return ucfirst($row->country->country_name);
                    }
                })

          
           




        

                // ->addColumn('status', function ($row) {
                //     if ($row->status == 'active') {
                //         $statusActiveBtn = '<a href="javascript:void(0)"   data-id="' . Crypt::encrypt($row->id) . '" data-table="athletekar_student" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                //         return $statusActiveBtn;
                //     } else {
                //         $statusBlockBtn = '<a href="javascript:void(0)"   data-id="' . Crypt::encrypt($row->id) . '" data-table="athletekar_student" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                //         return $statusBlockBtn;
                //     }
                // })


                // ->addColumn('action', function ($row) {
                //     $actionBtn = '<a href="javascript:void(0)" data-id="' . $row->id . '" data-table="athletekar_student" data-flash="Event Deleted Successfully!" class="btn btn-danger athlete-delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
                //               <a href="' . url('/admin/athlete/' . Crypt::encrypt($row->id) . '/athlete-view') . '"> <button type="button" data-id="' . $row->id . '"  class="btn btn-dark btn-xs"  title="View"> <i class="fa fa-eye"></i>   </a>';
                //     return $actionBtn;
                // })


                // ->rawColumns(['action', 'status'])

                ->rawColumns()
                ->make(true);
        }
    }





}
