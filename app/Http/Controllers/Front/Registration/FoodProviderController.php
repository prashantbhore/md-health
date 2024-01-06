<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\CommonUserLoginTable;
use App\Models\Country;
use App\Models\MDFoodLicense;
use App\Models\MDFoodLogos;
use App\Models\MDFoodRegisters;
use App\Services\ApiService;
use App\Traits\MediaTrait;
use Illuminate\Contracts\Validation\Validator;
use Auth;
use Hash;
use Session;


class FoodProviderController extends Controller
{
    use MediaTrait;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }



    
    public function food_vendor_register(request $request)
    {

                $token=null;
                $apiUrl = url('api/md-food-registration');

                $method = 'POST';
                $body = $request->all();
                $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;
                
            if ($request->hasFile('company_logo_image_path') && $request->file('company_logo_image_path')->isValid()) {
                $image = $request->file('company_logo_image_path');
                $image_name = 'company_logo_image_path';
                $responseData = $this->apiService->getData($token,$apiUrl,$plainArray,$method,$image,$image_name);
            }else{
                $responseData = $this->apiService->getData($token,$apiUrl,$plainArray,$method);
            }

               
                Session::put('login_token', $responseData['data']['access_token']);

                    $user_data = array(
                        'email' => $request->get('email'),
                        'mobile_no' => $request->get('phone'),
                        'password' => $request->get('password')
                    );

                    $email = $request->email;
                    $password = $request->password;
                    if (Auth::guard('md_health_medical_providers_registers')->attempt($user_data)) {
                        if (
                            Auth::guard('md_health_medical_providers_registers')->attempt([
                                'email' => $request->email,
                                'password' => $request->password,
                                'status' => 'active',
                            ])
                        ) {
                    $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                    $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;
                    $user = Auth::guard('md_health_medical_providers_registers')->user();

                    Session::put('MDMedicalProvider*%', $user_id);
                    Session::put('email', $user_email);
                    Session::put('user', $user);
            }
        }


        if (!empty($responseData['data']['access_token'])){
            return response()->json([
                        'status' => 200,
                        'message' => $responseData['message'],
                        'url' => '/medical-provider-dashboard',
                    ]);

        } else{
            return response()->json([
                        'status' => 404,
                        'message' => $responseData['message'],
                        'url' => '/medical-provider-login',
                    ]);

        }
}



}
