<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CommonUserLoginTable;
use App\Models\Country;
use App\Models\MedicalProviderLicense;
use App\Models\MedicalProviderLogo;
use App\Models\MedicalProviderRegistrater;
use App\Services\ApiService;
use App\Traits\MediaTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class MedicalProviderRegistrationController extends Controller {
    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index() {
        $countries = Country::get();
        $cities = Cities::get();
        return view( 'front/mdhealth/authentication/user-account', compact( 'countries', 'cities' ) );
    }

    public function indexmedpro() {
        $countries = Country::get();
        $cities = Cities::get();
        return view( 'front/mdhealth/authentication/medical-provider-login', compact( 'countries', 'cities' ) );
    }

    public function vendor_login() {
        $countries = Country::get();
        $cities = Cities::get();
        return view( 'front/mdhealth/authentication/vendor-login', compact( 'countries', 'cities' ) );
    }

    public function md_register_medical_provider( request $request ) {

        // $email_exist = MedicalProviderRegistrater::where( 'status', 'active' )
        //     ->where( 'email', $request->email )
        //     ->first();
        // $email_exist_common = CommonUserLoginTable::where( 'status', 'active' )
        //     ->where( 'email', $request->email )
        //     ->first();

        // if ( $email_exist || $email_exist_common ) {
        //         // return redirect( '/user-account' )->with( 'error', 'Email id already exist.' );
        //         return response()->json( [
        //             'status' => 200,
        //             'message' => 'Email id already exist.',
        //             'url' => '/user-account',
        // ] );

        // } else {
        //     $phone_exist = MedicalProviderRegistrater::where( 'status', 'active' )
        //         ->where( 'mobile_no', $request->phone )
        //         ->first();
        //     $phone_exist_common = CommonUserLoginTable::where( 'status', 'active' )
        //         ->where( 'mobile_no', $request->phone )
        //         ->first();

        //     if ( $phone_exist || $phone_exist_common ) {
        //             // return redirect( '/user-account' )->with( 'error', 'Mobile number already exist.' );
        //             return response()->json( [
        //                 'status' => 200,
        //                 'message' => 'Mobile number already exist.',
        //                 'url' => '/user-account',
        // ] );
        //     }
        // }

        // $commonData = [];
        // $commonData[ 'email' ] = $request->email;
        // $commonData[ 'mobile_no' ] = $request->phone;
        // $commonData[ 'user_type' ] = 'medicalprovider';
        // $commonData[ 'password' ] = Hash::make( $request->password );
        // $common_data_registration = CommonUserLoginTable::create( $commonData );
        // $lastInsertedId = $common_data_registration->id;
        // return $lastInsertedId;

        // $md_provider_input = [];
        // $md_provider_input[ 'company_name' ] = $request->company_name;
        // $md_provider_input[ 'city_id' ] = $request->city_id;
        // $md_provider_input[ 'email' ] = $request->email;
        // $md_provider_input[ 'mobile_no' ] = $request->phone;
        // $md_provider_input[ 'tax_no' ] = $request->tax_no;
        // $md_provider_input[ 'company_address' ] = $request->company_address;
        // $md_provider_input[ 'password' ] = Hash::make( $request->password );
        // $md_provider_input[ 'modified_ip_address' ] = $request->ip();
        // $md_provider_registration = MedicalProviderRegistrater::create( $md_provider_input );

        // $MedicalProviderRegistrater = MedicalProviderRegistrater::select( 'id' )->get();
        // if ( !empty( $MedicalProviderRegistrater ) ) {
        //     foreach ( $MedicalProviderRegistrater as $key => $value ) {
        //         $length = strlen( $value->id );
        //         if ( $length == 1 ) {
        //             $provider_unique_id = '#MDPRVDR00000' . $value->id;
        //         } elseif ( $length == 2 ) {
        //             $provider_unique_id = '#MDPRVDR0000' . $value->id;
        //         } elseif ( $length == 3 ) {
        //             $provider_unique_id = '#MDPRVDR000' . $value->id;
        //         } elseif ( $length == 4 ) {
        //             $provider_unique_id = '#MDPRVDR00' . $value->id;
        //         } elseif ( $length == 5 ) {
        //             $provider_unique_id = '#MDPRVDR0' . $value->id;
        //         } else {
        //             $provider_unique_id = '#MDPRVDR' . $value->id;
        //         }
        //         // dd( $MedicalProviderRegistrater );
        //     }
        // $update_unique_id = MedicalProviderRegistrater::where( 'id', $value->id )->update( [ 'provider_unique_id' => $provider_unique_id ] );
        // $common_data_registrationid = CommonUserLoginTable::where( 'id', $lastInsertedId )->update( [ 'user_id' => $value->id, 'status'=>'active' ] );

        //     $user_datacust = array(
        //     'platform_type' => 'web',
        //     'email' => $request->get( 'email' ),
        //     'password' => $request->get( 'password' )
        // );
        // dd( $_FILES, $request );
        $token = null;
        $apiUrl = url( '/api/md-register-medical-provider' );

        $method = 'POST';
        $body = $request->all();
        $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;

        if ( $request->hasFile( 'company_logo_image_path' ) && $request->hasFile( 'company_licence_image_path' ) ) {
            $image = [];
            $image_name = [];
            if ( $request->hasFile( 'company_logo_image_path' ) && $request->file( 'company_logo_image_path' )->isValid() ) {
                $image[] = $request->file( 'company_logo_image_path' );
                $image_name[] = 'company_logo_image_path';
            }
            if ( $request->hasFile( 'company_licence_image_path' ) && $request->file( 'company_licence_image_path' )->isValid() ) {
                $image[] = $request->file( 'company_licence_image_path' );
                $image_name[] = 'company_licence_image_path';
            }

            $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method, $image, $image_name );
        } else {
            $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        }

        // $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        Session::put( 'login_token', $responseData[ 'data' ][ 'access_token' ] );

        // $provider = Auth::guard( 'md_health_medical_providers_registers' )->user();
        // $otpcheck = MedicalProviderRegistrater::where( 'id', $provider->id )
        //     // ->where( 'registration_otp', $otpverify )
        //     ->where( 'status', 'active' )
        //     // ->where( 'otp_expiring_time', '>=', now() )
        //     ->first();

        // if ( $otpcheck ) {
        // dd( $otpcheck );
        $user_data = array(
            'email' => $request->get( 'email' ),
            'mobile_no' => $request->get( 'phone' ),
            'password' => $request->get( 'password' )
        );
        $email = $request->email;
        $password = $request->password;
        if ( Auth::guard( 'md_health_medical_providers_registers' )->attempt( $user_data ) ) {
            if (
                Auth::guard( 'md_health_medical_providers_registers' )->attempt( [
                    'email' => $request->email,
                    'password' => $request->password,
                    'status' => 'active',
                ] )
            ) {
                $user_id = Auth::guard( 'md_health_medical_providers_registers' )->user()->id;
                $user_email = Auth::guard( 'md_health_medical_providers_registers' )->user()->email;
                $user = Auth::guard( 'md_health_medical_providers_registers' )->user();

                Session::put( 'MDMedicalProvider*%', $user_id );
                Session::put( 'email', $user_email );
                Session::put( 'user', $user );
                // return redirect( '/user-profile' )->with( 'success', 'Profile created successfully.' );
                //     return response()->json( [
                //         'status' => 200,
                //         'message' => 'Profile created successfully.',
                //         'url' => '/medical-provider-dashboard',
                // ] );
                // } else {
                //     // return redirect( 'sms-code' )->with( [
                //     //     'error' => 'OTP does not match.',
                //     //     'email' => $request->email,
                //     //     'password' => $request->password,
                //     // ] );
                //     return response()->json( [
                //         'status' => 200,
                //         'message' => 'Credencials not match',
                //         'url' => '/sign-in-web',
                // ] );
                // }

                //     } else {
                //         // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                //         return response()->json( [
                //             'status' => 200,
                //             'message' => 'Your credencials does not matched.',
                //             'url' => '/sign-in-web',
                // ] );
            }
        }

        // if ( $request->has( 'company_logo_image_path' ) ) {
        //     if ( $request->file( 'company_logo_image_path' ) ) {
        //         $md_provider_input_image_logo[ 'company_logo_image_path' ] = $this->verifyAndUpload( $request, 'company_logo_image_path', 'company/company_logo' );
        //         $original_name = $request->file( 'company_logo_image_path' )->getClientOriginalName();
        //         $md_provider_input_image_logo[ 'company_logo_image_name' ] = $original_name;
        //     }
        // }
        // MedicalProviderLogo::create( $md_provider_input_image_logo );

        // if ( $request->has( 'company_licence_image_path' ) ) {
        //     if ( $request->file( 'company_licence_image_path' ) ) {
        //         $md_provider_input_image_license[ 'company_licence_image_path' ] = $this->verifyAndUpload( $request, 'company_licence_image_path', 'company/licence' );
        //         $original_name = $request->file( 'company_licence_image_path' )->getClientOriginalName();
        //         $md_provider_input_image_license[ 'company_licence_image_name' ] = $original_name;
        //     }
        // }

        // MedicalProviderLicense::create( $md_provider_input_image_license );

        if ( !empty( $responseData[ 'data' ][ 'access_token' ] ) ) {
            // if ( $request->platform_type != 'ios' && $request->platform_type != 'android' ) {
            // return redirect( '/medical-provider-dashboard' )->with( 'success', $responseData[ 'message' ] );
            // }
            return response()->json( [
                'status' => 200,
                'message' => $responseData[ 'message' ],
                'url' => '/medical-provider-dashboard',
            ] );

        } else {
            // if ( $request->platform_type != 'ios' && $request->platform_type != 'android' ) {
            // return redirect( '/medical-provider-login' )->with( 'success', $responseData[ 'message' ] );
            // }
            return response()->json( [
                'status' => 404,
                'message' => $responseData[ 'message' ],
                'url' => '/medical-provider-login',
            ] );

        }
        // }
    }

    public function logout( Request $request ) {
        Auth::logout();
        Session::flush();
        return redirect( '/' )->with( 'success', 'Logout Successfully!' );
    }
}

// $user_data = array(
//     'email' => $request->get( 'email' ),
//     'mobile_no' => $request->get( 'phone' ),
//     'password' => $request->get( 'password' )
// );

// login by Auth
// if ( Auth::guard( 'md_health_medical_providers_registers' )->attempt( $user_data ) ) {
//     if ( Auth::guard( 'md_health_medical_providers_registers' )->user()->status != 'active' ) {
//         Auth::logout();
//         Session::flush();
//         return redirect( '/' )->with( 'error', 'Contact to admin to login.' );
//     } else {
//         // Auth::login( $user_data );
//         $user_id = Auth::guard( 'md_health_medical_providers_registers' )->user()->id;
//         $user_email = Auth::guard( 'md_health_medical_providers_registers' )->user()->email;

//         Session::put( 'MDMedicalProvider*%', $user_id );
//         Session::put( 'email', $user_email );
//         // return redirect( 'admin/dashboard' )->with( 'success', 'Login successfully!' );
//     }
// } else {
//     return redirect( '/user-account' )->with( 'error', 'Invalid Login Details!' );

// }
