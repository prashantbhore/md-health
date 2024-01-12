<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\VendorRegister;
use App\Models\Country;
use App\Models\Cities;
use App\Models\VendorProductGallery;
use App\Models\VendorLogo;
use App\Models\VendorLicense;
use Storage;

class UpdateVendorProfileController extends Controller
{
    public function update_vendor_profile_list()
    {
        $medical_provider_list = VendorRegister::where('status', 'active')
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
            $medical_provider_list['company_logo_image_path'] = url('/') . Storage::url($medical_provider_list->company_logo_image_path);
            $medical_provider_list['company_licence_image_path'] = url('/') . Storage::url($medical_provider_list->company_licence_image_path);
            $medical_provider_list['authorisation_full_name'] = ($medical_provider_list->authorisation_full_name);
            $medical_provider_list['password'] = ($medical_provider_list->password);
        }

        $ProviderImagesVideos = VendorProductGallery::where('status', 'active')
            ->select('id', 'vendor_product_id', 'vendor_product_image_path', 'vendor_product_image_name')
            ->where('vendor_product_id', Auth::user()->id)
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
            return response()->json([
                'status' => 200,
                'message' => 'Account details found.',
                'account_details' => $medical_provider_list,
                'images_videos' => $ProviderImagesVideos,
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
}
