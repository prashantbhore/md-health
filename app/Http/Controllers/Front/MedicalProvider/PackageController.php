<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
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
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        $treatment_categories = $responseData['packages_active_list'];
        // dd($treatment_categories);
        return view('front/mdhealth/medical-provider/medical-packages-view',compact('treatment_categories'));
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
    public function md_add_packages(Request $request)
    {
        // dd('hjdvhjv');
        $token = Session::get('login_token');
        // if (empty($request->hotel_id)) {
            $apiUrl = url('/api/md-add-packages');
        // } else {
            // $apiUrl = url('/api/md-edit-hotel-list');
        // }
        $method = 'POST';
        $body=$request->all();

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        if (($responseData['status'] == 200)) {
            return redirect('/medical-other-services')->with('success', $responseData['message']);
        } else {
            return redirect('/medical-other-services')->with('error', $responseData['message']);
        }
        // return view('front/mdhealth/medical-provider/packages',compact('packages_active_list','packages_deactive_list'));
    }
}
