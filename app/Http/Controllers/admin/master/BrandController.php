<?php

namespace App\Http\Controllers\admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrnadCategory;
use App\Models\VehicleBrand;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class BrandController extends Controller
{
   public function index(){
      $brand_category=BrnadCategory::where('status','active')->get();

      $brandCount = VehicleBrand::where('status','active')->count();

 

     return view('admin.brands.brands',compact('brand_category','brandCount'));
   }



   public function store(Request $request){

    $request->validate([
        'brand_category' => 'required',
        'brand_name' => 'required',
    ]);

    

    $input = [
        'brand_category_id' => $request->brand_category,
        'brand_name' => $request->brand_name,
    ];

    if (!empty($request->id)) {
        $input['modified_ip_address'] = $request->ip();

        VehicleBrand::find($request->id)->update($input);

        return redirect('admin/brands')->with('success', 'Brand updated successfully!');
    }

    $input['created_ip_address'] = $request->ip();

    $existingBrand = VehicleBrand::where('status','active')->where('brand_name', $request->brand_name)->first();

    if ($existingBrand) {
        return redirect()->back()->with('error', 'Brand with the same name already exists.');
    }

    $brand = VehicleBrand::create($input);

    $brand_unique_id = "MD" . sprintf('%04d', $brand->id);

    VehicleBrand::where('id', $brand->id)->update(['brand_unique_id' =>  $brand_unique_id]);

    return redirect('admin/brands')->with('success', 'Brand added successfully!');
}



public function data_table(Request $request)
{
  
//    dd($request->brand_category);

    $brands = VehicleBrand::with('brand_category')->where('status', '!=', 'delete')->get();


    if ($request->ajax()) {
        return DataTables::of($brands)
            

            ->addColumn('brand_unique_id', function ($row){
                if(!empty($row->brand_unique_id)){
                return ucfirst($row->brand_unique_id);
                }
            })

          
            ->addColumn('brand_name', function ($row){
                if(!empty($row->brand_name)){
                return ucfirst($row->brand_name);
                }
            })


            ->addColumn('brand_category', function ($row){
                if(!empty($row->brand_category->category_name)){
                return ucfirst($row->brand_category->category_name);
                }
            })



            ->addColumn('action', function ($row) {
                $actionBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" data-bs-toggle="modal" data-bs-target="#addNewBrandModal" title="Edit" onclick="editBrand(' . $row->id . ')">
                    <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                </button>
            
                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_master_brand" data-flash="Brand Deleted Successfully!" class="btn btn-danger brand-delete btn-xs" title="Delete">
                    <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                </a>';
            
                return $actionBtn;
            })
            


           
            ->rawColumns(['action'])
            ->make(true);
    }
}



public function delete_brand(Request $request)
{
    $id = !empty($request->id) ? $request->id : '';

   
    
    $old_data =VehicleBrand::where('id', $id)->first();

    $new_data = VehicleBrand::where('id', $id)->update([
        'status' => 'delete',
        'modified_ip_address' => $_SERVER['REMOTE_ADDR']
    ]);

   // LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
    return response()->json(['message' => $request->flash, 'status' => 'true']);
}

public function edit_brand(Request $request){
    $id=$request->id;

    $brand =VehicleBrand::where('id', $id)->first();

 

    return response()->json([
        'id'=>$brand->id,
        'brand_category_id' => $brand->brand_category_id,
        'brand_name' =>$brand->brand_name,
    ]);
    
}






}
