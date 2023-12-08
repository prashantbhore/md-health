<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\MedicalProviderRegistrater;
use App\Models\MedicalProviderLogo;
use App\Models\ProductCategory;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;



class ProductMDhealthPackageController extends Controller
{

    public function index(){

         $packages=Packages::with('provider','provider_logo','product_category')->get();

       
         
       // dd($packages);

        return view('admin.products-and-categories.products/mdhealth');
    }


    public function data_table(Request $request)
    {
  
        $packages = Packages::with('provider', 'provider_logo', 'product_category')
        ->where('status', '!=', 'delete')
        ->orderBy('created_at', 'asc')
        ->get();
    


    if ($request->ajax()){
        return DataTables::of($packages)
        
        ->addColumn('id', function ($row){
                if(!empty($row->package_unique_no)){
                return ucfirst($row->package_unique_no);
                }
            })


        ->addColumn('package_name', function ($row){
              if(!empty($row->package_name)){
              return ucfirst($row->package_name);
              }
             })


        ->addColumn('provider', function ($row){
                if(!empty($row->provider->company_name)){
                return ucfirst($row->provider->company_name);
                }
            })

        ->addColumn('category', function ($row){
            if(!empty($row->product_category->product_category_name)){
            return ucfirst($row->product_category->product_category_name);
            }
        })


        ->addColumn('package_price', function ($row){
            if(!empty($row->package_price)){
            return ucfirst($row->package_price);
            }
        })



        ->addColumn('status', function ($row){
            $status = $row->status;

            if ($status == 'active') {
                $statusBtn = '<a href="javascript:void(0)"   data-id="' .  Crypt::encrypt($row->id) . '" data-table="md_packages" data-flash="Status Changed Successfully!"  class="md-change-status deleteImg mt-0"  >Deactivate</a>';
              } else {
                $statusBtn = '<a href="javascript:void(0)"   data-id="' .  Crypt::encrypt($row->id) . '" data-table="md_packages" data-flash="Status Changed Successfully!"  class="md-change-status activateLink mt-0"  >Activate</a>';

             }

            return $statusBtn;

        })






          ->addColumn('action', function ($row){
      
            $actionBtn = '<div class="text-end d-flex align-items-center justify-content-end gap-3">
            <a href="' . url('admin/product-details/'.Crypt::encrypt($row->id)) . '">
                <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="" />
            </a>

            <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_packages" data-flash="Package Deleted Successfully!" class="btn btn-danger package_delete btn-xs" title="Delete"><img src="' . asset('admin/assets/img/deleteEntryBlack.png') . '" alt="" /></a>
            
        </div>';
        
        

            return $actionBtn;
        })



           
            ->rawColumns(['action','status'])
            ->make(true);
    }
}




public function delete_md_health_package_delete(Request $request){
      $id = !empty($request->id) ? $request->id : '';
      $old_data =Packages::where('id', $id)->first();
      Packages::where('id', $id)->update([
      'status' => 'delete',
      'modified_ip_address' => $_SERVER['REMOTE_ADDR']
    ]);
    return response()->json(['message' => $request->flash, 'status' => 'true']);
}



public function show(Request $request){
    $id = !empty($request->id) ? Crypt::decrypt($request->id) : '';
    $package = Packages::with('provider', 'provider_logo', 'product_category')->where('id', $id)->first();

    // Check if other_services is not empty before exploding
    $otherServicesArray = !empty($package->other_services) ? explode(',', $package->other_services) : [];

    //dd($otherServicesArray);

    return view('admin.products-and-categories.products.product-details', compact('package','otherServicesArray'));
}



public function status(Request $request)
{
    $id = !empty($request->id) ? $request->id: '';

    $old_data =Packages::where('id', $id)->first();
    $status =Packages::where('id', $id)->value('status');

    if ($status == 'active') {
        $block_status = Packages::where('id', $id)->update([
            'status' => 'inactive',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
        return response()->json(['message' =>'Package Status Change To Inactive' , 'status' => 'true']);
    } else {

        $active_status = Packages::where('id', $id)->update([
            'status' => 'active',
             'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

        return response()->json(['message' =>'Package Status Change To Active' , 'status' => 'true']);
      
    }
   
}



public function package_delete(Request $request)
{
    $id = !empty($request->id) ? $request->id : '';
    $old_data = Packages::where('id', $id)->first();
    $new_data = Packages::where('id', $id)->update([
        'status' => 'delete',
        'modified_ip_address' => $_SERVER['REMOTE_ADDR']
    ]);
    return response()->json(['message' =>'Package Is Deleted', 'status' => 'true']);
}


public function store(Request $request){

    dd($request->all());


                   $package_input['package_name'] = $request->package_name;
                    $package_input['treatment_category_id'] = $request->treatment_category_id;
                    $package_input['treatment_id'] = $request->treatment_id;
                    $package_input['other_services'] = $request->other_services;
                    $package_input['treatment_period_in_days'] = $request->treatment_period_in_days;
                    $package_input['treatment_price'] = $request->treatment_price;
                    $package_input['hotel_id'] = $request->hotel_id;
                    $package_input['hotel_in_time'] = $request->hotel_in_time;
                    $package_input['hotel_out_time'] = $request->hotel_out_time;
                    $package_input['hotel_acommodition_price'] = $request->hotel_acommodition_price;
                    $package_input['vehicle_id'] = $request->vehicle_id;
                    $package_input['vehicle_in_time'] = $request->vehicle_in_time;
                    $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                    $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                    $package_input['visa_details'] = $request->visa_details;
                    $package_input['visa_service_price'] = $request->visa_service_price;
                    $package_input['package_discount'] = $request->package_discount;
                    $package_input['package_price'] = $request->package_price;
                    $package_input['sale_price'] = $request->sale_price;
                    $package_input['platform_type'] = $request->platform_type;
                    $edit_packages= Packages::where('id', $request->id)->update($package_input);





}


  










}
