<?php

namespace App\Http\Controllers\admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Country;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;

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


    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'city' => 'required',
        ]);
    
     
        $existingCity = Cities::where('country_id', $request->country)
                                ->where('city_name', $request->city)
                                ->first();
    
        if ($existingCity) {
            return redirect('admin/add-cities')->with('error', 'City already exists for this country!');
        }
    
        $input = [
            'country_id' => $request->country,
            'city_name' => $request->city,
        ];
    
        if (!empty($request->id)) {
            $input['modified_ip_address'] = $request->ip();
    
            Cities::find($request->id)->update($input);
    
            return redirect('admin/add-cities')->with('success', 'City updated successfully!');
        }
    
        $input['created_ip_address'] = $request->ip();
        Cities::create($input);
    
        return redirect('admin/add-cities')->with('success', 'City added successfully!');
    }
    
    

    public function data_table(Request $request)
    {
         // dd($request->status);
        //  if($request->status=='all'){
        $cities = Cities::with('country')->where('status', '!=', 'delete')->get();
        //  }


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


                
                ->addColumn('status', function ($row){
                    $status = $row->status;
                
                    if ($status == 'active') {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_master_cities" data-flash="Status Changed Successfully!" class="md-change-status deleteImg mt-0 deactivate-btn">Deactivate</a>';
                    } else {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_master_cities" data-flash="Status Changed Successfully!" class="md-change-status activateLink mt-0 activate-btn">Activate</a>';
                    }
                
                    return $statusBtn;
                })
                

                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/cities/' . Crypt::encrypt($row->id) . '/edit');
                    $actionBtn = '<a href="' . $editUrl . '">
                        <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit">
                            <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                        </button>
                    </a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_master_cities" data-flash="City Deleted Successfully!" class="btn btn-danger city-delete btn-xs" title="Delete">
                        <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                    </a>';
    
                    return $actionBtn;
                })


                
                ->rawColumns(['city_name', 'country_name','action','status'])
                ->make(true);
        }
    }



    public function edit_city(Request $request){

        $id=Crypt::decrypt($request->id);
        $city= Cities::with('country')->where('status', '!=', 'delete')->where('id',$id)->first();

        $countries = Country::where('status', 'active')
        ->orderBy('country_name', 'asc')
        ->get();

        return view('admin.cities.add-cities',compact('countries','city'));

    }


    // public function delete_city()

    public function delete_city(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';
        
        $old_data =Cities::where('id', $id)->first();

        $new_data = Cities::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

       // LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }
    

}
