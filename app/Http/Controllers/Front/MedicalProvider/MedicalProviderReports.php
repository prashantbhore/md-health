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
use Storage;

//Code By Mplus03
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

        $apiUrl = url('api/md-provider-all-reports-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);



        $provider_report_list =  '';
        if(!empty($responseData)){
        if ( $responseData[ 'status' ] == '200' ){
          $provider_report_list= $responseData['provider_report_list'];
         }
        }





        return view('front/mdhealth/medical-provider/reports',compact('patient_list','provider_report_list'));
    }




  
    
    public function report_list(Request $request)
    {
        $token = Session::get('login_token');


        if(!$request['query']!=null){

            $apiUrl = url('api/md-provider-all-reports-list');
            $method = 'GET';
            $body=null;
            $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        }

       


        if($request['query']){
            $query=$request['query'];
            $apiUrl = url('api/md-medical-provider-report-search');
            $body=[ 'search_query' => $query,];
            $method = 'POST';
            $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        }


         

        $provider_report_list =  '';
        if(!empty($responseData)){
        if ( $responseData[ 'status' ] == '200' ){
          $provider_report_list= $responseData['provider_report_list'];
         }
        }

        $resultHtml = '';
        if (!empty($provider_report_list)) {
            foreach ($provider_report_list as $key=>$report){
                $reportId=$key;
                $resultHtml .= '<div class="card shadow-none" style="border-radius: 3px; background: #f6f6f6;">';
                $resultHtml .= '<div class="card-body d-flex gap-3">';
                $resultHtml .= '<div>';
                $resultHtml .= '<img src="' . (!empty($responseData['logo']['company_logo_image_path']) ? url('/').Storage::url($responseData['logo']['company_logo_image_path']) : asset('front/assets/img/msg2.png')) . '" alt="" height="52px" width="52px" />';

                $resultHtml .= '</div>';
                $resultHtml .= '<div>';
                $resultHtml .= '<h5 class="card-h1">Treatment No:' . (!empty($report['customer_purchased_package']['order_id']) ? $report['customer_purchased_package']['order_id'] : '') . '<span class="pending ms-3">  ' . (!empty($report['report_count']) ? $report['report_count'] : '') . ' Documents</span></h5>';
                $resultHtml .= '<p class="mb-0 pkg-name">' . (!empty($report['customer_data']['name']) ? $report['customer_data']['name'] : '') . '</p>';
                $resultHtml .= '</div>';
                $resultHtml .= '<div class="ms-auto d-flex flex-column justify-content-end align-items-end">';
                $resultHtml .= '<a href="#" class="text-black mt-auto card-h3" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$reportId.'" aria-expanded="true" aria-controls="collapseOne'.$reportId.'">View Details</a>';
                $resultHtml .= '</div>';
                $resultHtml .= '</div>';
    
                if (!empty($report['reports'])) {
                    foreach ($report['reports'] as $report_data){
                        $resultHtml .= '<div class="accordion" id="accordionExample">';
                        $resultHtml .= '<div class="accordion-item">';
                        $resultHtml .= '<h2 class="accordion-header" id="headingOne"></h2>';
                        $resultHtml .= '<div id="collapseOne'.$reportId.'" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">';
                        $resultHtml .= '<div class="accordion-body p-0">';
                        $resultHtml .= '<div class="card shadow-none" style="background-color:#F6F6F6;border-top: 1px solid #CFCFCF;border-radius: 0 0 3px 3px">';
                        $resultHtml .= '<div class="card-body d-flex gap-3">';
                        $resultHtml .= '<div style="background-color: #d9d9d9;border-radius:2px;height:40px;width:40px" class="df-center">';
                        $resultHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $resultHtml .= '<g clip-path="url(#clip0_0_14866)">';
                        $resultHtml .= '<path d="M5.25033 0.583496V4.66683L1.16699 11.6668V13.4168H12.8337V11.6668L8.75033 4.66683V0.583496M10.5003 7.5835C6.41699 5.8335 7.00033 9.91683 3.50033 8.16683M3.50033 0.583496H10.5003M8.75033 10.5002C8.90503 10.5002 9.05341 10.4387 9.1628 10.3293C9.2722 10.2199 9.33366 10.0715 9.33366 9.91683C9.33366 9.76212 9.2722 9.61375 9.1628 9.50435C9.05341 9.39495 8.90503 9.3335 8.75033 9.3335C8.59562 9.3335 8.44724 9.39495 8.33785 9.50435C8.22845 9.61375 8.16699 9.76212 8.16699 9.91683C8.16699 10.0715 8.22845 10.2199 8.33785 10.3293C8.44724 10.4387 8.59562 10.5002 8.75033 10.5002ZM5.25033 11.6668C5.40504 11.6668 5.55341 11.6054 5.6628 11.496C5.7722 11.3866 5.83366 11.2382 5.83366 11.0835C5.83366 10.9288 5.7722 10.7804 5.6628 10.671C5.55341 10.5616 5.40504 10.5002 5.25033 10.5002C5.09562 10.5002 4.94724 10.5616 4.83785 10.671C4.72845 10.7804 4.66699 10.9288 4.66699 11.0835C4.66699 11.2382 4.72845 11.3866 4.83785 11.496C4.94724 11.6054 5.09562 11.6668 5.25033 11.6668Z" stroke="#111111" stroke-width="1.16667"></path>';
                        $resultHtml .= '</g>';
                        $resultHtml .= '<defs>';
                        $resultHtml .= '<clipPath id="clip0_0_14866">';
                        $resultHtml .= '<rect width="14" height="14" fill="white"></rect>';
                        $resultHtml .= '</clipPath>';
                        $resultHtml .= '</defs>';
                        $resultHtml .= '</svg>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '<div>';
                        $resultHtml .= '<div class="card-h1">' . (!empty($report_data['report_title']) ? $report_data['report_title'] : '') . '</div>';
    
                        $timestamp = strtotime($report_data['created_at']);
                        $formattedDate = date('d/m/Y', $timestamp);
    
                        $resultHtml .= '<div class="card-p1 fw-md-bold">' . (!empty($formattedDate) ? $formattedDate : '') . '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '<div class="d-flex gap-3 ms-auto">';
                        $resultHtml .= '<a href="' . (!empty($report_data['report_path']) ? $report_data['report_path'] : '') . '" class="view-more-view" >';
                        $resultHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $resultHtml .= '<path d="M2.91699 7.00016C2.91699 7.00016 4.40158 4.0835 7.00033 4.0835C9.59849 4.0835 11.0837 7.00016 11.0837 7.00016C11.0837 7.00016 9.59849 9.91683 7.00033 9.91683C4.40158 9.91683 2.91699 7.00016 2.91699 7.00016Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $resultHtml .= '<path d="M12.25 9.91667V11.0833C12.25 11.3928 12.1271 11.6895 11.9083 11.9083C11.6895 12.1271 11.3928 12.25 11.0833 12.25H2.91667C2.60725 12.25 2.3105 12.1271 2.09171 11.9083C1.87292 11.6895 1.75 11.3928 1.75 11.0833V9.91667M12.25 4.08333V2.91667C12.25 2.60725 12.1271 2.3105 11.9083 2.09171C11.6895 1.87292 11.3928 1.75 11.0833 1.75H2.91667C2.60725 1.75 2.3105 1.87292 2.09171 2.09171C1.87292 2.3105 1.75 2.60725 1.75 2.91667V4.08333M7 7.58333C7.15471 7.58333 7.30308 7.52187 7.41248 7.41248C7.52187 7.30308 7.58333 7.15471 7.58333 7C7.58333 6.84529 7.52187 6.69692 7.41248 6.58752C7.30308 6.47812 7.15471 6.41667 7 6.41667C6.84529 6.41667 6.69692 6.47812 6.58752 6.58752C6.47812 6.69692 6.41667 6.84529 6.41667 7C6.41667 7.15471 6.47812 7.30308 6.58752 7.41248C6.69692 7.52187 6.84529 7.58333 7 7.58333Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $resultHtml .= '</svg>';
                        $resultHtml .= 'View';
                        $resultHtml .= '</a>';
                        $resultHtml .= '<a href="#" class="view-more-view" onclick="printDocument(\'' . (!empty($report_data['report_path']) ? $report_data['report_path'] : '') . '\')">';
                        $resultHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $resultHtml .= '<path d="M4.08366 5.83317C3.96829 5.83317 3.8555 5.86738 3.75958 5.93148C3.66365 5.99558 3.58888 6.08668 3.54473 6.19327C3.50058 6.29986 3.48903 6.41715 3.51153 6.53031C3.53404 6.64346 3.5896 6.7474 3.67118 6.82898C3.75276 6.91056 3.8567 6.96612 3.96986 6.98863C4.08301 7.01114 4.2003 6.99958 4.30689 6.95543C4.41348 6.91128 4.50459 6.83652 4.56868 6.74059C4.63278 6.64466 4.66699 6.53188 4.66699 6.4165C4.66699 6.26179 4.60553 6.11342 4.49614 6.00402C4.38674 5.89463 4.66699 5.78517 5.6334 5.83263 5.83366 5.83317Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';

                        $resultHtml .= '66699 5.78517 5.6334 5.83263 5.83366 5.83317Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $resultHtml .= '</svg>';
                        $resultHtml .= 'Print';
                        $resultHtml .= '</a>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        }

                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        $resultHtml .= '</div>';
                        }

                     
                        }
                     }

            return  $resultHtml;
    }       
                            



  public function addReport(Request $request){

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


    $body = $request->all();
    $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;



    if ( $request->hasFile( 'report_path' ) && $request->file( 'report_path' )->isValid() ) {
        $image = $request->file( 'report_path' );
        $image_name = 'report_path';
        $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method, $image, $image_name );
    } else {
        $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method );
    }

 

    if (!empty($responseData) && $responseData['status'] == '200') {
      return redirect('reports')->with('success', 'Report Added Successfully');
  } else {
      return redirect('reports')->with('error', 'Failed');
  }
  

  }





}
