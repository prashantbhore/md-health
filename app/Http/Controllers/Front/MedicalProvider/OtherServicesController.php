<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;
use Session;
use App\Traits\MediaTrait;

class OtherServicesController extends Controller {
    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index() {
        $token = Session::get( 'login_token' );
        $apiUrl = url( '/api/md-hotel-list' );
        $apiUrl2 = url( '/api/md-transportation-list' );
        $apiUrl3 = url( '/api/md-tour-list' );
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $hotel_details = $responseData[ 'hotel_details' ];

        $responseData = $this->apiService->getData( $token, $apiUrl2, $body, $method );
        $vehicle_details = $responseData[ 'data' ];

        $responseData = $this->apiService->getData( $token, $apiUrl3, $body, $method );
        $tour_details = $responseData[ 'tour_details' ];

        return view( 'front.mdhealth.medical-provider.other-services', compact( 'hotel_details', 'vehicle_details', 'tour_details' ) );
    }

    public function add_acommodition() {
        return view( 'front/mdhealth/medical-provider/add-acommodition' );
    }

    public function add_new_vehical() {
        $token = Session::get( 'login_token' );
        $apiUrl1 = url( '/api/md-master-brands' );
        $apiUrl2 = url( '/api/md-comfort-levels-master' );
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData( $token, $apiUrl1, $body, $method );
        $vehicle_details = $responseData[ 'data' ];

        $responseData = $this->apiService->getData( $token, $apiUrl2, $body, $method );
        $comfort_level_details = $responseData[ 'data' ];

        return view( 'front/mdhealth/medical-provider/add-new-vehical', compact( 'vehicle_details', 'comfort_level_details' ) );
    }

    public function add_tour() {
        return view( 'front/mdhealth/medical-provider/add-tour' );
    }

    public function saveStarRating( Request $request ) {
        $selectedStars = $request->input( 'selectedStars' );
        return response()->json( [ 'message' => 'Stars count received: ' . $selectedStars ] );
    }

    public function edit_acommodition( Request $request ) {
        $token = Session::get( 'login_token' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );

        $apiUrl = url( '/api/md-hotel-list-edit-view' );
        $body = [ 'hotel_id' => $decryptedId ];
        $method = 'POST';

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $hotel_details = $responseData[ 'hotel_details' ];

        return view( 'front/mdhealth/medical-provider/add-acommodition', compact( 'hotel_details' ) );
    }

    public function edit_vehicle( Request $request ) {
        $token = Session::get( 'login_token' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );
        $apiUrl = url( '/api/md-edit-transportation-details-view' );
        $body = [ 'id' => $decryptedId ];
        $method = 'POST';

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $transportation_details = $responseData[ 'data' ];
        // dd( $vehicle_details );

        $apiUrl2 = url( '/api/md-master-brands' );
        $apiUrl3 = url( '/api/md-comfort-levels-master' );
        $method2 = 'GET';
        $body2 = null;

        $responseData = $this->apiService->getData( $token, $apiUrl2, $body2, $method2 );
        $vehicle_details = $responseData[ 'data' ];

        $responseData = $this->apiService->getData( $token, $apiUrl3, $body2, $method2 );
        $comfort_level_details = $responseData[ 'data' ];
        return view( 'front/mdhealth/medical-provider/add-new-vehical', compact( 'transportation_details', 'vehicle_details', 'comfort_level_details' ) );
    }

    public function edit_tour( Request $request ) {
        $token = Session::get( 'login_token' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );

        $apiUrl = url( '/api/md-edit-tour-list-view' );
        $method = 'POST';
        $body = [ 'id' => $decryptedId ];

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        $tour_details = $responseData[ 'tour_details' ];

        return view( 'front/mdhealth/medical-provider/add-tour', compact( 'tour_details' ) );
    }

    public function delete_acommodition( Request $request ) {
        $token = Session::get( 'login_token' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );

        $apiUrl = url( '/api/md-edit-hotel-list' );
        $method = 'POST';
        $body = [ 'hotel_id' => $decryptedId ];

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        // $tour_details = $responseData[ 'tour_details' ];
        $selectedStars = $request->input( 'selectedStars' );
        return response()->json( [ 'message' => 'Stars count received: ' . $selectedStars ] );
    }

    public function md_add_new_acommodition( Request $request ) {
        $token = Session::get( 'login_token' );
        if ( empty( $request->hotel_id ) ) {
            $apiUrl = url( '/api/md-add-new-acommodition' );
        } else {
            $apiUrl = url( '/api/md-edit-hotel-list' );
        }

        $method = 'post';
        $body = $request->all();
        $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;
        // dd( $plainArray );

        if ( $request->hasFile( 'hotel_image_path' ) && $request->file( 'hotel_image_path' )->isValid() ) {
            $image = $request->file( 'hotel_image_path' );
            $image_name = 'hotel_image_path';
            $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method, $image, $image_name );
        } else {
            $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method );
        }
        if ( ( $responseData[ 'status' ] == 200 ) ) {
            return redirect( '/medical-other-services' )->with( 'success', $responseData[ 'message' ] );
        } else {
            return redirect( '/medical-other-services' )->with( 'error', $responseData[ 'message' ] );
        }
    }

    public function md_add_tour( Request $request ) {
        $token = Session::get( 'login_token' );
        if ( empty( $request->tour_id ) ) {
            // dd( $request );
            $apiUrl = url( '/api/md-add-tour' );
        } else {
            $apiUrl = url( '/api/md-edit-tour-list' );
        }
        $method = 'POST';
        $body = $request->all();

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        if ( ( $responseData[ 'status' ] == 200 ) ) {
            return redirect( '/medical-other-services' )->with( 'success', $responseData[ 'message' ] );
        } else {
            return redirect( '/medical-other-services' )->with( 'error', $responseData[ 'message' ] );
        }
    }

    public function md_add_transportation_details( Request $request ) {
        $token = Session::get( 'login_token' );
        if ( empty( $request->transportation_id ) ) {
            // dd( $request );
            $apiUrl = url( '/api/md-add-transportation-details' );
        } else {
            $apiUrl = url( 'api/md-edit-transportation-details' );
        }
        $method = 'POST';
        $body = $request->all();

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        if ( ( $responseData[ 'status' ] == 200 ) ) {
            return redirect( '/medical-other-services' )->with( 'success', $responseData[ 'message' ] );
        } else {
            return redirect( '/medical-other-services' )->with( 'error', $responseData[ 'message' ] );
        }
    }
}
