<?php

namespace App\Http\Controllers\api\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderRegistrater;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\CustomerLogs;
use App\Models\MDFoodRegisters;
use App\Models\VendorRegister;
use App\Models\MDCoins;

class LoginControllers extends BaseController
{
    // customer login

    // public function customer_login(Request $request) {
    //     // return 'asdsa';
    //     // return $request;
    //     $validator = Validator::make( $request->all(), [
    //         // 'mobile_no' => 'required',
    //         'platform_type' => 'required',
    //         'password' => 'required'
    //     ] );

    //     $validation_message = '';

    //     if ( $validator->fails() ) {
    //         return $this->sendError( 'Validation Error.', $validator->errors() );
    //     }
    //     // dd($request);
    //     if ($request->platform_type == "web") 
    //     {
    // // dd($request->platform_type);

    //         if ( Auth::guard( 'md_customer_registration' )->attempt( [
    //             'email' => $request->email,
    //             'password' => $request->password,
    //             'status' => 'active',
    //         ] ) ) {
    //             // dd($request);
    //             $customer = Auth::guard( 'md_customer_registration' )->user();
    //             $success[ 'token' ] =  $customer->createToken( 'MyApp' )->plainTextToken;
    //             $otp = rand( 1111, 9999 );

    //             CustomerRegistration::where( 'id', $customer->id )->update( [
    //                 // 'shop_owner_last_login' => Carbon::now(),
    //                 'otp_expiring_time' => time() + 20,
    //                 // 'login_otp' => $otp,
    //                 'fcm_token' => $request->fcm_token,
    //                 'access_token' => $success[ 'token' ]
    //             ] );

    //             $customer_logs = [];
    //             $customer_logs[ 'customer_id' ] = !empty( $customer->id ) ? $customer->id : '';
    //             $customer_logs[ 'status' ] = 'active';
    //             $customer_logs[ 'type' ] = 'login';
    //             CustomerLogs::create( $customer_logs );

    //             // return redirect( '/sms-code' );
    //             return response()->json( [
    //                 'status' => 200,
    //                 'message' => 'Login successfull.',
    //                 'mobile_number' => $customer->phone,
    //                 'full_name' => $customer->full_name,
    //                 'success_token' => $success,
    //             ] );
    //         } else {
    //             $customer = CustomerRegistration::where( 'status', 'active' )
    //             ->select( 'id' )
    //             ->where( 'email', $request->email )
    //             ->first();
    //             if ( $customer ) {
    //                 $customer_logs = [];
    //                 $customer_logs[ 'customer_id' ] = !empty( $customer->id ) ? $customer->id : '';
    //                 $customer_logs[ 'status' ] = 'inactive';
    //                 $customer_logs[ 'type' ] = 'login';
    //                 CustomerLogs::create( $customer_logs );
    //                 // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
    //             }

    //             return response()->json( [
    //                 'status' => 404,
    //                 'message' => 'Unauthorised.',
    //             ] );
    //         }
    //     } else {
    //         if ( Auth::guard( 'md_customer_registration' )->attempt( [
    //             'phone' => $request->phone,
    //             'password' => $request->password,
    //             'status' => 'active',
    //         ] ) ) {

    //             $customer = Auth::guard( 'md_customer_registration' )->user();
    //             $success[ 'token' ] =  $customer->createToken( 'MyApp' )->plainTextToken;
    //             $otp = rand( 111111, 999999 );

    //             CustomerRegistration::where( 'id', $customer->id )->update( [
    //                 // 'shop_owner_last_login' => Carbon::now(),
    //                 'otp_expiring_time' => time() + 20,
    //                 // 'login_otp' => $otp,
    //                 'fcm_token' => $request->fcm_token,
    //                 'access_token' => $success[ 'token' ]
    //             ] );

    //             $customer_logs = [];
    //             $customer_logs[ 'customer_id' ] = !empty( $customer->id ) ? $customer->id : '';
    //             $customer_logs[ 'status' ] = 'active';
    //             $customer_logs[ 'type' ] = 'login';
    //             CustomerLogs::create( $customer_logs );

    //             return response()->json( [
    //                 'status' => 200,
    //                 'message' => 'Login successfull.',
    //                 'mobile_number' => $customer->phone,
    //                 'full_name' => $customer->full_name,
    //                 'success_token' => $success,
    //             ] );
    //         } else {
    //             $customer = CustomerRegistration::where( 'status', 'active' )
    //             ->select( 'id' )
    //             ->where( 'email', $request->email )
    //             ->first();
    //             if ( $customer ) {
    //                 $customer_logs = [];
    //                 $customer_logs[ 'customer_id' ] = !empty( $customer->id ) ? $customer->id : '';
    //                 $customer_logs[ 'status' ] = 'inactive';
    //                 $customer_logs[ 'type' ] = 'login';
    //                 CustomerLogs::create( $customer_logs );
    //             }

    //             return response()->json( [
    //                 'status' => 404,
    //                 'message' => 'Unauthorised.',
    //             ] );
    //         }
    //     }
    // }

    public function customer_login(Request $request)
    {
        // return 'asdsa';
        // return $request;
        $validator = Validator::make($request->all(), [
            // 'email' => 'required',
            'platform_type' => 'required',
            'password' => 'required'
        ]);
        
        if (strlen($request->password) <= 8) {
            return response()->json([
                'status' => 404,
                'message' => 'Password must be at least 8 characters long.',
            ]);
        }

        $validation_message = '';

        if ($validator->fails()) {
            return $this->sendError(
                'Validation Error.',
                $validator->errors()
            );
        }
        // dd($request);
        if ($request->platform_type == "web") {
            // dd($request->platform_type);
            if (!empty($request->phone)) {
                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'phone' => $request->phone,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {

                    $customer = Auth::guard('md_customer_registration')->user();
                    $success['token'] = $customer->createToken('MyApp')->plainTextToken;
                    $otp = rand(111111, 999999);

                    CustomerRegistration::where('id', $customer->id)->update([
                        // 'shop_owner_last_login' => Carbon::now(),
                        'otp_expiring_time' => time() + 20,
                        // 'login_otp' => $otp,
                        'fcm_token' => $request->fcm_token,
                        'access_token' => $success['token']
                    ]);

                    $customer_logs = [];
                    $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    $customer_logs['status'] = 'active';
                    $customer_logs['type'] = 'login';
                    CustomerLogs::create($customer_logs);

                    // $md_coin_available = MDCoins::where('status', 'active')
                    //     ->where('customer_id', $customer->id)
                    //     ->first();

                    // if (empty($md_coin_available)) {
                    //     $coins = [];
                    //     $coins['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    //     $coins['coins'] = 0;
                    //     $coins['invitation_count'] = 0;
                    //     MDCoins::create($coins);
                    // }

                    return response()->json([
                        'status' => 200,
                        'message' => 'Login successfull.',
                        'mobile_number' => $customer->phone,
                        'full_name' => $customer->full_name,
                        'success_token' => $success,
                    ]);
                } else {
                    $customer = CustomerRegistration::where('status', 'active')
                        ->select('id')
                        ->where('email', $request->email)
                        ->first();
                    if ($customer) {
                        $customer_logs = [];
                        $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                        $customer_logs['status'] = 'inactive';
                        $customer_logs['type'] = 'login';
                        CustomerLogs::create($customer_logs);
                    }

                    return response()->json([
                        'status' => 404,
                        'message' => 'Credentials not match.',
                    ]);
                }
            } else {

                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    // dd($request);
                    $customer = Auth::guard('md_customer_registration')->user();
                    $success['token'] = $customer->createToken('MyApp')->plainTextToken;
                    $otp = rand(1111, 9999);

                    CustomerRegistration::where('id', $customer->id)->update([
                        // 'shop_owner_last_login' => Carbon::now(),
                        'otp_expiring_time' => time() + 20,
                        // 'login_otp' => $otp,
                        'fcm_token' => $request->fcm_token,
                        'access_token' => $success['token']
                    ]);

                    $customer_logs = [];
                    $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    $customer_logs['status'] = 'active';
                    $customer_logs['type'] = 'login';
                    CustomerLogs::create($customer_logs);

                    // return redirect( '/sms-code' );
                    return response()->json([
                        'status' => 200,
                        'message' => 'Login successfull.',
                        'mobile_number' => $customer->phone,
                        'full_name' => $customer->full_name,
                        'success_token' => $success,
                    ]);
                } else {
                    $customer = CustomerRegistration::where('status', 'active')
                        ->select('id')
                        ->where('email', $request->email)
                        ->first();
                    if ($customer) {
                        $customer_logs = [];
                        $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                        $customer_logs['status'] = 'inactive';
                        $customer_logs['type'] = 'login';
                        CustomerLogs::create($customer_logs);
                        // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                    }

                    return response()->json([
                        'status' => 404,
                        'message' => 'Credentials not match.',
                    ]);
                }
            }
        } else {

            if (!empty($request->email)) {

                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    // dd($request);
                    $customer = Auth::guard('md_customer_registration')->user();
                    $success['token'] = $customer->createToken('MyApp')->plainTextToken;
                    $otp = rand(1111, 9999);

                    CustomerRegistration::where('id', $customer->id)->update([
                        // 'shop_owner_last_login' => Carbon::now(),
                        'otp_expiring_time' => time() + 20,
                        // 'login_otp' => $otp,
                        'fcm_token' => $request->fcm_token,
                        'access_token' => $success['token']
                    ]);

                    $customer_logs = [];
                    $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    $customer_logs['status'] = 'active';
                    $customer_logs['type'] = 'login';
                    CustomerLogs::create($customer_logs);

                    // return redirect( '/sms-code' );
                    return response()->json([
                        'status' => 200,
                        'message' => 'Login successfull.',
                        'mobile_number' => $customer->phone,
                        'full_name' => $customer->full_name,
                        'success_token' => $success,
                    ]);
                } else {
                    $customer = CustomerRegistration::where('status', 'active')
                        ->select('id')
                        ->where('email', $request->email)
                        ->first();
                    if ($customer) {
                        $customer_logs = [];
                        $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                        $customer_logs['status'] = 'inactive';
                        $customer_logs['type'] = 'login';
                        CustomerLogs::create($customer_logs);
                        // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                    }

                    return response()->json([
                        'status' => 404,
                        'message' => 'Credentials not match.',
                    ]);
                }
            } else {
                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'phone' => $request->phone,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {

                    $customer = Auth::guard('md_customer_registration')->user();
                    $success['token'] = $customer->createToken('MyApp')->plainTextToken;
                    $otp = rand(111111, 999999);

                    CustomerRegistration::where('id', $customer->id)->update([
                        // 'shop_owner_last_login' => Carbon::now(),
                        'otp_expiring_time' => time() + 20,
                        // 'login_otp' => $otp,
                        'fcm_token' => $request->fcm_token,
                        'access_token' => $success['token']
                    ]);

                    $customer_logs = [];
                    $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    $customer_logs['status'] = 'active';
                    $customer_logs['type'] = 'login';
                    CustomerLogs::create($customer_logs);

                    // $md_coin_available = MDCoins::where('status', 'active')
                    //     ->where('customer_id', $customer->id)
                    //     ->first();

                    // if (empty($md_coin_available)) {
                    //     $coins = [];
                    //     $coins['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    //     $coins['coins'] = 0;
                    //     $coins['invitation_count'] = 0;
                    //     MDCoins::create($coins);
                    // }

                    return response()->json([
                        'status' => 200,
                        'message' => 'Login successfull.',
                        'mobile_number' => $customer->phone,
                        'full_name' => $customer->full_name,
                        'success_token' => $success,
                    ]);
                } else {
                    $customer = CustomerRegistration::where('status', 'active')
                        ->select('id')
                        ->where('email', $request->email)
                        ->first();
                    if ($customer) {
                        $customer_logs = [];
                        $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                        $customer_logs['status'] = 'inactive';
                        $customer_logs['type'] = 'login';
                        CustomerLogs::create($customer_logs);
                    }

                    return response()->json([
                        'status' => 404,
                        'message' => 'Credentials not match.',
                    ]);
                }
            }
        }
    }

    public function customer_logout()
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse($success = NULL, 'Customer logout successfully.');
    }

    public function medical_provider_logout()
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse($success = NULL, 'Vendor logout successfully.');
    }

    public function medical_provider_login(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        // $validation_message = '';

        // $validation_message = '';

        // if ( $request->password == '' ) {
        //     $validation_message .= 'Password field';
        // }
        // if ( $request->email == '' ) {
        //     if ( $validation_message == '' ) {
        //         $validation_message .= 'email  field';
        //     } else {
        //         $validation_message .= ' & email  field';
        //     }
        // }

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->platform_type == 'web') {
            if (
                Auth::guard('md_health_medical_providers_registers')->attempt([
                    'mobile_no' => $request->mobile_no,
                    'password' => $request->password,
                    'status' => 'active',
                ])
            ) {
                $customer = Auth::guard('md_health_medical_providers_registers')->user();
                $success['token'] = $customer->createToken('MyApp')->plainTextToken;
                $otp = rand(1111, 9999);

                CustomerRegistration::where('id', $customer->id)->update([
                    // 'shop_owner_last_login' => Carbon::now(),
                    'otp_expiring_time' => time() + 20,
                    // 'login_otp' => $otp,
                    'fcm_token' => $request->fcm_token,
                    'access_token' => $success['token']
                ]);

                $customer_logs = [];
                $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                $customer_logs['status'] = 'active';
                $customer_logs['type'] = 'login';
                CustomerLogs::create($customer_logs);

                // return redirect( '/sms-code' );
                return response()->json([
                    'status' => 200,
                    'message' => 'Login successfull.',
                    'mobile_number' => $customer->mobile_no,
                    'full_name' => $customer->full_name,
                    'success_token' => $success,
                ]);
            } else {
                $customer = CustomerRegistration::where('status', 'active')
                    ->select('id')
                    ->where('mobile_no', $request->mobile_no)
                    ->first();
                if ($customer) {
                    $customer_logs = [];
                    $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
                    $customer_logs['status'] = 'inactive';
                    $customer_logs['type'] = 'login';
                    CustomerLogs::create($customer_logs);
                    // return redirect( '/sign-in-web' )->with( 'error', 'Your credencials does not matched.' );
                }

                return response()->json([
                    'status' => 404,
                    'message' => 'Unauthorised.',
                ]);
            }
        } else {
            if (
                Auth::guard('md_health_medical_providers_registers')->attempt([
                    'mobile_no' => $request->mobile_no,
                    'password' => $request->password,
                    'status' => 'active',
                ])
            ) {
                $provider_id = Auth::guard('md_health_medical_providers_registers')->user();
                $success['token'] = $provider_id->createToken('MyApp')->plainTextToken;

                MedicalProviderRegistrater::where('id', $provider_id->id)->update([
                    // 'shop_owner_last_login' => Carbon::now(),
                    // 'otp_expiring_time' => time() + 20,
                    // 'login_otp' => $otp,
                    'fcm_token' => $request->fcm_token,
                    'access_token' => $success['token']
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Login successfull.',
                    'success_token' => $success,
                    'mobile_no' => $provider_id->mobile_no,
                    'company_name' => $provider_id->company_name,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unauthorised.',
                ]);
            }
        }
    }


    //code by mplus01
    public function food_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (
            Auth::guard('md_health_food_registers')->attempt([
                'mobile_no' => $request->mobile_no,
                'password' => $request->password,
                'status' => 'active',
            ])
        ) {
            $customer = Auth::guard('md_health_food_registers')->user();
            $success['token'] = $customer->createToken('MyApp')->plainTextToken;
            $otp = rand(1111, 9999);

            MDFoodRegisters::where('id', $customer->id)->update([
                // 'shop_owner_last_login' => Carbon::now(),
                'otp_expiring_time' => time() + 20,
                // 'login_otp' => $otp,
                'fcm_token' => $request->fcm_token,
                'access_token' => $success['token']
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Login successfull.',
                // 'mobile_number' => $customer->phone,
                // 'full_name' => $customer->full_name,
                'success_token' => $success,
            ]);
        }
    }


    //code by mplus01
    public function vendor_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (
            Auth::guard('md_health_medical_vendor_registers')->attempt([
                'mobile_no' => $request->mobile_no,
                'password' => $request->password,
                'status' => 'active',
            ])
        ) {
            $customer = Auth::guard('md_health_medical_vendor_registers')->user();
            $success['token'] = $customer->createToken('MyApp')->plainTextToken;
            $otp = rand(1111, 9999);

            VendorRegister::where('id', $customer->id)->update([
                // 'shop_owner_last_login' => Carbon::now(),
                'otp_expiring_time' => time() + 20,
                // 'login_otp' => $otp,
                'fcm_token' => $request->fcm_token,
                'access_token' => $success['token']
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Login successfull.',
                // 'mobile_number' => $customer->phone,
                // 'full_name' => $customer->full_name,
                'success_token' => $success,
            ]);
        }
    }
}
