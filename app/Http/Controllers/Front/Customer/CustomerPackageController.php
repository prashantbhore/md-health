<?php

namespace App\Http\Controllers\Front\Customer;

use App\Models\AddNewAcommodition;
use App\Models\CustomerDocuments;
use App\Http\Controllers\Controller;
use App\Models\CustomerPaymentDetails;
use App\Models\CustomerPurchaseDetails;
use App\Models\CustomerReviews;
use App\Models\Packages;
use App\Models\Cities;
use Session;
use App\Models\Country;
use App\Models\ProductCategory;
use App\Models\PatientInformation;
use App\Models\ToursDetails;
use App\Models\TransportationDetails;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Storage;
use Validator;
use Auth;

class CustomerPackageController extends Controller {
    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function customer_home() {

        // dd( Session::get( 'login_token' ) );
        $token = Session::get( 'login_token' );
        $url = url( '/api/md-city-list' );
        $body = [ 'country_id'=>'1' ];
        $method = 'POST';
        $this->apiService->getCities( $token, $url, $body, $method );
        return view( 'front.mdhealth.index' );
    }

    public function purchase_package( $id ) {

        return view( 'front.mdhealth.purchase', compact( 'id' ) );
    }

    public function customer_package_search_filter( Request $request ) {
        // return 'asd ';
        $packages = Packages::select(
            'md_packages.id',
            'md_packages.package_unique_no',
            'md_packages.package_name',
            'md_packages.treatment_period_in_days',
            'md_packages.other_services',
            'md_packages.package_price',
            'md_packages.sale_price',
            'md_product_category.product_category_name',
            'md_product_sub_category.product_sub_category_name',
            'md_master_cities.city_name'
        )
        // ->where( 'md_packages.status', 'active' )
        // ->where( 'md_product_category.status', 'active' )
        // ->where( 'md_product_sub_category.status', 'active' )
        ->leftjoin( 'md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id' )
        ->leftjoin( 'md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id' )
        ->leftjoin( 'md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by' )
        ->leftjoin( 'md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id' );

        if ( !empty( $request->treatment_name ) ) {
            $packages = $packages->where( 'md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%' );
        }
        if ( !empty( $request->city_name ) ) {
            $packages = $packages->where( 'md_master_cities.city_name', 'like', '%' . $request->city_name . '%' );
        }
        $packages = $packages->get();

        // return $packages;
        // $data = [];
        // $data[ 'package_list' ] = [];
        if ( !empty( $packages ) ) {
            foreach ( $packages as $key => $value ) {
                $packages[ $key ][ 'id' ] = !empty( $value->id ) ? $value->id : '';
                $packages[ $key ][ 'package_unique_no' ] = !empty( $value->package_unique_no ) ? $value->package_unique_no : '';
                $packages[ $key ][ 'package_name' ] = !empty( $value->package_name ) ? $value->package_name : '';
                $packages[ $key ][ 'treatment_period_in_days' ] = !empty( $value->treatment_period_in_days ) ? $value->treatment_period_in_days : '';
                $packages[ $key ][ 'other_services' ] = !empty( $value->other_services ) ? explode( ',', $value->other_services ) : '';
                $packages[ $key ][ 'package_price' ] = !empty( $value->package_price ) ? $value->package_price : '';
                $packages[ $key ][ 'sale_price' ] = !empty( $value->sale_price ) ? $value->sale_price : '';
                $packages[ $key ][ 'product_category_name' ] = !empty( $value->product_category_name ) ? $value->product_category_name : '';
                $packages[ $key ][ 'product_sub_category_name' ] = !empty( $value->product_sub_category_name ) ? $value->product_sub_category_name : '';
                $packages[ $key ][ 'city_name' ] = !empty( $value->city_name ) ? $value->city_name : '';
            }
        }

        // print_r( $request );

        if ( !empty( $packages ) ) {
            $cities = Cities::where( 'status', 'active' )->where( 'country_id', 1 )->get();
            $treatment_plans = ProductCategory::where( 'status', 'active' )->where( 'main_product_category_id', '1' )->get();

            $treatment_name = $packages[ 0 ][ 'product_category_name' ] ?? 'Select Treatment';
            $city_name = $packages[ 0 ][ 'city_name' ] ?? 'Select City';

            $counties = Country::all();

            return view( 'front.mdhealth.searchResult', compact( 'packages', 'cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties' ) );

        } else {
            return view( 'front.index' );

        }

    }

    public function packages_view_on_search_result( Request $request ) {

        $validator = Validator::make( $request->all(), [
            'id' => 'required',
        ] );

        if ( $validator->fails() ) {
            return $this->sendError( 'Validation Error.', $validator->errors() );
        }

        $id = $request->id;

        $packages_view = Packages::with( [ 'provider', 'providerGallery', 'provider.city' ] )->where( 'id', $id )->first();

        if ( !empty( $packages_view ) ) {

            $provider_gallery = [];
            foreach ( $packages_view->providerGallery as $val ) {
                $provider_gallery[] = !empty( $val->provider_image_path ) ? url( Storage::url( $val->provider_image_path ) ) : '';
            }

            $packageDetails = [

                'id' => !empty( $packages_view->id ) ? $packages_view->id : '',
                'package_unique_no' => !empty( $packages_view->package_unique_no ) ? $packages_view->package_unique_no : '',
                'city_id' => !empty( $packages_view->provider->city->id ) ? $packages_view->provider->city->id : '',
                'review_stars' => !empty( $packages_view->review->start ) ? $packages_view->review->start : '',
                'total_reviews' => !empty( $packages_view->review_count ) ? $packages_view->review_count : '',
                'verbose_review' => !empty( $packages_view->review_words ) ? $packages_view->review_words : '',
                'overview' => !empty( $packages_view->provider->company_overview ) ? $packages_view->provider->company_overview : '',
                'package_name' => !empty( $packages_view->package_name ) ? $packages_view->package_name : '',
                'treatment_category_id' => !empty( $packages_view->treatment_category_id ) ? $packages_view->treatment_category_id : '',
                'treatment_id' => !empty( $packages_view->treatment_id ) ? $packages_view->treatment_id : '',
                'other_services' => !empty( $packages_view->other_services ) ? explode( ',', $packages_view->other_services ) : '',
                'treatment_period_in_days' => !empty( $packages_view->treatment_period_in_days ) ? $packages_view->treatment_period_in_days : '',
                'treatment_price' => !empty( $packages_view->treatment_price ) ? $packages_view->treatment_price : '',

                'city_name' => !empty( $packages_view->provider->city->city_name ) ? $packages_view->provider->city->city_name : '',
            ];

            if ( !empty( $packageDetails ) ) {

                // $request->cookie()->put( 'request_data', [ $packageDetails, [ 'package_id'=>$request->id ] ] );
                // $cookieValue = json_encode( [ $packageDetails, [ 'package_id' => $request->id ] ] );
                // $cookie = \Illuminate\Support\Facades\Cookie::make( 'request_data', $cookieValue, $minutes );

                // // Attach the cookie to the response
                // $response->withCookie( $cookie );

                $cities = Cities::where( 'status', 'active' )->where( 'country_id', 1 )->get();
                $counties = Country::all();

                return view( 'front.mdhealth.healthPackDetails', compact( 'packageDetails', 'cities', 'counties' ) );

            } else {
                return view( 'front.index' );

            }

        } else {
            return view( 'front.searchResult' );
        }
    }

    public function my_packages( Request $request ) {
        $token = Session::get( 'login_token' );
        // dd( $token );
        $data = $this->apiService->getMyActivePackages( $token );
        $data_two = $this->apiService->getMyCompletedPackages( $token );
        $data_three = $this->apiService->getMyCancelledPackages( $token );

        $my_active_packages_list = $data[ 'customer_purchase_package_active_list' ];
        $my_completed_packages_list = $data_two[ 'customer_purchase_package_completed_list' ];
        $my_cancelled_packages_list = $data_three[ 'customer_purchase_package_cancelled_list' ];

        return view( 'front.mdhealth.user-panel.user-package', compact( 'my_active_packages_list', 'my_completed_packages_list', 'my_cancelled_packages_list' ) );
    }

    public function my_profile( Request $request ) {
        return view( 'front.mdhealth.user-panel.user-profile' );
    }

    public function view_my_active_packages( $id ) {

        $token = Session::get( 'login_token' );
        echo $token;
        die;
        $data = $this->apiService->activePackageDetails( $token, $id )[ 'customer_purchase_package_list' ];
        $other_service = explode( ',', $data[ 'other_services' ] );
        $data[ 'other_services' ] = $other_service;
        return view( 'front.mdhealth.user-panel.user-package-view', compact( 'data' ) );

    }
}
