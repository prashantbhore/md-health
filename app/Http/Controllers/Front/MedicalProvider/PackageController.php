<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    public function index()
    {
        $token = Session::get('login_token');
        $request = Request::create(url('/api/md-treatment-category-list'), 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $treatment_categories = $responseData['packages_active_list'];
        // dd($treatment_categories);
        return view('front/mdhealth/medical-provider/medical-packages-view',compact('treatment_categories'));
    }
    public function package_list()
    {
        $token = Session::get('login_token');
        // dd('hjdvhjv');
        $request = Request::create(url('/api/md-packages-active-list'), 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        // dd($responseData);
        $packages_active_list = $responseData['packages_active_list'];
        $request = Request::create('/api/md-packages-deactive-list', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        // dd($responseData);
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
        $newRequest = Request::create($apiUrl, 'POST', $request->all());
        $newRequest->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        // dd($respo);
        $responseData = json_decode($respo, true);
        // dd($responseData['status']);
        if (($responseData['status'] == 200)) {
            return redirect('/medical-other-services')->with('success', $responseData['message']);
        } else {
            return redirect('/medical-other-services')->with('error', $responseData['message']);
        }
        // return view('front/mdhealth/medical-provider/packages',compact('packages_active_list','packages_deactive_list'));
    }
}
