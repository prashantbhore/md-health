<?php

namespace App\Http\Controllers\api\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use App\Models\CustomerRegistration;

class LoginControllers extends Controller
{
    // customer login
    public function customer_login(Request $request)
    {
        // return 'asdsad';
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
                'message' => $validation_message. ' is required.',
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
                'otp_expiring_time'=> time() + 20,
                'login_otp' => $otp,
                'fcm_token' => $request->fcm_token,
                'access_token' => $success['token']
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Login successfull.',
                'otp'=> $otp,
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
}
