<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MDshopController extends Controller
{
    public function  index(){
        return view('admin.products-and-categories.categories.mdshop');
      }
}
