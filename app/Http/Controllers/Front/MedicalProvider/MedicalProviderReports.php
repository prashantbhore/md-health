<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Traits\MediaTrait;
use Crypt;
use Auth;


class MedicalProviderReports extends Controller
{

    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }


    public function index(){




        $token = Session::get( 'login_token' );

        $apiUrl = url('api/md-customer-package-purchage-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);



        $patient_list =  '';
        if(!empty($responseData)){
        if ( $responseData[ 'status' ] == '200' ) {
            $patient_list=  $responseData['customer_package_purchase_list'];
         }
        }

        //dd($patient_list);


        return view('front/mdhealth/medical-provider/reports',compact('patient_list'));
    }




  public function addReport(Request $request){

    dd($request->all());
     

    $token = Session::get('login_token');


    $apiUrl = url('api/md-provider-add-reports');
    $report_title= $request->report_title;
    $customer_package_purchage_id= $request->customer_package_purchage_id;

    $uploadedFile = $this->verifyAndUpload($request, 'report_path', 'providerreports');



    $report_path = $request->file('report_path');

    $body=['report_title' => $report_title,
    'customer_package_purchage_id' => $customer_package_purchage_id,
    'report_path' => $uploadedFile,
   ];

    $method = 'POST';


    $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

    //dd($responseData);
    if(!empty($responseData)){
      return redirect('reports')->with('success','Report Added Successfully');
    }else{
        return redirect('reports')->with('error','Failed');
    }
  }





}
