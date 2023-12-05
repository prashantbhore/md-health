<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MDHomeServiceController extends Controller
{
    public function  index(){
        return view('admin.products-and-categories.categories.home-service');
    }
}
