<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;

class OtherServicesController extends Controller
{
    public function index()
    {
        $apiUrl1 = url('/api/md-hotel-list');
        $request = Request::create($apiUrl1, 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        // dd($responseData);
        $hotel_details = $responseData['hotel_details'];

        $apiUrl2 = url('/api/md-transportation-list');
        $request = Request::create($apiUrl2, 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        // dd($responseData);
        $vehicle_details = $responseData['data'];

        $apiUrl3 = url('/api/md-tour-list');
        $request = Request::create($apiUrl3, 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        // dd($responseData);
        $tour_details = $responseData['tour_details'];


        return view('front.mdhealth.medical-provider.other-services', compact('hotel_details', 'vehicle_details', 'tour_details'));
    }


    public function add_acommodition()
    {
        return view('front/mdhealth/medical-provider/add-acommodition');
    }
    public function add_new_vehical()
    {
        $request = Request::create('/api/md-master-brands', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $vehicle_details = $responseData['data'];
        // dd($vehicle_details);
        $request = Request::create('/api/md-comfort-levels-master', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $comfort_level_details = $responseData['data'];
        // dd($comfort_level_details);
        return view('front/mdhealth/medical-provider/add-new-vehical', compact('vehicle_details', 'comfort_level_details'));
    }

    public function add_tour()
    {
        return view('front/mdhealth/medical-provider/add-tour');
    }
    public function saveStarRating(Request $request)
    {
        $selectedStars = $request->input('selectedStars');
        return response()->json(['message' => 'Stars count received: ' . $selectedStars]);
    }


    public function edit_acommodition(Request $request)
    {
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        // Generating an absolute URL using the url() helper function
        $apiUrl = url('/api/md-hotel-list-edit-view');

        $newRequest = Request::create($apiUrl, 'POST', ['hotel_id' => $decryptedId]);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $hotel_details = $responseData['hotel_details'];

        return view('front/mdhealth/medical-provider/add-acommodition', compact('hotel_details'));
    }
    public function edit_vehicle(Request $request)
    {
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        $apiUrl = url('/api/md-edit-transportation-details-view');

        $newRequest = Request::create($apiUrl, 'POST', ['id' => $decryptedId]);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $transportation_details = $responseData['data'];
        // dd($vehicle_details);
        $request = Request::create('/api/md-master-brands', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        $vehicle_details = $responseData['data'];
        // dd($vehicle_details);
        $request = Request::create('/api/md-comfort-levels-master', 'GET');
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        $comfort_level_details = $responseData['data'];
        // dd($comfort_level_details);
        return view('front/mdhealth/medical-provider/add-new-vehical', compact('transportation_details', 'vehicle_details', 'comfort_level_details'));
    }

    public function edit_tour(Request $request)
    {
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        // Generating an absolute URL using the url() helper function
        $apiUrl = url('/api/md-edit-tour-list-view');

        $newRequest = Request::create($apiUrl, 'POST', ['id' => $decryptedId]);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        // dd($responseData);
        $tour_details = $responseData['tour_details'];

        return view('front/mdhealth/medical-provider/add-tour', compact('tour_details'));
    }


    public function delete_acommodition(Request $request)
    {
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        $newRequest = Request::create('/api/md-edit-hotel-list', 'POST', ['hotel_id' => $decryptedId]);
        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        dd($respo);
        $selectedStars = $request->input('selectedStars');
        return response()->json(['message' => 'Stars count received: ' . $selectedStars]);
    }
    // Crypt::encrypt($hotel_detail['id'])
}
