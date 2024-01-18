<?php

namespace App\Http\Controllers\Front\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class VendorSalesController extends Controller
{

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(){
        return view('front.mdhealth.vendor.vendor_sales');
    }
   
}
