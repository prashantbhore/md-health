<?php

namespace App\Http\Controllers\api\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\MDFoodRegisters;
use App\Models\Country;
use App\Models\Cities;
use App\Models\FoodImageVideos;
use App\Models\MDFoodLogos;
use App\Models\MDFoodLicense;
use Storage;

class UpdateFoodProfileController extends BaseController
{
    use MediaTrait;
    //code by mplus01
    public function update_food_profile_list(Request $request)
    {
        $medical_provider_list = MDFoodRegisters::where('status', 'active')
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
            // 'company_logo_image_path',
            // 'company_logo_image_name',
            // 'company_licence_image_path',
            // 'company_licence_image_name',
        )
            ->where('id', Auth::user()->id)
            ->first();

        if (!empty($medical_provider_list)) {

            $medical_provider_list['company_name'] = ($medical_provider_list->company_name);
            $medical_provider_list['city_id'] = ($medical_provider_list->city_id);
            $medical_provider_list['email'] = ($medical_provider_list->email);
            $medical_provider_list['mobile_no'] = ($medical_provider_list->mobile_no);
            $medical_provider_list['tax_no'] = ($medical_provider_list->tax_no);
            $medical_provider_list['company_address'] = ($medical_provider_list->company_address);
            $medical_provider_list['company_overview'] = ($medical_provider_list->company_overview);
            // $medical_provider_list['company_logo_image_path'] = url('/') . Storage::url($medical_provider_list->company_logo_image_path);
            // $medical_provider_list['company_licence_image_path'] = url('/') . Storage::url($medical_provider_list->company_licence_image_path);
            $medical_provider_list['authorisation_full_name'] = ($medical_provider_list->authorisation_full_name);
            $medical_provider_list['password'] = ($medical_provider_list->password);
        }

        $ProviderImagesVideos = FoodImageVideos::where('status', 'active')
        ->select('id', 'food_id', 'provider_image_path', 'provider_image_name')
        ->get();

        $MDFoodLogos= MDFoodLogos::where('status','active')
        ->select('id', 'food_id', 'company_logo_image_path', 'company_logo_image_name')
        ->where('food_id',Auth::user()->id)
        ->first();

        $MDFoodLicense= MDFoodLicense::where('status','active')
        ->select('id', 'food_id', 'company_licence_image_path', 'company_licence_image_name')
        ->where('food_id',Auth::user()->id)
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
                'images_videos' => $ProviderImagesVideos,
                'logo_image' => $MDFoodLogos,
                'licence_image' => $MDFoodLicense,
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

    //code by mplus01
    public function update_food_profile(Request $request)
    {
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

        $medical_provider_update = MDFoodRegisters::where('id', Auth::user()->id)->update($medical_provider_input);

        if ($request->has('provider_image_path')) {
            if ($files = $request->file('provider_image_path')) {
                // $files=[];
                foreach ($files as $file) {
                    $accout_images = new FoodImageVideos;
                    // return  $accout_images;
                    $accout_images['food_id'] = Auth::user()->id;
                    $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                    $original_name = $file->getClientOriginalName();
                    $filePath = $file->storeAs('public/vendorimagesvideos', $filename);
                    $accout_images['provider_image_path'] = $filePath;
                    $accout_images['provider_image_name'] = $original_name;
                    $accout_images['modified_by'] = Auth::user()->id;
                    $accout_images['modified_ip_address'] = $request->ip();
                    $accout_images->save();
                }
            }
        }

        if (!empty($medical_provider_update)) {
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

}
