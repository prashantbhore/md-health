<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\MedicalProviderRegistrater;
use App\Models\CustomerRegistration;
use App\Models\Country;
use App\Models\Cities;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;


class UpdateCustomerProfileController extends BaseController
{
    //
    public function update_customer_list()
    {
        $customer_list = CustomerRegistration::where('status', 'active')
            ->select('first_name','last_name','city_id', 'email', 'mobile_no', 'company_address', 'password')
            ->where('id', Auth::user()->id)
            ->first();

        $countries = Country::where('status', 'active')
            ->select('id', 'country_name')
            ->orderBy('country_name')
            ->get();

        $cities = Cities::where('status', 'active')
            ->orderBy('city_name')
            ->select('id', 'city_name')
            ->get();

        if (!empty($customer_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Account details found.',
                'account_details' => $customer_list,
                'countries' => $countries,
                'cities' => $cities,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }


    public function update_customer_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer_input = [];
        $customer_input['first_name'] = $request->first_name;
        $customer_input['last_name'] = $request->last_name;
        $customer_input['email'] = $request->email;
        $customer_input['mobile_no'] = $request->mobile_no;
        $customer_input['address'] = $request->address;
        $customer_input['country_id'] = $request->country_id;
        $customer_input['city_id'] = $request->city_id;
        $customer_input['modified_ip_address'] = $request->ip();

        $customer_update = CustomerRegistration::where('id', Auth::user()->id)->update($customer_input);

        if (!empty($customer_update)) {
            return response()->json([
                'status' => 200,
                'message' => 'Profile details updated successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not updated.',
            ]);
        }
    }


    //check_password_exist
    public function check_password_exist(Request $request)
    {
        if (Auth::guard('md_customer_registration')->attempt([
            'status' => 'active',
            'id' => Auth::user()->id,
            'password' => $request->password
        ])) {
            return response()->json([
                'status' => 200,
                'message' => 'password matched.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. password not matched.',
            ]);
        }
    }

    public function update_customer_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'retype_new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->new_password == $request->retype_new_password) {
            $medical_provider_input = [];
            $medical_provider_input['password'] = Hash::make($request->new_password);
            $medical_provider_input['modified_ip_address'] = $request->ip();

            $medical_provider_update = CustomerRegistration::where('id', Auth::user()->id)->update($medical_provider_input);

            if (!empty($medical_provider_update)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Password updated successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong. Password not updated.',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. new password and re-type password does not matched.',
            ]);
        }
    }


}
