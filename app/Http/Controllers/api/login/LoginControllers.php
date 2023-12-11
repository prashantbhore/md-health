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
class LoginControllers extends BaseController
{
    // customer login
    public function customer_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $validation_message = '';

        if (empty($request->email)) {
            $validation_message .= 'email field';
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
            'email' => $request->email,
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

            $customer_logs=[];
            $customer_logs['customer_id']=!empty($customer->id)? $customer->id:'';
            $customer_logs['status'] = 'active';
            $customer_logs['type'] = 'login';
            CustomerLogs::create($customer_logs);

            return response()->json([
                'status' => 200,
                'message' => 'Login successfull.',
                'mobile_number' => $customer->phone,
                'full_name' => $customer->full_name,
                'success_token' => $success,
            ]);
        } else {
            $customer = Auth::guard('md_customer_registration')->user();
            $customer_logs = [];
            $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
            $customer_logs['status'] = 'inactive';
            $customer_logs['type'] = 'login';
            CustomerLogs::create($customer_logs);
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
            'phone' => 'required',
            'password' => 'required'
        ]);

        $validation_message = '';

        $validation_message = '';

        if ($request->password == '') {
            $validation_message .= 'Password field';
        }
        if ($request->phone == '') {
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
            'mobile_no' => $request->phone,
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
                'mobile_no' => $request->phone,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unauthorised.',
            ]);
        }
    }
}
