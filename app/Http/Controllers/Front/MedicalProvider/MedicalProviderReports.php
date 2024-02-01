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
            foreach ($provider_report_list as $report){
                $resultHtml .= '<div class="card shadow-none" style="border-radius: 3px; background: #f6f6f6;">';
                $resultHtml .= '<div class="card-body d-flex gap-3">';
                $resultHtml .= '<div>';
                $resultHtml .= '<img src="' . asset('front/assets/img/msg2.png') . '" alt="" />';
                $resultHtml .= '</div>';
                $resultHtml .= '<div>';
                $resultHtml .= '<h5 class="card-h1 mb-2">Treatment No: #' . (!empty($report['customer_purchased_package']['order_id']) ? $report['customer_purchased_package']['order_id'] : '') . '<span class="pending ms-3">  ' . (!empty($report['report_count']) ? $report['report_count'] : '') . ' Documents</span></h5>';
                $resultHtml .= '<p class="mb-0 pkg-name">' . (!empty($report['customer_data']['name']) ? $report['customer_data']['name'] : '') . '</p>';
                $resultHtml .= '</div>';
                $resultHtml .= '<div class="ms-auto d-flex flex-column justify-content-end align-items-end">';
                $resultHtml .= '<a href="#" class="text-black mt-auto card-h3 text-decoration-underline" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">View Details</a>';
                $resultHtml .= '</div>';
                $resultHtml .= '</div>';
    
                if (!empty($report['reports'])) {
                    foreach ($report['reports'] as $report_data){
                        $resultHtml .= '<div class="accordion" id="accordionExample">';
                        $resultHtml .= '<div class="accordion-item">';
                        $resultHtml .= '<h2 class="accordion-header" id="headingOne"></h2>';
                        $resultHtml .= '<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">';
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
                        $resultHtml .= '<a href="' . (!empty($report_data['report_path']) ? $report_data['report_path'] : '') . '" class="view-more-view text-black" >';
                        $resultHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $resultHtml .= '<path d="M2.91699 7.00016C2.91699 7.00016 4.40158 4.0835 7.00033 4.0835C9.59849 4.0835 11.0837 7.00016 11.0837 7.00016C11.0837 7.00016 9.59849 9.91683 7.00033 9.91683C4.40158 9.91683 2.91699 7.00016 2.91699 7.00016Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $resultHtml .= '<path d="M12.25 9.91667V11.0833C12.25 11.3928 12.1271 11.6895 11.9083 11.9083C11.6895 12.1271 11.3928 12.25 11.0833 12.25H2.91667C2.60725 12.25 2.3105 12.1271 2.09171 11.9083C1.87292 11.6895 1.75 11.3928 1.75 11.0833V9.91667M12.25 4.08333V2.91667C12.25 2.60725 12.1271 2.3105 11.9083 2.09171C11.6895 1.87292 11.3928 1.75 11.0833 1.75H2.91667C2.60725 1.75 2.3105 1.87292 2.09171 2.09171C1.87292 2.3105 1.75 2.60725 1.75 2.91667V4.08333M7 7.58333C7.15471 7.58333 7.30308 7.52187 7.41248 7.41248C7.52187 7.30308 7.58333 7.15471 7.58333 7C7.58333 6.84529 7.52187 6.69692 7.41248 6.58752C7.30308 6.47812 7.15471 6.41667 7 6.41667C6.84529 6.41667 6.69692 6.47812 6.58752 6.58752C6.47812 6.69692 6.41667 6.84529 6.41667 7C6.41667 7.15471 6.47812 7.30308 6.58752 7.41248C6.69692 7.52187 6.84529 7.58333 7 7.58333Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $resultHtml .= '</svg>';
                        $resultHtml .= 'View';
                        $resultHtml .= '</a>';

                        $resultHtml .= '<a href="#" class="view-more-view text-black" onclick="printDocument(\'' . (!empty($report_data['report_path']) ? $report_data['report_path'] : '') . '\')">';
                        $resultHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $resultHtml .= '<path d="M4.08366 5.83317C3.96829 5.83317 3.8555 5.86738 3.75958 5.93148C3.66365 5.99558 3.58888 6.08668 3.54473 6.19327C3.50058 6.29986 3.48903 6.41715 3.51153 6.53031C3.53404 6.64346 3.5896 6.7474 3.67118 6.82898C3.75276 6.91056 3.8567 6.96612 3.96986 6.98863C4.08301 7.01114 4.2003 6.99958 4.30689 6.95543C4.41348 6.91128 4.50459 6.83652 4.56868 6.74059C4.63278 6.64466 4.66699 6.53188 4.66699 6.4165C4.66699 6.26179 4.60553 6.11342 4.49614 6.00402C4.38674 5.89463 4.23837 5.83317 4.08366 5.83317ZM11.0837 3.49984H10.5003V1.74984C10.5003 1.59513 10.4389 1.44675 10.3295 1.33736C10.2201 1.22796 10.0717 1.1665 9.91699 1.1665H4.08366C3.92895 1.1665 3.78058 1.22796 3.67118 1.33736C3.56178 1.44675 3.50033 1.59513 3.50033 1.74984V3.49984H2.91699C2.45286 3.49984 2.00774 3.68421 1.67956 4.0124C1.35137 4.34059 1.16699 4.78571 1.16699 5.24984V8.74984C1.16699 9.21397 1.35137 9.65909 1.67956 9.98727C2.00774 10.3155 2.45286 10.4998 2.91699 10.4998H3.50033V12.2498C3.50033 12.4045 3.56178 12.5529 3.67118 12.6623C3.78058 12.7717 3.92895 12.8332 4.08366 12.8332H9.91699C10.0717 12.8332 10.2201 12.7717 10.3295 12.6623C10.4389 12.5529 10.5003 12.4045 10.5003 12.2498V10.4998H11.0837C11.5478 10.4998 11.9929 10.3155 12.3211 9.98727C12.6493 9.65909 12.8337 9.21397 12.8337 8.74984V5.24984C12.8337 4.78571 12.6493 4.34059 12.3211 4.0124C11.9929 3.68421 11.5478 3.49984 11.0837 3.49984ZM4.66699 2.33317H9.33366V3.49984H4.66699V2.33317ZM9.33366 11.6665H4.66699V9.33317H9.33366V11.6665ZM11.667 8.74984C11.667 8.90455 11.6055 9.05292 11.4961 9.16232C11.3867 9.27171 11.2384 9.33317 11.0837 9.33317H10.5003V8.74984C10.5003 8.59513 10.4389 8.44675 10.3295 8.33736C10.2201 8.22796 10.0717 8.1665 9.91699 8.1665H4.08366C3.92895 8.1665 3.78058 8.22796 3.67118 8.33736C3.56178 8.44675 3.50033 8.59513 3.50033 8.74984V9.33317H2.91699C2.76228 9.33317 2.61391 9.27171 2.50451 9.16232C2.39512 9.05292 2.33366 8.90455 2.33366 8.74984V5.24984C2.33366 5.09513 2.39512 4.94675 2.50451 4.83736C2.61391 4.72796 2.76228 4.6665 2.91699 4.6665H11.0837C11.2384 4.6665 11.3867 4.72796 11.4961 4.83736C11.6055 4.94675 11.667 5.09513 11.667 5.24984V8.74984Z" fill="#111111" />';
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
