<?php

namespace App\Http\Controllers\admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cities;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;

class countryController extends Controller
{
    public function index(){

        // $country = Country::where('status', '!=', 'delete')->get();

        // dd($country);

     return view('admin.country.add-country');

    }

  

    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'country_code' => 'required',
        ]);
    
        $existingCountry = Country::where('country_name', $request->country)
                                   ->where('country_code', $request->country_code)
                                   ->first();
    
        if ($existingCountry) {
            return redirect('admin/add-country')->with('error', 'Country already exists for this country!');
        }
    
        $input = [
            'country_name' => $request->country,
            'country_code' => $request->country_code,
        ];
    
        if (!empty($request->id)) {
            // Update existing country
            $input['modified_ip_address'] = $request->ip();
    
            Country::find($request->id)->update($input);
    
            return redirect('admin/add-country')->with('success', 'Country updated successfully!');
        } else {
            // Create new country
            $input['created_ip_address'] = $request->ip();
    
            Country::create($input);
    
            return redirect('admin/add-country')->with('success', 'Country added successfully!');
        }
    }



    public function data_table(Request $request)
    {
       
        $country = Country::where('status', '!=', 'delete')->orderBy('created_at', 'desc')->get();
    
        if ($request->ajax()) {
            return DataTables::of($country)
                ->addIndexColumn()
                ->addColumn('country_code', function ($row){
                    if(!empty($row->country_code)){
                    return ucfirst($row->country_code);
                    }
                })

                ->addColumn('country_name', function ($row) {
                    if(!empty($row->country_name)){
                    return ucfirst($row->country_name);
                    }
                })

                

                ->addColumn('status', function ($row) {
                    $status = $row->status;
                
                    if ($status == 'active') {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_master_country" data-flash="Status Changed Successfully!" class="md-change-status deleteImg mt-0 deactivate-btn">Deactivate</a>';
                    } else {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_master_country" data-flash="Status Changed Successfully!" class="md-change-status activateLink mt-0 activate-btn">Activate</a>';
                    }
                
                    return $statusBtn;
                })
                


                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/country/' . Crypt::encrypt($row->id) . '/edit');
                    $actionBtn = '<a href="' . $editUrl . '">
                        <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit">
                            <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                        </button>
                    </a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_master_country" data-flash="Country Deleted Successfully!" class="btn btn-danger country-delete btn-xs" title="Delete">
                        <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                    </a>';
    
                    return $actionBtn;
                })
                ->rawColumns(['country_code', 'country_name','action','status'])
                ->make(true);
        }
    }



    
    public function edit_country(Request $request){

        $id=Crypt::decrypt($request->id);
        $country= Country::where('id',$id)->first();

       // dd($country);


        return view('admin.country.add-country',compact('country'));

    }



    public function country_delete(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';
        
        $old_data =Country::where('id', $id)->first();

        $new_data = Country::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

       // LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }
    
    



    
}
