<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function  index(){
    return view('admin.products-and-categories.products-and-categories');
   }
}
