<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Crypt;
use Auth;


class PaymentController extends Controller
{

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(){
        
    }


    
}
