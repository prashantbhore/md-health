<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function index()
    {
        $token = Session::get('login_token');
       
       
        $apiUrl = url('/api/md-treatment-category-list');
        $apiUrl2 = url('/api/md-hotel-list');
        $apiUrl3 = url('/api/md-transportation-list');
        $apiUrl4 = url('/api/md-tour-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        $treatment_categories = $responseData['packages_active_list'];

        $responseData = $this->apiService->getData($token, $apiUrl2, $body, $method);
        $hotel_details = $responseData['hotel_details'];

        $responseData = $this->apiService->getData($token, $apiUrl3, $body, $method);
        $vehicle_details = $responseData['data'];

        $responseData = $this->apiService->getData($token, $apiUrl4, $body, $method);
        $tour_details = $responseData['tour_details'];
        // dd($responseData);
        return view('front/mdhealth/medical-provider/medical-packages-view',compact('treatment_categories','hotel_details','vehicle_details','tour_details'));
    }
    public function package_list()
    {
        $token = Session::get('login_token');
        
        $apiUrl = url('/api/md-packages-active-list');
        $apiUrl2 = url('/api/md-packages-deactive-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        $packages_active_list = $responseData['packages_active_list'];

        $responseData = $this->apiService->getData($token, $apiUrl2, $body, $method);
        $packages_deactive_list = $responseData['packages_deactive_list'];
        return view('front/mdhealth/medical-provider/packages',compact('packages_active_list','packages_deactive_list'));
    }

    public function edit_package(Request $request)
    {
        $token = Session::get('login_token');
        
        $apiUrl = url('/api/md-packages-view-list');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);
        $body=['id' => $decryptedId];
        $method = 'POST';
        
        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        // dd($responseData);
        $packages_active_list = $responseData['packages_active_list'];



        $apiUrl2 = url('/api/md-treatment-category-list');
        $apiUrl3 = url('/api/md-hotel-list');
        $apiUrl4 = url('/api/md-transportation-list');
        $apiUrl5 = url('/api/md-tour-list');
        $method2 = 'GET';
        $body2=null;

        $responseData = $this->apiService->getData($token, $apiUrl2, $body2, $method2);
        $treatment_categories = $responseData['packages_active_list'];

        $responseData = $this->apiService->getData($token, $apiUrl3, $body2, $method2);
        $hotel_details = $responseData['hotel_details'];

        $responseData = $this->apiService->getData($token, $apiUrl4, $body2, $method2);
        $vehicle_details = $responseData['data'];

        $responseData = $this->apiService->getData($token, $apiUrl5, $body2, $method2);
        $tour_details = $responseData['tour_details'];
        return view('front/mdhealth/medical-provider/medical-packages-view',compact('packages_active_list','treatment_categories','hotel_details','vehicle_details','tour_details'));
    }
    public function md_add_packages(Request $request)
    {
        // dd('hjdvhjv');
        $token = Session::get('login_token');
        // dd($token);
        if (empty($request->id)) {
            $apiUrl = url('/api/md-add-packages');
        } else {
            $apiUrl = url('/api/md-edit-packages');
        }
        $method = 'POST';
        $body=$request->all();

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        if (($responseData['status'] == 200)) {
            return redirect('/medical-packages')->with('success', $responseData['message']);
        } else {
            return redirect('/medical-packages')->with('error', $responseData['message']);
        }
        // return view('front/mdhealth/medical-provider/packages',compact('packages_active_list','packages_deactive_list'));
    }
}
