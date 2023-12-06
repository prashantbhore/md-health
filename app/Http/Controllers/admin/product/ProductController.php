<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainProductCategory;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{
   public function  index(){

      $product_count = MainProductCategory::where('status', 'active')->count();
      $category_count = ProductCategory::where('status', 'active')->count();

   
    return view('admin.products-and-categories.products-and-categories',compact('product_count','category_count'));
   }
}
