<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CommonUserLoginTable;
use App\Models\Country;
use App\Models\CustomerLogs;
use App\Models\CustomerRegistration;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use DB;

class UserRegistrationController extends Controller {
    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function customer_register( request $request ) {
        // dd( $request );
        // $email_exist = CustomerRegistration::where( 'status', 'active' )
        // ->where( 'email', $request->email )
        // ->first();
        // $email_exist_common = CommonUserLoginTable::where( 'status', 'active' )
        // ->where( 'email', $request->email )
        // ->first();

        // if ( $email_exist || $email_exist_common ) {
        //     // return redirect( '/user-account' )->with( 'error', 'Email id already exist.' );
        //     return response()->json( [
        //         'status' => 200,
        //         'message' => 'Email id already exist.',
        //         'url' => '/user-account',
        // ] );
        // } else {
        //     $phone_exist = CustomerRegistration::where( 'status', 'active' )
        //     ->where( 'phone', $request->phone )
        //     ->first();
        //     $phone_exist_common = CommonUserLoginTable::where( 'status', 'active' )
        //     ->where( 'mobile_no', $request->phone )
        //     ->first();

        //     if ( $phone_exist || $phone_exist_common ) {
        //         // return redirect( '/user-account' )->with( 'error', 'Mobile number already exist.' );
        //         return response()->json( [
        //             'status' => 200,
        //             'message' => 'Mobile number already exist.',
        //             'url' => '/user-account',
        // ] );
        //     }
        // }

        // $commonData = [];
        // $commonData[ 'email' ] = $request->email;
        // $commonData[ 'mobile_no' ] = $request->phone;
        // $commonData[ 'user_type' ] = 'customer';
        // $commonData[ 'password' ] = Hash::make( $request->password );
        // $common_data_registration = CommonUserLoginTable::create( $commonData );

        // $lastInsertedId = $common_data_registration->id;

        // $customer_input = [];
        // $customer_input[ 'first_name' ] = $request->first_name;
        // $customer_input[ 'last_name' ] = $request->last_name;
        // $customer_input[ 'full_name' ] = $request->first_name . ' ' . $request->last_name;
        // $customer_input[ 'email' ] = $request->email;
        // $customer_input[ 'phone' ] = $request->phone;
        // $customer_input[ 'gender' ] = $request->gender;
        // $customer_input[ 'country_id' ] = $request->country_id;
        // $customer_input[ 'city_id' ] = $request->city_id;
        // $customer_input[ 'address' ] = $request->address;
        // $customer_input[ 'date_of_birth' ] = $request->date_of_birth;
        // $customer_input[ 'password' ] = Hash::make( $request->password );
        // $customer_input[ 'platform_type' ] = $request->platform_type;
        // // $otp = rand( 1111, 9999 );
        // // $customer_input[ 'registration_otp' ] = $otp;
        // // $customer_input[ 'login_otp' ] = $request->shop_owner_upi_id;
        // // $customer_input[ 'fcm_token' ] = $request->fcm_token;
        // // $customer_input[ 'otp_expiring_time' ] = time() + 20;
        // $customer_input[ 'modified_ip_address' ] = $request->ip();
        // $customer_registration = CustomerRegistration::create( $customer_input );

        // if ( !empty( $customer_registration ) ) {
        //     $customer_logs = [];
        //     $customer_logs[ 'customer_id' ] = !empty( $customer_registration->id ) ? $customer_registration->id : '';
        //     $customer_logs[ 'status' ] = 'active';
        //     $customer_logs[ 'type' ] = 'signup';
        //     CustomerLogs::create( $customer_logs );
        //     // return redirect( 'user-profile' )->with( 'success', 'Profile created successfully.' );

        // } else {
        //     $customer_logs = [];
        //     $customer_logs[ 'customer_id' ] = !empty( $customer_registration->id ) ? $customer_registration->id : '';
        //     $customer_logs[ 'status' ] = 'inactive';
        //     $customer_logs[ 'type' ] = 'signup';
        //     CustomerLogs::create( $customer_logs );
        //     // return redirect( 'user-profile' )->with( 'error', 'Profile not completed.' );
        // }

        // $CustomerRegistration = CustomerRegistration::select( 'id' )->get();
        // if ( !empty( $CustomerRegistration ) ) {
        //     foreach ( $CustomerRegistration as $key => $value ) {

        //         $length = strlen( $value->id );

        //         if ( $length == 1 ) {
        //             $customer_unique_id = '#MDCUST00000' . $value->id;
        //         } elseif ( $length == 2 ) {
        //             $customer_unique_id = '#MDCUST0000' . $value->id;
        //         } elseif ( $length == 3 ) {
        //             $customer_unique_id = '#MDCUST000' . $value->id;
        //         } elseif ( $length == 4 ) {
        //             $customer_unique_id = '#MDCUST00' . $value->id;
        //         } elseif ( $length == 5 ) {
        //             $customer_unique_id = '#MDCUST0' . $value->id;
        //         } else {
        //             $customer_unique_id = '#MDCUST' . $value->id;
        //         }

        //     }
        //     $update_unique_id = CustomerRegistration::where( 'id', $value->id )->update( [ 'customer_unique_no' => $customer_unique_id ] );
        //     $common_data_registrationid = CommonUserLoginTable::where( 'id', $lastInsertedId )->update( [ 'user_id' => $value->id, 'status'=>'active' ] );

            $referralCode = $request->query('referral_code');
            $coinStatusId = $request->query('coin_status_id');

        
         

        $token = null;
        $apiUrl = url( '/api/md-customer-register');

        $method = 'POST';
        $body = $request->all();

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        Session::put( 'login_token', $responseData[ 'data' ][ 'access_token' ] );

        $user_data = array(
            'email' => $request->get( 'email' ),
            'phone' => $request->get( 'phone' ),
            'password' => $request->get( 'password'),
        );
        $email = $request->email;
        $password = $request->password;
        if ( Auth::guard( 'md_customer_registration' )->attempt( $user_data ) ) {
            if (
                Auth::guard( 'md_customer_registration' )->attempt( [
                    'email' => $request->email,
                    'password' => $request->password,
                    'status' => 'active',
                ] )
            ) {
                // $customer = Auth::guard( 'md_customer_registration' )->user();
                // $otpcheck = CustomerRegistration::where( 'id', $customer->id )
                // // ->where( 'registration_otp', $otpverify )
                // ->where( 'status', 'active' )
                // // ->where( 'otp_expiring_time', '>=', now() )
                // ->first();

                // if ( $otpcheck ) {
                // dd( $otpcheck );
                $user_id = Auth::guard( 'md_customer_registration' )->user()->id;
                $user_email = Auth::guard( 'md_customer_registration' )->user()->email;
                $user = Auth::guard( 'md_customer_registration' )->user();

                Session::put( 'MDCustomer*%', $user_id );
                Session::put( 'email', $user_email );
                Session::put( 'user', $user );
                // return redirect( '/user-profile' )->with( 'success', 'Profile created successfully.' );
                //     return response()->json( [
                //         'status' => 200,
                //         'message' => 'Profile created successfully.',
                //         'url' => '/user-profile',
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

                return response()->json( [
                    'status' => 200,
                    'message' => $responseData[ 'message' ],
                    'url' => '/my-profile',
                ] );
            } else {
                // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                return response()->json( [
                    'status' => 404,
                    'message' => $responseData[ 'message' ],
                    'url' => '/user-account',
                ] );
            }
        }

    }

    // }

    public function edit_customer() {
        // dd( Session::get( 'user' ) );

        $customer_list = CustomerRegistration::where( 'md_customer_registration.status', 'active' )
        ->select(
            'md_customer_registration.id',
            'md_customer_registration.first_name',
            'md_customer_registration.last_name',
            'md_customer_registration.full_name',
            'md_customer_registration.email',
            'md_customer_registration.phone',
            'md_customer_registration.gender',
            'md_customer_registration.date_of_birth',
            'md_master_country.country_name',
            'md_master_cities.city_name',
            'md_customer_registration.country_id',
            'md_customer_registration.city_id',
            'md_customer_registration.address',
            'md_customer_registration.password',
            'md_customer_registration.user_type'
        )
        ->join( 'md_master_country', 'md_customer_registration.country_id', 'md_master_country.id' )
        ->join( 'md_master_cities', 'md_customer_registration.city_id', 'md_master_cities.id' )
        ->where( 'md_customer_registration.id', Auth::guard( 'md_customer_registration' )->user()->id )
        ->first();

        $countries = Country::where( 'status', 'active' )
        ->select( 'id', 'country_name' )
        ->orderBy( 'country_name' )
        ->get();

        $cities = Cities::where( 'status', 'active' )
        ->orderBy( 'city_name' )
        ->select( 'id', 'city_name' )
        ->get();
// dd($customer_list);
        if ( !empty( $customer_list ) ) {

            return view( 'front.mdhealth.user-panel.user-profile', compact( 'customer_list', 'countries', 'cities' ) );
        } else {

            return view( 'front.mdhealth.user-panel.user-profile', compact( 'countries', 'cities' ) );
        }

    }

    public function update_customer_profile( Request $request ) {

    //    $email_exist=CustomerRegistration::where('status','active')
    //     ->where('email',$request->email)
    //     ->first();

    //     $email_exist_common = CommonUserLoginTable::where('status', 'active')
    //     ->where('email', $request->email)
    //     ->first();

    //     if($email_exist || $email_exist_common){
    //         return redirect('/my-profile')->with('error', 'Email address already exist');
    //     }

    //     $mobile_no= CustomerRegistration::where('status', 'active')
    //     ->where('mobile_no', $request->phone)
    //     ->first();
    //     $mobile_no_common = CommonUserLoginTable::where('status', 'active')
    //     ->where('mobile_no', $request->phone)
    //     ->first();

    //     if ($mobile_no || $mobile_no_common) {
    //         return redirect('/my-profile')->with('error', 'Mobile number already exist');
    //     }

        $customer_input = [];
        $customer_input[ 'first_name' ] = $request->first_name;
        $customer_input[ 'last_name' ] = $request->last_name;
        $customer_input[ 'email' ] = $request->email;
        $customer_input[ 'phone' ] = $request->phone;
        $customer_input[ 'address' ] = $request->address;
        $customer_input[ 'country_id' ] = $request->country_id;
        $customer_input[ 'city_id' ] = $request->city_id;
        $customer_input[ 'gender' ] = $request->gender;
        $customer_input[ 'date_of_birth' ] = $request->date_of_birth;
        $customer_input[ 'modified_ip_address' ] = $request->ip();

        $customer_update = CustomerRegistration::where( 'id', Auth::guard( 'md_customer_registration' )->user()->id )->update( $customer_input );

        if ( !empty( $customer_update ) ) {

            return redirect( '/my-profile' )->with( 'success', 'Profile details updated successfully.' );
        } else {
            return redirect( '/my-profile' )->with( 'error', 'Something went wrong. Details not updated.' );
        }
    }

    public function check_password_exist( Request $request ) {
        $email = Auth::guard( 'md_customer_registration' )->user()->email;
        $old_password = DB::table( 'md_customer_registration' )->where( 'email', '=', $email )
        ->select( 'password' )
        ->first();

        $check_password = Hash::check( $request->password, $old_password->password );

        return !empty( $check_password ) ? 'true' : 'false';

    }

    public function update_customer_password( Request $request ) {
        // if ( $request->oldPassword == $request->newPassword ) {
        $customer_input = [];
        $customer_input[ 'password' ] = Hash::make( $request->newPassword );
        $customer_input[ 'modified_ip_address' ] = $request->ip();
        $customer_update = CustomerRegistration::where( 'id', Auth::guard( 'md_customer_registration' )->user()->id )->update( $customer_input );
        CommonUserLoginTable::where( 'user_id', Auth::guard( 'md_customer_registration' )->user()->id )->update( $customer_input );

        if ( !empty( $customer_update ) ) {
            // dd( $customer_update );
            // Auth::logout();
            // Session::flush();
            return redirect( '/my-profile' )->with( 'success', 'Profile details updated successfully.' );
        } else {
            return redirect( '/my-profile' )->with( 'error', 'Something went wrong. Details not updated.' );
        }
        // }
    }

}

