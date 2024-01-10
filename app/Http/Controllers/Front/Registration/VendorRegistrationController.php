<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VendorRegistrationController extends Controller
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function vendor_register(request $request)
    {
        
                $token=null;
                $apiUrl = url('/api/md-vendor-registration');

                $method = 'POST';
                $body = $request->all();
                $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;

                if ( $request->hasFile( 'company_logo_image_path' ) && $request->hasFile( 'company_licence_image_path' ) ) {
                    $image = [];
                    $image_name = [];
                    if ( $request->hasFile( 'company_logo_image_path' ) && $request->file( 'company_logo_image_path' )->isValid() ) {
                        $image[] = $request->file( 'company_logo_image_path' );
                        $image_name[] = 'company_logo_image_path';
                    }
                    if ( $request->hasFile( 'company_licence_image_path' ) && $request->file( 'company_licence_image_path' )->isValid() ) {
                        $image[] = $request->file( 'company_licence_image_path' );
                        $image_name[] = 'company_licence_image_path';
                    }
        
                    $responseData = $this->apiService->getData( $token, $apiUrl, $plainArray, $method, $image, $image_name );
                } else {
                    $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
                }
                // dd($responseData);
                Session::put('login_token', $responseData['data']['access_token']);

               
                    $user_data = array(
                        'email' => $request->get('email'),
                        'mobile_no' => $request->get('phone'),
                        'password' => $request->get('password')
                    );
                    $email = $request->email;
                    $password = $request->password;
                    if (Auth::guard('md_health_medical_vendor_registers')->attempt($user_data)) {
                        if (
                            Auth::guard('md_health_medical_vendor_registers')->attempt([
                                'email' => $request->email,
                                'password' => $request->password,
                                'status' => 'active',
                            ])
                        ) {
                    $user_id = Auth::guard('md_health_medical_vendor_registers')->user()->id;
                    $user_email = Auth::guard('md_health_medical_vendor_registers')->user()->email;
                    $user = Auth::guard('md_health_medical_vendor_registers')->user();

                    Session::put('MDMedicalVendor*%', $user_id);
                    Session::put('email', $user_email);
                    Session::put('user', $user);
                   
            }
        }


        if (!empty($responseData['data']['access_token'])) {
           
            return response()->json([
                        'status' => 200,
                        'message' => $responseData['message'],
                        'url' => '/vendor-dashboard',
                    ]);

        } else {
            
            return response()->json([
                        'status' => 404,
                        'message' => $responseData['message'],
                        'url' => '/vendor-login',
                    ]);

        }
    }
}
