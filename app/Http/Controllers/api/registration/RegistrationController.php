<?php

namespace App\Http\Controllers\api\registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use Validator;
use Auth;
use App\Traits\MediaTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function customer_register(request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' =>'Validation Error.', $validator->errors(),
            ]);
        }

        $appkey=!empty($request->api_key)? $request->api_key:"-";

        if(!empty($appkey)){
            $email_exist=CustomerRegistration::where('status','active')
            ->where('email', $request->email)
            ->first();

        if(!empty($email_exist)){
                return response()->json([
                    'status' => 404,
                    'message' => 'email id already exist.',
                ]);   
            }else{
                $phone_exist= CustomerRegistration::where('status', 'active')
                    ->where('phone', $request->phone)
                    ->first();
                    
                if (!empty($phone_exist)) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'mobile number already exist.',
                    ]);
                }
            }
            
                $customer_input = [];
                $customer_input['first_name'] = $request->first_name;
                $customer_input['last_name'] = $request->last_name;
                $customer_input['full_name'] = $request->first_name . ' ' . $request->last_name;
                $customer_input['email'] = $request->email;
                $customer_input['phone'] = $request->phone;
                $customer_input['gender'] = $request->gender;
                $customer_input['country_id'] = $request->country_id;
                $customer_input['city_id'] = $request->city_id;
                $customer_input['address'] = $request->address;
                $customer_input['password'] = Hash::make($request->password);
                // Generate a random 6-digit OTP
                $otp = rand(111111, 999999);
                $customer_input['registration_otp'] = $otp;
                $customer_input['login_otp'] = $request->shop_owner_upi_id;
                $customer_input['fcm_token'] = $request->fcm_token;
                $customer_input['otp_expiring_time'] = time()+20;
                $customer_input['modified_ip_address'] = $request->ip();
                $customer_registration = CustomerRegistration::create($customer_input);
                if (!empty($customer_registration)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Profile created successfully.',
                        'data' => [
                            'id'=>$customer_registration->id,
                            'otp' => $customer_input['registration_otp'] 
                        ],
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Profile not completed.',
                    ]);
                }
            }
             else{
            return response()->json([
                'status' => 404,
                'message' => 'Invalid Key',
            ]);

        }
}


public function otp_verify_for_register(request $request)
{
    if(empty($request->otp)){
            return response()->json([
                'status' => 404,
                'message' => 'Otp field required',
            ]);
    }elseif(empty($request->customer_id)){
            return response()->json([
                'status' => 404,
                'message' => 'Mandatory field required',
            ]);
    }else{
           $customer_exist= CustomerRegistration::where('status','active')
            ->where('id',$request->customer_id)
            ->first();

            if(empty($customer_exist)){
                return response()->json([
                    'status' => 404,
                    'message' => 'user does not exist',
                ]);
            }
    }
        $otp = CustomerRegistration::where('id', $request->customer_id)
            ->where('registration_otp', $request->otp)
            ->where('status','active')
            ->where('otp_expiring_time', '>=', now())
            ->first();

        if ($otp) {
            // OTP is valid
            // Implement your logic here (e.g., mark the OTP as used, authenticate the user, etc.)
            return response()->json([
                'status' => 200,
                'message' => 'OTP verified successfully.',
            ]);
        } else {
            // Invalid OTP or expired
            return response()->json(['message' => 'Invalid OTP or expired'], 404);
        }
}


}
