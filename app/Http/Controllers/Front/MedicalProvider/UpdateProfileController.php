<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Country;
use App\Models\MedicalProviderRegistrater;
use App\Models\ProviderImagesVideos;
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
       $medical_provider_list= MedicalProviderRegistrater::where('status','active')
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
        ->where('id',Auth::guard('md_health_medical_providers_registers')->user()->id)
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

        $ProviderImagesVideos= ProviderImagesVideos::where('status','active')
        ->select('id','provider_id', 'provider_image_path', 'provider_image_name')
        ->get();

        $countries = Country::where('status', 'active')
        ->select('id', 'country_name')
        ->orderBy('country_name')
        ->get();

        $cities = Cities::where('status', 'active')
            ->orderBy('city_name')
            ->select('id', 'city_name')
            ->get();

        if (!empty($medical_provider_list)) {
            return view('front/mdhealth/medical-provider/account',compact('medical_provider_list','ProviderImagesVideos','countries','cities'));
           
        } 
    }

    

    public function update_medical_provider_profile(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'company_name'=>'required',
        //     'email' => 'required',
        //     'mobile_no' => 'required',
        //     'company_address' => 'required',
        //     'country_id' => 'required',
        //     'city_id' => 'required',
        //     'tax_no' => 'required',
        //     'authorisation_full_name' => 'required',
        //     'company_overview' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

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

        if ($request->has('provider_image_path')) {
            if ($files = $request->file('provider_image_path')) {
                // $files=[];
                foreach ($files as $file) {
                    $accout_images = new ProviderImagesVideos;
                    $accout_images['provider_id']= Auth::guard('md_health_medical_providers_registers')->user()->id;
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

        if(!empty($medical_provider_update)){
            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Profile details updated successfully.',
            // ]);
            return redirect('medical-account')->with('success','Profile details updated successfully.');
           
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
