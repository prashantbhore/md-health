<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PackageController extends Controller
{
    public function index()
    {
        $request = Request::create('/api/md-treatment-category-list', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $treatment_categories = $responseData['packages_active_list'];
        // dd($treatmant_categories);
        return view('front/mdhealth/medical-provider/medical-packages-view',compact('treatment_categories'));
    }
//     public function package_list()
//     {
//         // dd('hjdvhjv');
//         $request = Request::create('/api/md-packages-active-list', 'GET');
//         $response = Route::dispatch($request);
//         $respo = $response->getContent();
//         $responseData = json_decode($respo, true);
//         // dd($responseData);
//         $packages_active_list = $responseData['packages_active_list'];
//         $request = Request::create('/api/md-packages-deactive-list', 'GET');
//         $response = Route::dispatch($request);
//         $respo = $response->getContent();
//         $responseData = json_decode($respo, true);
//         // dd($responseData);
//         $packages_deactive_list = $responseData['packages_deactive_list'];
//         return view('front/mdhealth/medical-provider/packages',compact('packages_active_list','packages_deactive_list'));
//     }
}
