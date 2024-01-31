<?php

namespace App\Http\Controllers\admin\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchaseDetails;

class AdminSalesController extends Controller
{
    public function index(){
        $md_health_sales= CustomerPurchaseDetails::where('status','active')
        ->count();

        return view('admin.sales.sales',compact('md_health_sales'));
    }
}
