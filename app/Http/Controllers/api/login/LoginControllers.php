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

class LoginControllers extends BaseController
{
    // customer login
    public function customer_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required'
        ]);

        $validation_message = '';

        if (empty($request->phone)) {
            $validation_message .= 'phone field';
        }
        if (empty($request->password)) {
            $validation_message .= 'password field';
        }


        if ($validator->fails()) {
            // return $this->sendError($validation_message . ' is required.');
            return response()->json([
                'status' => 404,
                'message' => $validation_message . ' is required.',
            ]);
        }


        if (Auth::guard('md_customer_registration')->attempt([
            'phone' => $request->phone,
            'password' => $request->password,
            'status' => 'active',
        ])) {
            $customer = Auth::guard('md_customer_registration')->user();
            $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
            $otp = rand(111111, 999999);

            CustomerRegistration::where('id', $customer->id)->update([
                // 'shop_owner_last_login' => Carbon::now(),
                'otp_expiring_time' => time() + 20,
                // 'login_otp' => $otp,
                'fcm_token' => $request->fcm_token,
                'access_token' => $success['token']
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Login successfull.',
                'mobile_number' => $request->phone,
                'success_token' => $success,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unauthorised.',
            ]);
        }
    }


    public function customer_logout()
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse($success = NULL, 'User logout successfully.');
    }


    public function medical_provider_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        $validation_message = '';

        $validation_message = '';

        if ($request->password == '') {
            $validation_message .= 'Password field';
        }
        if ($request->mobile_no == '') {
            if ($validation_message == '') {
                $validation_message .= 'Mobile Number field';
            } else {
                $validation_message .= ' & Mobile Number field';
            }
        }


        if ($validator->fails()) {
            return $this->sendError($validation_message . ' is required.');
        }

        if (Auth::guard('md_health_medical_providers_registers')->attempt([
            'mobile_no' => $request->mobile_no,
            'password' => $request->password,
            'status' => 'active',
        ])) {
            $provider_id = Auth::guard('md_health_medical_providers_registers')->user();
            $success['token'] =  $provider_id->createToken('MyApp')->plainTextToken;

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
                'mobile_no' => $request->mobile_no,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unauthorised.',
            ]);
        }
    }
}
