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


        $apiUrl = url('api/md-provider-patient-details');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($request->id);
        $body=['purchage_id' => $decryptedId];
        $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        $patient_details = $responseData['patient_details'];

        $payment_details= $responseData['payment_details'];

        $apiUrl = url('api/md-provider-case-manager-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

         $case_manager= $responseData ['case_managers'];

        // dd($patient_details);


        return view('front.mdhealth.medical-provider.treatment-order-details',compact('patient_details','case_manager'));
    }




    public function status_date_change(Request $request)
    {
        
        $token = Session::get('login_token');

 
        
        $apiUrl = url('api/md-provider-treatment-date-status');

        $treatment_purchage_id = $request->treatment_purchage_id;
        $treatment_start_date= $request->treatment_start_date;

        $treatment_status= $request->treatment_status;

       $body=['treatment_purchage_id' =>  $treatment_purchage_id,
                'treatment_start_date' =>  $treatment_start_date,
                'treatment_status' =>  $treatment_status,
            ];

       $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

       if(!empty($responseData)){
       $id=Crypt::encrypt($treatment_purchage_id);

       return redirect('treatment-order-details/'.$id)->with('success', 'Treatment Status Changes Successfully!');
       }
    
       // return view('front.mdhealth.medical-provider.treatment-order-details',compact('patient_details'));
    }




    public function assign_case_manager(Request $request)
    {
        
        $token = Session::get('login_token');

     
        
        $apiUrl = url('api/md-provider-assign-treatment-case-manager');

        $treatment_purchage_id = $request->purchage_id;

        $case_manager_id= $request->case_manager_id;

        $hotel_id= $request->hotel_id;

        $vehicle_id= $request->vehicle_id;

        $purchase_type= $request->purchase_type;

       $body=[
                'purchage_id' =>  $treatment_purchage_id,
                'case_manager_id' =>   $case_manager_id,
                'hotel_id' =>  $hotel_id,
                'vehicle_id' =>  $vehicle_id,
                'status' =>  $purchase_type,
            ];

       $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

       if(!empty($responseData)){
       $id=Crypt::encrypt($treatment_purchage_id);

       return redirect('treatment-order-details/'.$id)->with('success', 'Treatment Status Changes Successfully!');
       }
    
       // return view('front.mdhealth.medical-provider.treatment-order-details',compact('patient_details'));
    }









    
}
