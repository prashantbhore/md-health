<?php

namespace App\Http\Controllers\Front\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Country;
use App\Models\VendorRegister;
// use App\Models\VendorProductImagesVideos;
use App\Models\VendorLogo;
use App\Models\VendorLicense;
use App\Models\VendorProductImagesVideos;
use App\Services\ApiService;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\MediaTrait;
use Str;
use Storage;

class UpdateVendorProfileController extends Controller
{
    //
    use MediaTrait;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    //update_medical_profile_list
    public function update_vendor_profile_list()
    {
       $medical_provider_list= VendorRegister::where('status','active')
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
        ->where('id',Auth::guard('md_health_medical_vendor_registers')->user()->id)
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

        $ProviderImagesVideos= VendorProductImagesVideos::where('status','active')
        ->select('id','vendor_product_id', 'vendor_product_image_path', 'vendor_product_image_name')
        ->where('vendor_product_id',Auth::guard('md_health_medical_vendor_registers')->user()->id)
        ->get();
        // return $ProviderImagesVideos;

        $MedicalProviderLogo=VendorLogo::where('status','active')
        ->select('id','company_logo_image_path','company_logo_image_name')
        ->where('vendor_id',Auth::guard('md_health_medical_vendor_registers')->user()->id)
        ->first();

        $MedicalProviderLicense=VendorLicense::where('status','active')
        ->select('id','company_licence_image_path','company_licence_image_name')
        ->where('vendor_id',Auth::guard('md_health_medical_vendor_registers')->user()->id)
        ->first();

        $countries = Country::where('status', 'active')
        ->select('id', 'country_name')
        ->orderBy('country_name')
        ->get();

        $cities = Cities::where('status', 'active')
            ->orderBy('city_name')
            ->select('id', 'city_name')
            ->get();
            // ,'ProviderImagesVideos'
        if (!empty($medical_provider_list)) {
            return view('front/mdhealth/vendor/account',compact('medical_provider_list','MedicalProviderLogo','MedicalProviderLicense','countries','cities','ProviderImagesVideos'));  
        } 
    }

    

    public function update_vendor_profile(Request $request)
    {
    //   return Auth::guard('md_health_medical_vendor_registers')->user()->id;
    // dd($request);
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

        $medical_provider_update = VendorRegister::where('id', Auth::guard('md_health_medical_vendor_registers')->user()->id)->update($medical_provider_input);
        $medical_provider_update = VendorRegister::where('id', Auth::guard('md_health_medical_vendor_registers')->user()->id)->first();
        // return Auth::guard('md_health_medical_vendor_registers')->user()->id;
        // dd($medical_provider_update);
        if(!empty($medical_provider_update))
        {
            $md_provider_input_image_logo=[];
            $md_provider_input_image_logo['vendor_id']=!empty($medical_provider_update->id)?$medical_provider_update->id:'';
    
            if ( $request->has( 'company_logo_image_path' ) ) {
                
                if ( $request->file( 'company_logo_image_path' ) ) {
                    $md_provider_input_image_logo[ 'company_logo_image_path' ] = $this->verifyAndUpload( $request, 'company_logo_image_path', 'company/company_logo' );
                    $original_name = $request->file( 'company_logo_image_path' )->getClientOriginalName();
                    $md_provider_input_image_logo[ 'company_logo_image_name' ] = $original_name;
                }
            }


            // if ($request->hasFile('company_logo_image_path') && $request->file('company_logo_image_path')->isValid()) {
            //     $image = $request->file('company_logo_image_path');
            //     $image_name = 'company_logo_image_path';
            //     $responseData = $this->apiService->getData($token,$apiUrl,$body,$method,$image,$image_name);
            // }else{
            //     $responseData = $this->apiService->getData($token,$apiUrl,$body,$method);
            // }


            VendorLogo::where('vendor_id', Auth::guard('md_health_medical_vendor_registers')->user()->id)->update($md_provider_input_image_logo);
    
            $md_provider_input_image_license=[];
            $md_provider_input_image_license['vendor_id']=!empty($medical_provider_update->id)?$medical_provider_update->id:'';
            if ( $request->has( 'company_licence_image_path' ) ) {
                if ( $request->file( 'company_licence_image_path' ) ) {
                    // return 'asdsaddas';
                    $md_provider_input_image_license[ 'company_licence_image_path' ] = $this->verifyAndUpload( $request, 'company_licence_image_path', 'company/licence' );
                    $original_name = $request->file( 'company_licence_image_path' )->getClientOriginalName();
                    $md_provider_input_image_license[ 'company_licence_image_name' ] = $original_name;
                }
            }
            VendorLicense::where('vendor_id', Auth::guard('md_health_medical_vendor_registers')->user()->id)->update($md_provider_input_image_license);
        }
       
        if ($request->has('provider_image_path')) {
            if ($files = $request->file('provider_image_path')) {
                // $files=[];
                foreach ($files as $file) {
                    $accout_images = new VendorProductImagesVideos;
                    $accout_images['vendor_product_id']= Auth::guard('md_health_medical_vendor_registers')->user()->id;
                    $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                    $original_name = $file->getClientOriginalName();
                    $filePath = $file->storeAs('public/providerimagesvideos', $filename);
                    $accout_images['vendor_product_image_path'] = $filePath;
                    $accout_images['vendor_product_image_name'] = $original_name;
                    $accout_images['modified_by'] = Auth::guard('md_health_medical_vendor_registers')->user()->id;
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
            return redirect('vendor-account')->with('success','Profile details updated successfully.');
           
        }
    }

   


    public function delete_vendor_images_videos(Request $request)
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
        $delete_id['modified_by'] = Auth::guard('md_health_medical_vendor_registers')->user()->id;
        $delete_id['modified_ip_address'] = $request->ip();

        $delete_ProviderImagesVideos = VendorProductImagesVideos::where('id', $request->provider_id)
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
