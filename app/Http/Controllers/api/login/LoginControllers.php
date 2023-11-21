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
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'fcm_token' => 'required'
        ]);

        $validation_message = '';

        if ($request->email == '') {
            $validation_message .= 'email field required';
        }
       

        if ($validator->fails()) {
            return $this->sendError($validation_message . ' is required.');
        }


        if (Auth::guard('md_customer_registration')->attempt([
            'email' => $request->email,
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
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
