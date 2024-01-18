<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CommonUserLoginTable;
use App\Models\Country;
use App\Models\MedicalProviderRegistrater;
use App\Models\ProviderImagesVideos;
use App\Models\MedicalProviderLogo;
use App\Models\MedicalProviderLicense;

use App\Services\ApiService;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\MediaTrait;
use Str;
use Storage;


class UpdateProfileController extends Controller
{
    use MediaTrait;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    //update_medical_profile_list
    public function update_medical_profile_list()
    {
        $medical_provider_list = MedicalProviderRegistrater::where('status', 'active')
            ->select(
                'company_name',
                'city_id',
                'email',
                'mobile_no',
                'tax_no',
                'company_address',
                'company_overview',
                'authorisation_full_name',
                'password',
                'company_logo_image_path',
                'company_logo_image_name',
                'company_licence_image_path',
                'company_licence_image_name',
            )
            ->where('id', Auth::guard('md_health_medical_providers_registers')->user()->id)
            ->first();

        if (!empty($medical_provider_list)) {

            $medical_provider_list['company_name'] = ($medical_provider_list->company_name);
            $medical_provider_list['city_id'] = ($medical_provider_list->city_id);
            $medical_provider_list['email'] = ($medical_provider_list->email);
            $medical_provider_list['mobile_no'] = ($medical_provider_list->mobile_no);
            $medical_provider_list['tax_no'] = ($medical_provider_list->tax_no);
            $medical_provider_list['company_address'] = ($medical_provider_list->company_address);
            $medical_provider_list['company_overview'] = ($medical_provider_list->company_overview);
            $medical_provider_list['company_logo_image_path'] = url('/') . Storage::url($medical_provider_list->company_logo_image_path);
            $medical_provider_list['company_licence_image_path'] = url('/') . Storage::url($medical_provider_list->company_licence_image_path);
            $medical_provider_list['authorisation_full_name'] = ($medical_provider_list->authorisation_full_name);
            $medical_provider_list['password'] = ($medical_provider_list->password);
        }

        $ProviderImagesVideos = ProviderImagesVideos::where('status', 'active')
            ->select('id', 'provider_id', 'provider_image_path', 'provider_image_name')
            ->where('provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)
            ->get();
        // dd($ProviderImagesVideos);
        $MedicalProviderLogo = MedicalProviderLogo::where('status', 'active')
            ->select('id', 'company_logo_image_path', 'company_logo_image_name')
            ->where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)
            ->first();

        $MedicalProviderLicense = MedicalProviderLicense::where('status', 'active')
            ->select('id', 'company_licence_image_path', 'company_licence_image_name')
            ->where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)
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
            return view('front/mdhealth/medical-provider/account', compact('medical_provider_list', 'ProviderImagesVideos', 'MedicalProviderLogo', 'MedicalProviderLicense', 'countries', 'cities'));
        }
    }



    public function update_medical_provider_profile(Request $request)
    {
        $email_exist = MedicalProviderRegistrater::where('status', 'active')
            ->where('email', $request->email)
            ->first();

        $email_exist_common = CommonUserLoginTable::where('status', 'active')
        ->where('email', $request->email)
        ->first();

        if ($email_exist || $email_exist_common) {
            return redirect('medical-account')->with('error', 'Email address already exist');
        }

        $mobile_no = MedicalProviderRegistrater::where('status', 'active')
        ->where('mobile_no', $request->phone)
        ->first();
        $mobile_no_common = CommonUserLoginTable::where('status', 'active')
            ->where('mobile_no', $request->phone)
            ->first();

        if ($mobile_no || $mobile_no_common) {
            return redirect('medical-account')->with('error', 'Mobile number already exist');
        }

        
        // dd($request);

        $commonData = [];
        $commonData['email'] = $request->email;
        $commonData['mobile_no'] = $request->mobile_no;
        CommonUserLoginTable::where('user_id', Auth::guard('md_health_medical_providers_registers')->user()->id)->update($commonData);

        $medical_provider_input = [];
        $medical_provider_input['company_name'] = $request->company_name;
        $medical_provider_input['company_address'] = $request->company_address;
        $medical_provider_input['country_id'] = $request->country_id;
        $medical_provider_input['city_id'] = $request->city_id;
        $medical_provider_input['tax_no'] = $request->tax_no;
        $medical_provider_input['authorisation_full_name'] = $request->authorisation_full_name;
        $medical_provider_input['company_overview'] = $request->company_overview;
        $medical_provider_input['email'] = $request->email;
        $medical_provider_input['mobile_no'] = $request->mobile_no;
        $medical_provider_input['modified_ip_address'] = $request->ip();

        $medical_provider_update = MedicalProviderRegistrater::where('id', Auth::guard('md_health_medical_providers_registers')->user()->id)->update($medical_provider_input);
        $medical_provider_update = MedicalProviderRegistrater::where('id', Auth::guard('md_health_medical_providers_registers')->user()->id)->first();
        // return Auth::guard('md_health_medical_providers_registers')->user()->id;
        // dd($medical_provider_update);
        if (!empty($medical_provider_update)) {
            $md_provider_input_image_logo = [];
            $md_provider_input_image_logo['medical_provider_id'] = !empty($medical_provider_update->id) ? $medical_provider_update->id : '';

            if ($request->has('company_logo_image_path')) {

                if ($request->file('company_logo_image_path')) {
                    $md_provider_input_image_logo['company_logo_image_path'] = $this->verifyAndUpload($request, 'company_logo_image_path', 'company/company_logo');
                    $original_name = $request->file('company_logo_image_path')->getClientOriginalName();
                    $md_provider_input_image_logo['company_logo_image_name'] = $original_name;
                }
            }


            // if ($request->hasFile('company_logo_image_path') && $request->file('company_logo_image_path')->isValid()) {
            //     $image = $request->file('company_logo_image_path');
            //     $image_name = 'company_logo_image_path';
            //     $responseData = $this->apiService->getData($token,$apiUrl,$body,$method,$image,$image_name);
            // }else{
            //     $responseData = $this->apiService->getData($token,$apiUrl,$body,$method);
            // }


            MedicalProviderLogo::where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)->update($md_provider_input_image_logo);

            $md_provider_input_image_license = [];
            $md_provider_input_image_license['medical_provider_id'] = !empty($medical_provider_update->id) ? $medical_provider_update->id : '';
            if ($request->has('company_licence_image_path')) {
                if ($request->file('company_licence_image_path')) {
                    // return 'asdsaddas';
                    $md_provider_input_image_license['company_licence_image_path'] = $this->verifyAndUpload($request, 'company_licence_image_path', 'company/licence');
                    $original_name = $request->file('company_licence_image_path')->getClientOriginalName();
                    $md_provider_input_image_license['company_licence_image_name'] = $original_name;
                }
            }
            MedicalProviderLicense::where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)->update($md_provider_input_image_license);
        }

        if ($request->has('provider_image_path')) {
            if ($files = $request->file('provider_image_path')) {
                // $files=[];
                foreach ($files as $file) {
                    $accout_images = new ProviderImagesVideos;
                    $accout_images['provider_id'] = Auth::guard('md_health_medical_providers_registers')->user()->id;
                    $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                    $original_name = $file->getClientOriginalName();
                    $filePath = $file->storeAs('public/providerimagesvideos', $filename);
                    $accout_images['provider_image_path'] = $filePath;
                    $accout_images['provider_image_name'] = $original_name;
                    $accout_images['modified_by'] = Auth::guard('md_health_medical_providers_registers')->user()->id;
                    $accout_images['modified_ip_address'] = $request->ip();
                    $accout_images->save();
                }
            }
        }


        if (!empty($medical_provider_update)) {
            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Profile details updated successfully.',
            // ]);
            return redirect('medical-account')->with('success', 'Profile details updated successfully.');

        }
    }




    public function delete_provider_images_videos(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'provider_id' => 'required',
        // ]);

        // $validation_message = '';

        // if ($request->provider_id == '') {
        //     $validation_message .= 'Provider Id field';
        // }

        // if ($validator->fails()) {
        //     return $this->sendError($validation_message . ' is required.');
        // }

        $delete_id = [];
        $delete_id['status'] = 'delete';
        $delete_id['modified_by'] = Auth::guard('md_health_medical_providers_registers')->user()->id;
        $delete_id['modified_ip_address'] = $request->ip();

        $delete_ProviderImagesVideos = ProviderImagesVideos::where('id', $request->provider_id)
            ->update($delete_id);

        if (!empty($delete_ProviderImagesVideos)) {
            return response()->json([
                'status' => 200,
                'message' => 'data deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'we are unable to delete your data at this time'

            ]);
        }
    }

}
