<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Crypt;


class SalesController extends Controller
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $token = Session::get('login_token');
       
        $apiUrl = url('api/md-provider-active-treatment-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
        $active_sales= $responseData['packages_active_list'];


         
        $apiUrl = url('api/md-provider-completed-treatment-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
        $completed_sales= $responseData['packages_active_list'];


        $apiUrl = url('api/md-provider-cancelled-treatment-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
        $cancelled_sales= $responseData['packages_active_list'];

       // dd($completed_sales);

        // dd($active_sales);
        return view('front.mdhealth.medical-provider.sales',compact('active_sales','completed_sales','cancelled_sales'));
    }



    public function sales_view(Request $request)
    {


        $token = Session::get('login_token');

        //$purchage_id=Crypt::decrypt($request->id);
        //dd($purchage_id);

        $apiUrl = url('api/md-provider-patient-details');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($request->id);
        $body=['purchage_id' => $decryptedId];
        $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        // dd($responseData);
        $patient_details = $responseData['patient_details'];


       
    //     $apiUrl = url('api/md-provider-active-treatment-list');
    //     $method = 'GET';
    //     $body=null;

    //     $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
    //     $active_sales= $responseData['packages_active_list'];


         
    //     $apiUrl = url('api/md-provider-completed-treatment-list');
    //     $method = 'GET';
    //     $body=null;

    //     $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
    //     $completed_sales= $responseData['packages_active_list'];


    //     $apiUrl = url('api/md-provider-cancelled-treatment-list');
    //     $method = 'GET';
    //     $body=null;

    //     $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        
    //     $cancelled_sales= $responseData['packages_active_list'];

    //    // dd($completed_sales);

    //     // dd($active_sales);

        return view('front.mdhealth.medical-provider.treatment-order-details',compact('patient_details'));
    }


    
}
