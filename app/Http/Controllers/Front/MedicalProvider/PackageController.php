<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller {
    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index() {
        $token = Session::get( 'login_token' );

        $apiUrl = url( '/api/md-treatment-category-list' );
        $apiUrl2 = url( '/api/md-hotel-list' );
        $apiUrl3 = url( '/api/md-transportation-list' );
        $apiUrl4 = url( '/api/md-tour-list' );
        $method = 'GET';
        $body = null;

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $treatment_categories = !empty( $responseData[ 'packages_active_list' ] ) ? $responseData[ 'packages_active_list' ] : [];

        $responseData = $this->apiService->getData( $token, $apiUrl2, $body, $method );
        $hotel_details = !empty( $responseData[ 'hotel_details' ] ) ? $responseData[ 'hotel_details' ] : '';

        $responseData = $this->apiService->getData( $token, $apiUrl3, $body, $method );
        // dd( $responseData );
        $vehicle_details = !empty( $responseData[ 'data' ] )?$responseData[ 'data' ]:[];

        $responseData = $this->apiService->getData( $token, $apiUrl4, $body, $method );
        $tour_details = !empty( $responseData[ 'tour_details' ] ) ? $responseData[ 'tour_details' ] : '';
        // dd( $responseData );
        return view( 'front/mdhealth/medical-provider/medical-packages-view', compact( 'treatment_categories', 'hotel_details', 'vehicle_details', 'tour_details' ) );
    }

    public function package_list() {
        return view( 'front.mdhealth.medical-provider.packages' );
    }

    public function md_packages_active_list_search( Request $request ) {
        $token = Session::get( 'login_token' );
        $package_name = $request->package_name;
        $apiUrl = url( '/api/md-packages-active-list-search' );
        $method = 'post';
        $body = [ 'package_name' => $package_name ];

        // Fetch active packages data
        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        // dd( $responseData );
        $packages_active_list = $responseData[ 'packages_deactive_list' ];

        // Generate HTML for active packages
        $html1 = '';

        foreach ( $packages_active_list as $package_active_list ) {
            $html1 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_active_list[ 'id' ] . '">';
            $html1 .= '<div class="row card-row align-items-center">';
            $html1 .= '<div class="col-md-2 df-center px-0">';
            $html1 .= '<img style="width: auto;height: 75px;" src="' . asset( 'front/assets/img/default-img.png' ) . '" alt="">';
            $html1 .= '</div>';
            $html1 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html1 .= '<div class="trmt-card-body">';
            $html1 .= '<h5 class="dashboard-card-title fw-600">Package No:' . ( !empty( $package_active_list[ 'package_unique_no' ] ) ? $package_active_list[ 'package_unique_no' ] : '' ) . '<span class="active">Active</span></h5>';
            $html1 .= '<h5 class="mb-0 fw-500">' . ( !empty( $package_active_list[ 'package_name' ] ) ? $package_active_list[ 'package_name' ] : '' ) . '</h5>';
            $html1 .= '</div></div>';
            $html1 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html1 .= '<div class="trmt-card-footer footer-btns">';
            $html1 .= '<a href="' . url( 'edit-package/' . Crypt::encrypt( $package_active_list[ 'id' ] ) ) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html1 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_active_list['id'] . '\', \'active\')" class="close-btn"><i class="fa fa-close"></i> Deactivate</a>';
            $html1 .= '</div></div></div></div>';
        }

        return $html1?$html1:false;
    }

    public function active_package_list() {
        $token = Session::get( 'login_token' );

        $apiUrl = url( '/api/md-packages-active-list' );
        $method = 'GET';
        $body = null;

        // Fetch active packages data
        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $packages_active_list = $responseData[ 'packages_active_list' ];

        // Generate HTML for active packages
        // dd( $responseData );
        $html1 = '';

        foreach ( $packages_active_list as $package_active_list ) {
            $html1 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_active_list[ 'id' ] . '">';
            $html1 .= '<div class="row card-row align-items-center">';
            $html1 .= '<div class="col-md-2 df-center px-0">';
            $html1 .= '<img style="width: auto;height: 75px;" src="' . asset( 'front/assets/img/default-img.png' ) . '" alt="">';
            $html1 .= '</div>';
            $html1 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html1 .= '<div class="trmt-card-body">';
            $html1 .= '<h5 class="dashboard-card-title fw-600">Package No:' . ( !empty( $package_active_list[ 'package_unique_no' ] ) ? $package_active_list[ 'package_unique_no' ] : '' ) . '<span class="active">Active</span></h5>';
            $html1 .= '<h5 class="mb-0 fw-500">' . ( !empty( $package_active_list[ 'package_name' ] ) ? $package_active_list[ 'package_name' ] : '' ) . '</h5>';
            $html1 .= '</div></div>';
            $html1 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html1 .= '<div class="trmt-card-footer footer-btns">';
            $html1 .= '<a href="' . url( 'edit-package/' . Crypt::encrypt( $package_active_list[ 'id' ] ) ) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html1 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_active_list['id'] . '\', \'active\')" class="close-btn"><i class="fa fa-close"></i> Deactivate</a>';
            $html1 .= '</div></div></div></div>';
        }
        if ( $html1 == '' ) {
            $html1 =  "<div class='no-data'>No Data Available !</div>";
        }

        return $html1;
    }

    public function md_packages_inactive_list_search( Request $request ) {
        $token = Session::get( 'login_token' );
        $package_name = $request->package_name;
        $apiUrl2 = url( '/api/md-packages-inactive-list-search' );
        $method = 'post';
        $body = [ 'package_name' => $package_name ];

        // Fetch inactive packages data
        $responseData2 = $this->apiService->getData( $token, $apiUrl2, $body, $method );
        $packages_deactive_list = $responseData2[ 'packages_deactive_list' ];

        // Generate HTML for inactive packages
        $html2 = '';
        foreach ( $packages_deactive_list as $package_deactive_list ) {
            $html2 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_deactive_list[ 'id' ] . '">';
            $html2 .= '<div class="row card-row align-items-center">';
            $html2 .= '<div class="col-md-2 df-center px-0">';
            $html2 .= '<img style="width: auto;height: 75px;" src="' . asset( 'front/assets/img/default-img.png' )  . '" alt="">';
            $html2 .= '</div>';
            $html2 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html2 .= '<div class="trmt-card-body">';
            $html2 .= '<h5 class="dashboard-card-title fw-600">Package No:' . ( !empty( $package_deactive_list[ 'package_unique_no' ] ) ? $package_deactive_list[ 'package_unique_no' ] : '' ) . '<span class="cancel">Deactive</span></h5>';
            $html2 .= '<h5 class="mb-0 fw-500">' . ( !empty( $package_deactive_list[ 'package_name' ] ) ? $package_deactive_list[ 'package_name' ] : '' ) . '</h5>';
            $html2 .= '</div></div>';
            $html2 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html2 .= '<div class="trmt-card-footer footer-btns">';
            $html2 .= '<a href="' . url( 'edit-package/' . Crypt::encrypt( $package_deactive_list[ 'id' ] ) ) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html2 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_deactive_list['id'] . '\', \'deactive\')" class="close-btn"><i class="fa fa-close"></i> Activate</a>';
            $html2 .= '</div></div></div></div>';
        }

        return $html2?$html2:false;
    }

    public function deactive_package_list() {
        $token = Session::get( 'login_token' );

        $apiUrl2 = url( '/api/md-packages-deactive-list' );
        $method = 'GET';
        $body = null;

        // Fetch inactive packages data
        $responseData2 = $this->apiService->getData( $token, $apiUrl2, $body, $method );
        $packages_deactive_list = $responseData2[ 'packages_deactive_list' ];

        // Generate HTML for inactive packages
        $html2 =  '';
        foreach ( $packages_deactive_list as $package_deactive_list ) {
            $html2 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_deactive_list[ 'id' ] . '">';
            $html2 .= '<div class="row card-row align-items-center">';
            $html2 .= '<div class="col-md-2 df-center px-0">';
            $html2 .= '<img style="width:auto;height:75px;"src="' . asset( 'front/assets/img/default-img.png' ) . '" alt="">';
            $html2 .= '</div>';
            $html2 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html2 .= '<div class="trmt-card-body">';
            $html2 .= '<h5 class="dashboard-card-title fw-600">Package No:' . ( !empty( $package_deactive_list[ 'package_unique_no' ] ) ? $package_deactive_list[ 'package_unique_no' ] : '' ) . '<span class="cancel">Deactive</span></h5>';
            $html2 .= '<h5 class="mb-0 fw-500">' . ( !empty( $package_deactive_list[ 'package_name' ] ) ? $package_deactive_list[ 'package_name' ] : '' ) . '</h5>';
            $html2 .= '</div></div>';
            $html2 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html2 .= '<div class="trmt-card-footer footer-btns">';
            $html2 .= '<a href="' . url( 'edit-package/' . Crypt::encrypt( $package_deactive_list[ 'id' ] ) ) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html2 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_deactive_list['id'] . '\', \'deactive\')" class="close-btn"><i class="fa fa-close"></i> Activate</a>';
            $html2 .= '</div></div></div></div>';
        }

        if ( $html2 == '' ) {
            $html2 =  "<div class='no-data'>No Data Available !</div>";
        }

        return $html2;
    }

    public function edit_package( Request $request ) {
        $token = Session::get( 'login_token' );

        $apiUrl = url( '/api/md-packages-view-list' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );
        $body = [ 'id' => $decryptedId ];
        $method = 'POST';

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        // dd( $responseData );
        $packages_active_list = $responseData[ 'packages_active_list' ];

        $apiUrl2 = url( '/api/md-treatment-category-list' );
        $apiUrl3 = url( '/api/md-hotel-list' );
        $apiUrl4 = url( '/api/md-transportation-list' );
        $apiUrl5 = url( '/api/md-tour-list' );
        $method2 = 'GET';
        $body2 = null;

        $responseData = $this->apiService->getData( $token, $apiUrl2, $body2, $method2 );
        $treatment_categories = $responseData[ 'packages_active_list' ];

        $responseData = $this->apiService->getData( $token, $apiUrl3, $body2, $method2 );
        $hotel_details = $responseData[ 'hotel_details' ];

        $responseData = $this->apiService->getData( $token, $apiUrl4, $body2, $method2 );
        $vehicle_details = $responseData[ 'data' ];

        $responseData = $this->apiService->getData( $token, $apiUrl5, $body2, $method2 );
        $tour_details = $responseData[ 'tour_details' ];
        return view( 'front/mdhealth/medical-provider/medical-packages-view', compact( 'packages_active_list', 'treatment_categories', 'hotel_details', 'vehicle_details', 'tour_details' ) );
    }

    public function md_add_packages( Request $request ) {
        // dd( 'hjdvhjv' );
        $token = Session::get( 'login_token' );
        // dd( $token );
        if ( empty( $request->id ) ) {
            $apiUrl = url( '/api/md-add-packages' );
        } else {
            $apiUrl = url( '/api/md-edit-packages' );
        }
        $method = 'POST';
        $body = $request->all();
        $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;

        $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method );
        // dd( $responseData );
        if ( ( $responseData[ 'status' ] == 200 ) ) {
            return redirect( '/medical-packages' )->with( 'success', $responseData[ 'message' ] );
        } else {
            return redirect( '/medical-packages' )->with( 'error', $responseData[ 'message' ] );
        }
        // return view( 'front/mdhealth/medical-provider/packages', compact( 'packages_active_list', 'packages_deactive_list' ) );
    }
}
