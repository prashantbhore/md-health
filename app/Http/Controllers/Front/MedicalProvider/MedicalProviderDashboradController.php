<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Models\MedicalProviderLogo;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Crypt;
use Auth;

class MedicalProviderDashboradController extends Controller {

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index(){


        $token = Session::get( 'login_token' );

        $apiUrl = url( 'api/medical-provider-monthly-order-count' );
        $method = 'GET';
        $body=null;

        $monthly_orders = $this->apiService->getData($token, $apiUrl, $body, $method);

      



        $apiUrl = url('api/medical-provider-monthly-sales-count');
        $method = 'GET';
        $body=null;

        $monthly_sales_count = $this->apiService->getData($token, $apiUrl, $body, $method);

       



        $apiUrl = url('api/medical-provider-package-latest-orders');
        $method = 'GET';
        $body = null;

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        
     

        $recent_orders =  '';
        if ( $responseData[ 'status' ] == '200' ) {
            $recent_orders =  $responseData[ 'latest_orders' ];
        }
  
      

       $provider_logo = MedicalProviderLogo::where( 'status', 'active' )->where( 'medical_provider_id', Auth::user()->id )->first();

        // dd( $provider_logo->company_logo_image_path );

        return view( 'front/mdhealth/medical-provider/dashboard', compact( 'monthly_orders', 'monthly_sales_count', 'recent_orders', 'provider_logo' ) );
    }

}
