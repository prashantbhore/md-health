<?php

namespace App\Http\Controllers\admin\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchaseDetails;

class AdminMdhealthSalesController extends Controller
{

    public function index(){
        $md_health_sales= CustomerPurchaseDetails::where('status','active')
        ->count();

      
      return view('admin.sales.md-health-sales',compact('md_health_sales'));
    }

}
