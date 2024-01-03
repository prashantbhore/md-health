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


        $apiUrl = url('api/md-provider-daily-monthly-summary');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        
        $daily_sales_amount= $responseData['daily_sales'];
        $monthly_sales_amount= $responseData['monthly_sales'];     

       // dd($completed_sales);

        // dd($active_sales);
        return view('front.mdhealth.medical-provider.sales',compact('active_sales','completed_sales','cancelled_sales','daily_sales_amount','monthly_sales_amount'));
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

        return redirect('treatment-order-details/'.$id)->with('success', 'Case Details and Status Changed Successfully!');
       }

       // return view('front.mdhealth.medical-provider.treatment-order-details',compact('patient_details'));
    }



    public function sales_search(Request $request)
    {
        
        $token = Session::get('login_token');
        
        $query=$request['query'];

        $apiUrl = url('api/md-medical-provider-report-search');

      

       $body=[
                'search_query' => $query,
             ];

       $method = 'POST';

       $resultHtml = '';

       $active_sales = $this->apiService->getData($token, $apiUrl, $body, $method);

        foreach ($active_sales as $activeSale) {
       
            $resultHtml .= '<div class="treatment-card df-start w-100 mb-3">';
            $resultHtml .= '<div class="row card-row align-items-center">';
            $resultHtml .= '<div class="col-md-2 df-center px-0">';
            $resultHtml .= '<img src="' . asset('front/assets/img/Memorial.svg') . '" alt="">';
            $resultHtml .= '</div>';
            $resultHtml .= '<div class="col-md-6 justify-content-start ps-0">';
            $resultHtml .= '<div class="trmt-card-body">';
            $resultHtml .= '<h5 class="dashboard-card-title">Treatment No: ' . (!empty($activeSale['order_id']) ? $activeSale['order_id'] : '') . '<span class="' . (!empty($activeSale['purchase_type']) ? ($activeSale['purchase_type'] == 'pending' ? 'pending' : 'in-progress') : '') . '">' . (!empty($activeSale['purchase_type']) ? ucfirst($activeSale['purchase_type']) : '') . '</span></h5>';
            $resultHtml .= '<h5 class="mb-0 fw-500">' . (!empty($activeSale['customer']['full_name']) ? $activeSale['customer']['full_name'] : '') . '</h5>';
            $resultHtml .= '</div>';
            $resultHtml .= '</div>';
            $resultHtml .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $resultHtml .= '<div class="trmt-card-footer">';
            $resultHtml .= '<h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">' . (!empty($activeSale['package_total_price']) ? $activeSale['package_total_price'] : '') . ' ₺</span></h6>';
            $resultHtml .= '<a href="' . url('treatment-order-details/' . (!empty($activeSale['id']) ? Crypt::encrypt($activeSale['id']) : '')) . '" class="mt-auto view-detail-btn"><strong>View Details</strong></a>';
            $resultHtml .= '</div>';
            $resultHtml .= '</div>';
            $resultHtml .= '</div>';
            $resultHtml .= '</div>';
            
        }

        return $resultHtml;
    }



      








}
