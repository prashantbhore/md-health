<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;

class MDHomeServiceController extends Controller
{
    public function  index(){
        $md_health_category_count = ProductCategory::where('status', 'active')->where('main_product_category_id', 1)->count();
        $md_shop_category_count = ProductCategory::where('status', 'active')->where('main_product_category_id', 2)->count();
        $md_food_category_count = ProductCategory::where('status', 'active')->where('main_product_category_id', 3)->count();
        $md_home_service_category_count = ProductCategory::where('status', 'active')->where('main_product_category_id', 4)->count();
        return view('admin.products-and-categories.categories.home-service',compact('md_health_category_count','md_shop_category_count','md_food_category_count','md_home_service_category_count'));
    }

    
    public function store(Request $request){

      if (!empty($request->id)){
      
          $existingCategory = ProductCategory::find($request->id);
    
          if ($existingCategory) {
              $existingCategory->update([
                  'main_product_category_id' => $request->main_category_id,
                  'product_category_name' => $request->category_name,
                  'modified_ip_address' => $request->ip()
              ]);
    
              if (!empty($request->subcategory)){
                  ProductSubCategory::where('product_category_id', $existingCategory->id)->delete();
                  foreach ($request->subcategory as $subcategory_data){
                      $sub_category_input = [
                          'product_category_id' => $existingCategory->id,
                          'product_sub_category_name' =>  $subcategory_data,
                          'created_ip_address' => $request->ip()
                      ];
    
                      ProductSubCategory::create($sub_category_input);
                  }
              }
    
              return redirect('admin/category-home-service')->with('success', 'Home Service Category updated successfully!');
          } else {
              return redirect()->back()->with('error', 'Category with ID ' . $request->id . ' not found.');
          }
      } else{
          $category_input = [
              'main_product_category_id' => $request->main_category_id,
              'product_category_name' => $request->category_name,
              'created_ip_address' => $request->ip()
          ];
    
          $product_category = ProductCategory::create($category_input);
    
          $brand_unique_id = "MD" . sprintf('%04d', $product_category->id);
    
          ProductCategory::where('id', $product_category->id)->update(['product_unique_id' => $brand_unique_id]);
    
          if (!empty($request->subcategory) && !empty($product_category)) {
              foreach ($request->subcategory as $subcategory_data) {
                  $sub_category_input = [
                      'product_category_id' => $product_category->id,
                      'product_sub_category_name' => $subcategory_data,
                      'created_ip_address' => $request->ip()
                  ];
    
                  ProductSubCategory::create($sub_category_input);
              }
          }
    
          return redirect('admin/category-home-service')->with('success', 'Home Service Category Added Successfully!');
      }
    }

    
  


    

    public function data_table(Request $request)
    {
  

        $porodcut_category = ProductCategory::where('status', '!=', 'delete')
        ->where('main_product_category_id', 4)
        ->with('subcategories')
        ->orderBy('created_at', 'desc') 
        ->get();
    


         if ($request->ajax()){
              return DataTables::of($porodcut_category)
            

          
            ->addColumn('id', function ($row){
                if(!empty($row->product_unique_id)){
                return ucfirst($row->product_unique_id);
                }
            })


            ->addColumn('product_category_name', function ($row){
              if(!empty($row->product_category_name)){
              return ucfirst($row->product_category_name);
              }
             })


             ->addColumn('subcategories', function ($row) {
              $subcategories = $row->subcategories;
          
              $nonEmptySubcategories = $subcategories->filter(function ($subcategory) {
                  return trim($subcategory->product_sub_category_name) !== '';
              });
          
              if ($nonEmptySubcategories->isNotEmpty()) {
                  $subcategoryNames = $nonEmptySubcategories->pluck('product_sub_category_name')->map(function ($name) {
                      return ucfirst($name);
                  })->implode(', ');
          
                  return $subcategoryNames;
              } else {
                  return '-'; 
              }
          })
          
          
          ->addColumn('created_at', function ($row){
                if(!empty($row->created_at)){
                return ucfirst($row->created_at);
                }
            })


            ->addColumn('status', function ($row){
              $status = $row->status;
  
              if ($status == 'active') {
                  $statusBtn = '<a href="javascript:void(0)"   data-id="' .  Crypt::encrypt($row->id) . '" data-table="md_product_category" data-flash="Status Changed Successfully!"  class="md-change-status activateLink mt-0"  >Activate</a>';
                } else {
                  $statusBtn = '<a href="javascript:void(0)"   data-id="' .  Crypt::encrypt($row->id) . '" data-table="md_product_category" data-flash="Status Changed Successfully!"  class="md-change-status deleteImg mt-0"  >Deactivate</a>';
              }
  
              return $statusBtn;
  
          })
  



          ->addColumn('action', function ($row){
       
            $actionBtn= '<div class="text-end d-flex align-items-center justify-content-end gap-3">
                    <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button"  data-bs-toggle="modal" data-bs-target="#addNewCategoryModal" title="Edit" onclick="editProductCategory(' . $row->id . ')">
                    <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                   </button>
                                      
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_product_category" data-flash="Product Category Deleted Successfully!" class="btn btn-danger product-category-delete btn-xs" title="Delete">
                                    <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                                </a>
                            </div>';

            return $actionBtn;
        })

        

       ->rawColumns(['action','status'])
        ->make(true);
    }
}

}
