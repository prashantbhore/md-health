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
use App\Models\CustomerPurchaseDetails;
use App\Models\MembershipSettings;

class MedicalProviderDashboradController extends Controller {

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index(){

        $token = Session::get( 'login_token' );

        $apiUrl = url( 'api/medical-provider-monthly-order-count' );
        $method = 'GET';
        $body = null;

        $monthly_orders = $this->apiService->getData( $token, $apiUrl, $body, $method );

        $apiUrl = url( 'api/medical-provider-monthly-sales-count' );
        $method = 'GET';
        $body = null;

        $monthly_sales_count = $this->apiService->getData( $token, $apiUrl, $body, $method );

        $apiUrl = url( 'api/medical-provider-package-latest-orders' );
        $method = 'GET';
        $body = null;

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );

        $recent_orders =  '';
        if ( !empty( $responseData ) ) {
            if ( $responseData[ 'status' ] == '200' ) {
                $recent_orders =  $responseData[ 'latest_orders' ];
            }
        }

        $id = Session::get( 'MDMedicalProvider*%' );
        $provider_logo = MedicalProviderLogo::where( 'status', 'active' )->where( 'medical_provider_id', $id )->first();



        //Membership Logic starts
            $provider_id = null;
        
            if (!empty(Auth::guard('md_health_medical_providers_registers')->user()->id)){
                $provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
            }
        
            $provider_amount = 0;
        
            if ($provider_id != null) {
                $provider_amount = CustomerPurchaseDetails::where('status', 'active')
                    ->where('provider_id', $provider_id)
                    ->sum('paid_amount');
            }
        
                $membership = MembershipSettings::where('vendor_type', 'medical_service_provider')
                ->where(function ($query) use ($provider_amount) {
                    $query->where('membership_type', 'silver') 
                        ->orWhere(function ($subquery) use ($provider_amount) {
                            $subquery->where('membership_amount', '<=', $provider_amount)
                                ->orWhereNull('membership_amount'); 
                        });
                })
                ->orderBy('membership_amount', 'desc') 
                ->first();
        //Membership Logic Ends 


        // dd( $provider_logo->company_logo_image_path );

        return view( 'front.mdhealth.medical-provider.dashboard', compact( 'monthly_orders', 'monthly_sales_count', 'recent_orders', 'provider_logo','membership'));
    }

}
