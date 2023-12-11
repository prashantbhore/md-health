<?php

namespace App\Http\Controllers\api\registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderRegistrater;
use Validator;
use Auth;
use App\Traits\MediaTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\BaseController as BaseController;

use App\Models\CustomerLogs;

class RegistrationController extends BaseController
{
    use MediaTrait;

    public function customer_register(request $request)
    {
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
            'platform_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $appkey = !empty($request->api_key) ? $request->api_key : "-";

        if (!empty($appkey)) {
            $email_exist = CustomerRegistration::where('status', 'active')
                ->where('email', $request->email)
                ->first();

            if (!empty($email_exist)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'email id already exist.',
                ]);
            } else {
                $phone_exist = CustomerRegistration::where('status', 'active')
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
            $customer_input['platform_type'] = $request->platform_type;
            // Generate a random 6-digit OTP
            $otp = rand(111111, 999999);
            $customer_input['registration_otp'] = $otp;
            $customer_input['login_otp'] = $request->shop_owner_upi_id;
            $customer_input['fcm_token'] = $request->fcm_token;
            $customer_input['otp_expiring_time'] = time() + 20;
            $customer_input['modified_ip_address'] = $request->ip();
            $customer_registration = CustomerRegistration::create($customer_input);
          
            $CustomerRegistration = CustomerRegistration::select('id')->get();
            if (!empty($CustomerRegistration)) {
                foreach ($CustomerRegistration as $key => $value) {

                    $length = strlen($value->id);

                    if ($length == 1) {
                        $customer_unique_id = '#MDCUST00000' . $value->id;
                    } elseif ($length == 2) {
                        $customer_unique_id = '#MDCUST0000' . $value->id;
                    } elseif ($length == 3) {
                        $customer_unique_id = '#MDCUST000' . $value->id;
                    } elseif ($length == 4) {
                        $customer_unique_id = '#MDCUST00' . $value->id;
                    } elseif ($length == 5) {
                        $customer_unique_id = '#MDCUST0' . $value->id;
                    } else {
                        $customer_unique_id = '#MDCUST' . $value->id;
                    }

                    $update_unique_id = CustomerRegistration::where('id', $value->id)->update(['customer_unique_no' => $customer_unique_id]);
                }
            }

            if (Auth::guard('md_customer_registration')->attempt([
                'phone' => $request->phone,
                'status' => 'active',
                'password' => $request->password
            ])) {
                $customer = Auth::guard('md_customer_registration')->user();
                // return $customer;
                $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
                CustomerRegistration::where('id', $customer->id)->update([
                    'access_token' => $success['token']
                ]);
            } else {
                // return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                return response()->json([
                    'status' => 404,
                    'message' => 'Unauthorised.',
                ]);
            }
            if (!empty($customer_registration)) {
                $customer_logs = [];
                $customer_logs['customer_id'] = !empty($customer_registration->id) ? $customer_registration->id : '';
                $customer_logs['status'] = 'active';
                $customer_logs['type'] = 'signup';
                CustomerLogs::create($customer_logs);

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile created successfully.',
                    'data' => [
                        'id' => $customer_registration->id,
                        // 'otp' => $customer_input['registration_otp'] ,
                        'access_token' => $success['token']
                    ],
                ]);
            } else {
                $customer_logs = [];
                $customer_logs['customer_id'] = !empty($customer_registration->id) ? $customer_registration->id : '';
                $customer_logs['status'] = 'inactive';
                $customer_logs['type'] = 'signup';
                CustomerLogs::create($customer_logs);
                return response()->json([
                    'status' => 404,
                    'message' => 'Profile not completed.',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Invalid Key',
            ]);
        }
    }


    public function otp_verify_for_register(request $request)
    {
        if (empty($request->otp)) {
            return response()->json([
                'status' => 404,
                'message' => 'Otp field required',
            ]);
        } elseif (empty($request->customer_id)) {
            return response()->json([
                'status' => 404,
                'message' => 'Mandatory field required',
            ]);
        } else {
            $customer_exist = CustomerRegistration::where('status', 'active')
                ->where('id', $request->customer_id)
                ->first();

            if (empty($customer_exist)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'user does not exist',
                ]);
            }
        }
        $otp = CustomerRegistration::where('id', $request->customer_id)
            ->where('registration_otp', $request->otp)
            ->where('status', 'active')
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


    public function md_register_medical_provider(request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'city_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'tax_no' => 'required',
            'company_address' => 'required',
            'password' => 'required',
            'company_logo_image_path' => 'required',
            'company_licence_image_path' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $email_exist = MedicalProviderRegistrater::where('status', 'active')
            ->where('email', $request->email)
            ->first();

        if (!empty($email_exist)) {
            return response()->json([
                'status' => 404,
                'message' => 'email id already exist.',
            ]);
        } else {
            $phone_exist = MedicalProviderRegistrater::where('status', 'active')
                ->where('mobile_no', $request->phone)
                ->first();

            if (!empty($phone_exist)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'mobile number already exist.',
                ]);
            }
        }

        $md_provider_input = [];
        $md_provider_input['company_name'] = $request->company_name;
        $md_provider_input['city_id'] = $request->city_id;
        $md_provider_input['email'] = $request->email;
        $md_provider_input['mobile_no'] = $request->phone;
        $md_provider_input['tax_no'] = $request->tax_no;
        $md_provider_input['company_address'] = $request->company_address;
        $md_provider_input['password'] = Hash::make($request->password);
        if ($request->has('company_logo_image_path')) {
            if ($request->file('company_logo_image_path')) {
                $md_provider_input['company_logo_image_path'] = $this->verifyAndUpload($request, 'company_logo_image_path', 'company/company_logo');
                $original_name = $request->file('company_logo_image_path')->getClientOriginalName();
                $md_provider_input['company_logo_image_name'] = $original_name;
            }
        }
        if ($request->has('company_licence_image_path')) {
            if ($request->file('company_licence_image_path')) {
                $md_provider_input['company_licence_image_path'] = $this->verifyAndUpload($request, 'company_licence_image_path', 'company/licence');
                $original_name = $request->file('company_licence_image_path')->getClientOriginalName();
                $md_provider_input['company_licence_image_name'] = $original_name;
            }
        }
        $md_provider_input['modified_ip_address'] = $request->ip();
        $md_provider_registration = MedicalProviderRegistrater::create($md_provider_input);
        $MedicalProviderRegistrater = MedicalProviderRegistrater::select('id')->get();
        if (!empty($MedicalProviderRegistrater)) {
            foreach ($MedicalProviderRegistrater as $key => $value) {
                $length = strlen($value->id);
                if ($length == 1) {
                    $provider_unique_id = '#MDPRVDR00000' . $value->id;
                } elseif ($length == 2) {
                    $provider_unique_id = '#MDPRVDR0000' . $value->id;
                } elseif ($length == 3) {
                    $provider_unique_id = '#MDPRVDR000' . $value->id;
                } elseif ($length == 4) {
                    $provider_unique_id = '#MDPRVDR00' . $value->id;
                } elseif ($length == 5) {
                    $provider_unique_id = '#MDPRVDR0' . $value->id;
                } else {
                    $provider_unique_id = '#MDPRVDR' . $value->id;
                }

                $update_unique_id = MedicalProviderRegistrater::where('id', $value->id)->update(['provider_unique_no' => $provider_unique_id]);
            }
        }
        if (Auth::guard('md_health_medical_providers_registers')->attempt([
            'mobile_no' => $request->phone,
            'status' => 'active',
            'password' => $request->password
        ])) {
            $customer = Auth::guard('md_health_medical_providers_registers')->user();
            // return $customer;
            $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
            MedicalProviderRegistrater::where('id', $customer->id)->update([
                'access_token' => $success['token']
            ]);
        } else {
            // return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            return response()->json([
                'status' => 404,
                'message' => 'Unauthorised.',
            ]);
        }

        if (!empty($md_provider_registration)) {
            return response()->json([
                'status' => 200,
                'message' => 'Profile created successfully.',
                'data' => [
                    'id' => $md_provider_registration->id,
                    'access_token' => $success['token']
                ],
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Profile not completed.',
            ]);
        }
    }
}
