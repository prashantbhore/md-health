<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class MDhealthController extends Controller
{
    public function  index(){
      return view('admin.products-and-categories.categories.mdhealth');
    }





    public function store(Request $request){
      $category_input = [
        'main_product_category_id' => $request->main_category_id,
        'product_category_name' => $request->category_name,
        'created_ip_address'=> $request->ip()
       
    ];
     
    $product_category= ProductCategory::create($category_input);


    $brand_unique_id = "MD" . sprintf('%04d', $product_category->id);

    ProductCategory::where('id', $product_category->id)->update(['product_unique_id' =>  $brand_unique_id]);



    if(!empty($request->treatments)&&!empty($product_category)){
       foreach($request->treatments as $treatment){
        $sub_category_input = [
          'product_category_id' => $product_category->id,
          'product_sub_category_name' => $treatment,
          'created_ip_address'=> $request->ip()
        ];
   
     $product_sub_category= ProductSubCategory::create($sub_category_input);
    }
    }
   return redirect('admin/category-mdhealth')->with('success', 'MDhealth Category added successfully!');
}




public function data_table(Request $request)
{
  

    $customers=CustomerRegistration::with('country')->with('city')->where('status','!=','delete')->get();


    if ($request->ajax()) {
        return DataTables::of($customers)
            

        ->addColumn('name', function ($row) {
            $fullName = '';
        
            if (!empty($row->first_name)) {
                $fullName .= ucfirst($row->first_name);
            }
        
            if (!empty($row->last_name)) {
                $fullName .= ' ' . ucfirst($row->last_name);
            }
        
            return $fullName;
        })
        
          
            ->addColumn('gender', function ($row){
                if(!empty($row->gender)){
                return ucfirst($row->gender);
                }
            })


            ->addColumn('age', function ($row){
                return ucfirst(0);
            })


            
            ->addColumn('country', function ($row){
                if(!empty($row->country->country_name)){
                return ucfirst($row->country->country_name);
                }
            })


            ->addColumn('city', function ($row){
                if(!empty($row->city->city_name)){
                return ucfirst($row->city->city_name);
                }
            })

            ->addColumn('phone', function ($row){
                if(!empty($row->phone)){
                return ucfirst($row->phone);
                }
            })





            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('customer.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
                    <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
                </a>
                
                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Customer Deleted Successfully!" class="btn btn-danger customer-delete btn-xs" title="Delete">
                    <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                </a>';
            

            return $actionBtn;
        })
            


           
            ->rawColumns(['action'])
            ->make(true);
    }
}






}
