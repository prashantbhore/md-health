<?php

namespace App\Http\Controllers\Front\Login;

use App\Http\Controllers\Controller;
use App\Models\CommonUserLoginTable;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderRegistrater;
use App\Models\VendorRegister;
use App\Models\MDFoodRegisters;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;

class CommonLoginController extends Controller
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function user_login(Request $request)
    {
        $request->validate([
            'number' => 'required|number',
            'password' => 'required'
        ]);
        $number = $request->number;
        $password = $request->password;
        $login_type = $request->login_type;

        $user_data = array(
            'number' => $request->get('number'),
            'password' => $request->get('password')
        );

        if (Auth::guard('commonuser')->attempt($user_data)) {
            $user_id = Auth::guard('commonuser')->user()->id;
            $user_type = Auth::guard('commonuser')->user()->user_type;

            if ($user_type == 'medicalprovider') {
                if (
                    Auth::guard('md_health_medical_providers_registers')->attempt([
                        'number' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $providers = Auth::guard('md_health_medical_providers_registers')->user();
                    $otp = rand(1111, 9999);
                    $id = $providers->id;

                    MedicalProviderRegistrater::where('id', $providers->id)->update([
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    CommonUserLoginTable::where('id', $user_id)->update([
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    return redirect('sms-code')->with([
                        // 'error' => 'OTP does not match.',
                        'number' => $number,
                        'password' => $password,
                        'login_type' => $login_type,
                    ]);
                    // return view( 'front/mdhealth/authentication/sms-code', compact( 'password', 'number' ) );

                } else {
                    return redirect('/sign-in-web')->with('error', 'Your credencials does not matched.');
                }
            } elseif ($user_type == 'customer') {

                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'number' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $customers = Auth::guard('md_customer_registration')->user();
                    $otp = rand(1111, 9999);
                    $id = $customers->id;

                    CustomerRegistration::where('id', $customers->id)->update([
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    CommonUserLoginTable::where('id', $user_id)->update([
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    return redirect('sms-code')->with([
                        // 'error' => 'OTP does not match.',
                        'number' => $number,
                        'password' => $password,
                        'login_type' => $login_type,
                    ]);
                    // return view( 'front/mdhealth/authentication/sms-code', compact( 'password', 'number' ) );

                } else {
                    return redirect('/sign-in-web')->with('error', 'Your credencials does not matched.');
                }
            }
        } else {
            return redirect('/sign-in-web')->with('error', 'Invalid Login Details!');
        }
    }

    public function number_to_mobile(Request $request)
    {
        // dd($request);
        $mobile_no = CommonUserLoginTable::where('mobile_no', $request->number)->select('mobile_no')->first();
        // dd( $mobile_no );
        if (!empty($mobile_no)) {
            return $mobile_no;
        }
        //  else {
        //     return false;
        //  }
    }

    public function number_password_exist(Request $request)
    {
        $user_exist = CommonUserLoginTable::where('mobile_no', $request->number)->first();

        // dd( $user_exist );

        // Check if user exists and verify the password using the Hash::check() method
        if (!empty($user_exist) && Hash::check($request->password, $user_exist->password)) {
            // dd( $user_exist );
            return response()->json(['user_exist' => $user_exist]);
            // Return user data as JSON response
        }
        // else {
        //     return response()->json( [ 'user_exist' => null ] );
        // Return null if user doesn't exist or credentials are incorrect
        // }
    }
    public function email_or_mobile_exist(Request $request)
    {
        // dd($request);
        if ($request->email) {
            $email_exist = CommonUserLoginTable::where('email', $request->email)
                ->where('status', 'active')->first();
        }

        if ($request->phone) {
            $phone_exist = CommonUserLoginTable::where('mobile_no', $request->phone)
                ->where('status', 'active')
                ->first();
        }

        if ($request->mobile_no) {
            $mobile_no_exist = CommonUserLoginTable::where('mobile_no', $request->mobile_no)
                ->where('status', 'active')
                ->first();
        }


        if (!empty($email_exist)) {
            return response()->json(['email_exist' => $email_exist]);
        }
        if (!empty($phone_exist)) {
            return response()->json(['phone_exist' => $phone_exist]);
        }
        if (!empty($mobile_no_exist)) {
            return response()->json(['mobile_no_exist' => $mobile_no_exist]);
        }
    }






    public function otp_verify_for_register(request $request)
    {
        // dd($request);
        $user_datacust = array(
            'platform_type' => 'web',
            'number' => $request->get('number'),
            'password' => $request->get('password')
        );
        $token = Session::get('login_token');
        // dd(Session::get('login_token'));

        // $otpverify = implode('', $request->input('otp'));
        $user_data = array(
            'mobile_no' => $request->get('number'),
            'password' => $request->get('password')
        );
        $number = $request->number;
        $password = $request->password;
        $login_type = $request->login_type;
        // dd($request.'<br>'.$otpverify);
        if (Auth::guard('commonuser')->attempt($user_data)) {
            $user_id = Auth::guard('commonuser')->user()->id;
            $user_type = Auth::guard('commonuser')->user()->user_type;

            if ($user_type == 'medicalprovider') {
                // $apiUrl = url('/api/md-medical-provider-login');

                // $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                // $response = app()->handle($newRequest);

                // $respo = $response->getContent();
                // $responseData = json_decode($respo, true);
                // // dd($responseData);
                // Session::put('login_token', $responseData['success_token']['token']);
                if (
                    Auth::guard('md_health_medical_providers_registers')->attempt([
                        'mobile_no' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'mobile_no' => $request->get('number'),
                        'password' => $request->get('password')
                    );

                    $apiUrl = url('/api/md-medical-provider-login');
                    $method = 'POST';
                    $body = $user_datacust;

                    $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
                    Session::put('login_token', $responseData['success_token']['token']);
                    $providers = Auth::guard('md_health_medical_providers_registers')->user();
                    if ($login_type == 'login') {
                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_number = Auth::guard('md_health_medical_providers_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Login successfully.',
                                'url' => '/medical-provider-dashboard',
                            ]);
                        } else {
                            // dd($user_type);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }
                    } else {

                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_number = Auth::guard('md_health_medical_providers_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/medical-provider-dashboard',
                            ]);
                        } else {
                            return response()->json([
                                'status' => 200,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }

                    }
                }
            } elseif ($user_type == 'customer') {
                // $apiUrl = url('/api/md-customer-login');

                // $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                // $response = app()->handle($newRequest);

                // $respo = $response->getContent();
                // $responseData = json_decode($respo, true);
                // // dd($responseData);
                // Session::put('login_token', $responseData['success_token']['token']);

                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'phone' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'phone' => $request->get('number'),
                        'password' => $request->get('password')
                    );

                    $apiUrl = url('/api/md-customer-login');
                    $method = 'POST';
                    $body = $user_datacust;

                    $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
                    // dd($responseData);
                    // dd( $responseData['success_token']);
                    Session::put('login_token', $responseData['success_token']['token']);

                    $providers = Auth::guard('md_customer_registration')->user();

                    if ($login_type == 'login') {
                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_number = Auth::guard('md_customer_registration')->user()->mobile_no;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            // dd(Session::all());
                            return response()->json([
                                'status' => 200,
                                'message' => 'Login successfully.',
                                // 'url' => '/user-profile',
                                'url' => '/my-profile'
                            ]);
                        } else {

                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }
                    } else {

                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_number = Auth::guard('md_customer_registration')->user()->phone;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/my-profile',
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }

                    }
                }
            } elseif ($user_type == 'vendor') {
                // $apiUrl = url('/api/md-customer-login');

                // $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                // $response = app()->handle($newRequest);

                // $respo = $response->getContent();
                // $responseData = json_decode($respo, true);
                // // dd($responseData);
                // Session::put('login_token', $responseData['success_token']['token']);
// dd($request);
                if (
                    Auth::guard('md_health_medical_vendor_registers')->attempt([
                        'mobile_no' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'mobile_no' => $request->get('number'),
                        'password' => $request->get('password')
                    );

                    $apiUrl = url('/api/md-vendor-login');
                    $method = 'POST';
                    $body = $user_datacust;

                    $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
                    // dd($responseData);
                    // dd( $responseData['success_token']);
                    Session::put('login_token', $responseData['success_token']['token']);

                    $providers = Auth::guard('md_health_medical_vendor_registers')->user();
                    // dd($providers);
                    if ($login_type == 'login') {
                        // dd($providers->id);
                        $otpcheck = VendorRegister::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();


                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_medical_vendor_registers')->user()->id;
                            $user_number = Auth::guard('md_health_medical_vendor_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_medical_vendor_registers')->user();

                            Session::put('MDMedicalVendor*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            // dd(Session::all());
                            return response()->json([
                                'status' => 200,
                                'message' => 'Login successfully.',
                                // 'url' => '/user-profile',
                                'url' => '/vendor-dashboard'
                            ]);
                        } else {

                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }
                    } else {
                        // dd('fdgfdvsdvbg');
                        $otpcheck = VendorRegister::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_health_medical_vendor_registers')->user()->id;
                            $user_number = Auth::guard('md_health_medical_vendor_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_medical_vendor_registers')->user();

                            Session::put('MDMedicalVendor*%', $user_id);
                            Session::put('number', $user_number);
                            Session::put('user', $user);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/vendor-dashboard',
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }

                    }
                }
            } elseif ($user_type == 'food') {
                // $apiUrl = url('/api/md-customer-login');

                // $newRequest = Request::create($apiUrl, 'POST', $user_datacust);
                // $response = app()->handle($newRequest);

                // $respo = $response->getContent();
                // $responseData = json_decode($respo, true);
                // // dd($responseData);
                // Session::put('login_token', $responseData['success_token']['token']);

                if (
                    Auth::guard('md_health_food_registers')->attempt([
                        'mobile_no' => $request->number,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $user_datacust = array(
                        'platform_type' => 'web',
                        'mobile_no' => $request->get('number'),
                        'password' => $request->get('password')
                    );

                    $apiUrl = url('/api/md-food-login');
                    $method = 'POST';
                    $body = $user_datacust;

                    $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
                    // dd($responseData);
                    // dd( $responseData['success_token']);
                    Session::put('login_token', $responseData['success_token']['token']);

                    $providers = Auth::guard('md_health_food_registers')->user();
                    // dd($providers);
                    if ($login_type == 'login') {
                        // dd($providers->id);
                        $otpcheck = MDFoodRegisters::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();


                        if ($otpcheck) {
                            $user_id = Auth::guard('md_health_food_registers')->user()->id;
                            $mobile_no = Auth::guard('md_health_food_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_food_registers')->user();

                            Session::put('MDFoodVendor*%', $user_id);
                            Session::put('email', $mobile_no);
                            Session::put('user', $user);
                            // dd(Session::all());
                            return response()->json([
                                'status' => 200,
                                'message' => 'Login successfully.',
                                // 'url' => '/user-profile',
                                'url' => '/food-provider-panel-dashboard'
                            ]);
                        } else {

                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }
                    } else {
                        // dd('fdgfdvsdvbg');
                        $otpcheck = MDFoodRegisters::where('id', $providers->id)
                            ->where('status', 'active')
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_health_food_registers')->user()->id;
                            $mobile_no = Auth::guard('md_health_food_registers')->user()->mobile_no;
                            $user = Auth::guard('md_health_food_registers')->user();

                            Session::put('MDFoodVendor*%', $user_id);
                            Session::put('email', $mobile_no);
                            Session::put('user', $user);
                            return response()->json([
                                'status' => 200,
                                'message' => 'Profile created successfully.',
                                'url' => '/food-provider-panel-dashboard',
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Credencials not match',
                                'url' => '/sign-in-web',
                            ]);
                        }

                    }
                }
            }
        }

        return redirect('/sign-in-web')->with('error', 'Invalid Login Details!');
    }

}
