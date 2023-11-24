<?php

namespace App\Http\Controllers\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\MedicalProviderRegistrater;
use App\Models\Country;
use App\Models\Cities;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class UpdateMedicalProfileController extends BaseController
{
    //update_medical_profile_list
    public function update_medical_profile_list()
    {
       $medical_provider_list= MedicalProviderRegistrater::where('status','active')
       ->select('company_name', 'city_id', 'email', 'mobile_no','tax_no', 'company_address','password')
        ->where('id',Auth::user()->id)
        ->first();

        $countries = Country::where('status', 'active')
        ->select('id', 'country_name')
        ->orderBy('country_name')
        ->get();

        $cities = Cities::where('status', 'active')
            ->orderBy('city_name')
            ->select('id', 'city_name')
            ->get();

        if (!empty($medical_provider_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Account details found.',
                'account_details' => $medical_provider_list,
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

    

    public function update_medical_provider_profile(Request $request){

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

        $medical_provider_input = [];
        $medical_provider_input['first_name'] = $request->first_name;
        $medical_provider_input['last_name'] = $request->last_name;
        $medical_provider_input['email'] = $request->email;
        $medical_provider_input['mobile_no'] = $request->mobile_no;
        $medical_provider_input['company_address'] = $request->address;
        $medical_provider_input['country_id'] = $request->country_id;
        $medical_provider_input['city_id'] = $request->city_id;
        $medical_provider_input['modified_ip_address'] = $request->ip();

        $medical_provider_update = MedicalProviderRegistrater::where('id', Auth::user()->id)->update($medical_provider_input);

        if(!empty($medical_provider_update)){
            return response()->json([
                'status' => 200,
                'message' => 'Profile details updated successfully.',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not updated.',
            ]);
        }
    }

    //check_password_exist
    public function check_password_exist(Request $request)
    {
        if (Auth::guard('md_health_medical_providers_registers')->attempt([
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

    public function update_medical_provider_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'retype_new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->new_password==$request->retype_new_password){
        $medical_provider_input = [];
        $medical_provider_input['password'] = Hash::make($request->new_password);
        $medical_provider_input['modified_ip_address'] = $request->ip();

        $medical_provider_update = MedicalProviderRegistrater::where('id', Auth::user()->id)->update($medical_provider_input);

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
    }else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. new password and re-type password does not matched.',
            ]);
    }

    }


}
