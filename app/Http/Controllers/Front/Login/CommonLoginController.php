<?php

namespace App\Http\Controllers\Front\Login;

use App\Http\Controllers\Controller;
use App\Models\CommonUserLoginTable;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderRegistrater;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;

class CommonLoginController extends Controller {
    public function user_login( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required'
        ] );
        $email = $request->email;
        $password = $request->password;
        $login_type = $request->login_type;

        $user_data = array(
            'email' => $request->get( 'email' ),
            'password' => $request->get( 'password' )
        );

        if ( Auth::guard( 'commonuser' )->attempt( $user_data ) ) {
            $user_id = Auth::guard( 'commonuser' )->user()->id;
            $user_type = Auth::guard( 'commonuser' )->user()->user_type;

            if ( $user_type == 'medicalprovider' ) {
                if (
                    Auth::guard( 'md_health_medical_providers_registers' )->attempt( [
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ] )
                ) {
                    $providers = Auth::guard( 'md_health_medical_providers_registers' )->user();
                    $otp = rand( 1111, 9999 );
                    $id = $providers->id;

                    MedicalProviderRegistrater::where( 'id', $providers->id )->update( [
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ] );
                    CommonUserLoginTable::where( 'id', $user_id )->update( [
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ] );
                    return redirect( 'sms-code' )->with( [
                        // 'error' => 'OTP does not match.',
                        'email' => $email,
                        'password' => $password,
                        'login_type' => $login_type,
                    ] );
                    // return view( 'front/mdhealth/authentication/sms-code', compact( 'password', 'email' ) );

                } else {
                    return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                }
            } elseif ( $user_type == 'customer' ) {

                if (
                    Auth::guard( 'md_customer_registration' )->attempt( [
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ] )
                ) {
                    $customers = Auth::guard( 'md_customer_registration' )->user();
                    $otp = rand( 1111, 9999 );
                    $id = $customers->id;

                    CustomerRegistration::where( 'id', $customers->id )->update( [
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ] );
                    CommonUserLoginTable::where( 'id', $user_id )->update( [
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ] );
                    return redirect( 'sms-code' )->with( [
                        // 'error' => 'OTP does not match.',
                        'email' => $email,
                        'password' => $password,
                        'login_type' => $login_type,
                    ] );
                    // return view( 'front/mdhealth/authentication/sms-code', compact( 'password', 'email' ) );

                } else {
                    return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                }
            }
        } else {
            return redirect( '/sign-in-web' )->with( 'error', 'Invalid Login Details!' );
        }
    }

    public function email_to_mobile( Request $request ) {
        $mobile_no = CommonUserLoginTable::where( 'email', $request->email )->select( 'mobile_no' )->first();
        // dd( $mobile_no );
        if ( !empty( $mobile_no ) ) {
            return $mobile_no;
        }
        //  else {
        //     return false;
        //  }
    }

    public function email_password_exist( Request $request ) {
        $user_exist = CommonUserLoginTable::where( 'email', $request->email )->first();

        // dd( $user_exist );

        // Check if user exists and verify the password using the Hash::check() method
        if ( !empty( $user_exist ) && Hash::check( $request->password, $user_exist->password ) ) {
            // dd( $user_exist );
            return response()->json( [ 'user_exist' => $user_exist ] );
            // Return user data as JSON response
        }
        // else {
        //     return response()->json( [ 'user_exist' => null ] );
        // Return null if user doesn't exist or credentials are incorrect
    // }
}
public function email_or_mobile_exist(Request $request){
    $email_exist = CommonUserLoginTable::where('email', $request->email)->first();
    $phone_exist = CommonUserLoginTable::where('mobile_no', $request->phone)->first();
    $mobile_no_exist = CommonUserLoginTable::where('mobile_no', $request->mobile_no)->first();
    if(!empty($email_exist)){
        return response()->json(['email_exist' => $email_exist]);
    }
    if(!empty($phone_exist)){
        return response()->json(['phone_exist' => $phone_exist]);
    }
    if(!empty($mobile_no_exist)){
        return response()->json(['mobile_no_exist' => $mobile_no_exist]);
    }
}






    public function otp_verify_for_register(request $request)
    {
        // dd($request);
        $user_datacust = array(
            'platform_type' => 'web',
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $apiUrl = url('/api/md-customer-login');

        $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        // dd($responseData);
        Session::put('login_token', $responseData['success_token']['token']);
        // dd(Session::get('login_token'));

        // $otpverify = implode('', $request->input('otp'));
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $email = $request->email;
        $password = $request->password;
        $login_type = $request->login_type;
        // dd($request.'<br>'.$otpverify);
        if (Auth::guard('commonuser')->attempt($user_data)) {
            $user_id = Auth::guard('commonuser')->user()->id;
            $user_type = Auth::guard('commonuser')->user()->user_type;

            if ($user_type == 'medicalprovider') {
                if (
                    Auth::guard('md_health_medical_providers_registers')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'email' => $request->get('email'),
                        'password' => $request->get('password')
                    );
                    $apiUrl = url('/api/md-medical-provider-login');

                    $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                    $response = app()->handle($newRequest);

                    $respo = $response->getContent();
                    $responseData = json_decode($respo, true);
                    // dd($responseData);
                    Session::put('login_token', $responseData['success_token']['token']);
                    $providers = Auth::guard('md_health_medical_providers_registers')->user();
                    if ($login_type == 'login') {
                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Login successfully.',
                                'url' => '/medical-provider-dashboard',
                            ] );
                        } else {
                            dd($user_type);
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ] );
                        }
                    } else {

                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/medical-provider-dashboard',
                            ] );
                        } else {
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ] );
                        }

                    }
                }
            }



            elseif ($user_type == 'customer') {

                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'email' => $request->get('email'),
                        'password' => $request->get('password')
                    );
                    $apiUrl = url('/api/md-customer-login');

                    $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                    $response = app()->handle($newRequest);

                    $respo = $response->getContent();
                    $responseData = json_decode($respo, true);
                    // dd($responseData);
                    Session::put('login_token', $responseData['success_token']['token']);


                    $providers = Auth::guard('md_customer_registration')->user();

                    if ($login_type == 'login') {
                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_email = Auth::guard('md_customer_registration')->user()->email;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            // dd(Session::all());
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Login successfully.',
                                // 'url' => '/user-profile',
                                'url' => '/user-profile'
                            ] );
                        } else {

                            return response()->json( [
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ] );
                        }
                    } else {

                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_email = Auth::guard('md_customer_registration')->user()->email;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/user-profile',
                            ] );
                        } else {
                            return response()->json( [
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ] );
                        }

                    }
                }
            }
        }

        return redirect('/sign-in-web')->with('error', 'Invalid Login Details!' );
    }

}
