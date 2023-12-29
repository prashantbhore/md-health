<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;
use Session;
use App\Traits\MediaTrait;


class OtherServicesController extends Controller
{
    use MediaTrait;

    // public function __construct( ApiService $apiService ) {
    //     $this->apiService = $apiService;
    // }
    public function index()
    {
        $token = Session::get('login_token');
        $apiUrl = url('/api/md-hotel-list');
        
        // $data = $this->apiService->function();

        $request = Request::create($apiUrl, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($request);

        if ($response->isOk()) {
            $responseData = json_decode($response->getContent(), true);
            // dd($responseData);
            if (isset($responseData['hotel_details'])) {
                $hotel_details = $responseData['hotel_details'];
                // Now you can use $hotel_details as needed
                // dd($hotel_details);
            } else {
                // Handle the absence of 'hotel_details' in the response
                // dd("Hotel details not found or API response structure has changed.");
            }
        } else {
            // Handle errors if the request fails
            // dd("Request failed: " . $response->getContent());
        }


        $apiUrl2 = url('/api/md-transportation-list');
        $request = Request::create($apiUrl2, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        // dd($responseData);
        $vehicle_details = $responseData['data'];

        $apiUrl3 = url('/api/md-tour-list');
        $request = Request::create($apiUrl3, 'GET');

        $request->headers->set('Authorization', 'Bearer ' . $token);
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
        $token = Session::get('login_token');
        $apiUrl1 = url('/api/md-master-brands');

        $request = Request::create($apiUrl1, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($request);
        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $vehicle_details = $responseData['data'];
        // dd($vehicle_details);

        
        $apiUrl2 = url('/api/md-comfort-levels-master');
        $request = Request::create($apiUrl2 , 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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
        $token = Session::get('login_token');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        // Generating an absolute URL using the url() helper function
        $apiUrl = url('/api/md-hotel-list-edit-view');

        $newRequest = Request::create($apiUrl, 'POST', ['hotel_id' => $decryptedId]);

        $newRequest->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $hotel_details = $responseData['hotel_details'];

        return view('front/mdhealth/medical-provider/add-acommodition', compact('hotel_details'));
    }
    public function edit_vehicle(Request $request)
    {
        $token = Session::get('login_token');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        $apiUrl = url('/api/md-edit-transportation-details-view');

        $newRequest = Request::create($apiUrl, 'POST', ['id' => $decryptedId]);

        $newRequest->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        $transportation_details = $responseData['data'];
        // dd($vehicle_details);
        $request = Request::create('/api/md-master-brands', 'GET');

        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        $vehicle_details = $responseData['data'];
        // dd($vehicle_details);
        $request = Request::create('/api/md-comfort-levels-master', 'GET');

        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = Route::dispatch($request);
        $respo = $response->getContent();

        $responseData = json_decode($respo, true);
        $comfort_level_details = $responseData['data'];
        // dd($comfort_level_details);
        return view('front/mdhealth/medical-provider/add-new-vehical', compact('transportation_details', 'vehicle_details', 'comfort_level_details'));
    }

    public function edit_tour(Request $request)
    {
        $token = Session::get('login_token');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        // Generating an absolute URL using the url() helper function
        $apiUrl = url('/api/md-edit-tour-list-view');

        $newRequest = Request::create($apiUrl, 'POST', ['id' => $decryptedId]);

        $newRequest->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        $responseData = json_decode($respo, true);
        // dd($responseData);
        $tour_details = $responseData['tour_details'];

        return view('front/mdhealth/medical-provider/add-tour', compact('tour_details'));
    }


    public function delete_acommodition(Request $request)
    {
        $token = Session::get('login_token');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);

        $newRequest = Request::create('/api/md-edit-hotel-list', 'POST', ['hotel_id' => $decryptedId]);

        $newRequest->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($newRequest);

        $respo = $response->getContent();
        dd($respo);
        $selectedStars = $request->input('selectedStars');
        return response()->json(['message' => 'Stars count received: ' . $selectedStars]);
    }



    public function md_add_new_acommodition(Request $request)
    {
        $token = Session::get('login_token');
        if (empty($request->hotel_id)) {
            $apiUrl = url('/api/md-add-new-acommodition');
        } else {
            $apiUrl = url('/api/md-edit-hotel-list');
        }
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
    }
    public function md_add_tour(Request $request)
    {
        $token = Session::get('login_token');
        if (empty($request->tour_id)) {
            // dd($request);
            $apiUrl = url('/api/md-add-tour');
        } else {
            $apiUrl = url('/api/md-edit-tour-list');
        }
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
    }
    public function md_add_transportation_details(Request $request)
    {
        $token = Session::get('login_token');
        if (empty($request->transportation_id)) {
            // dd($request);
            $apiUrl = url('/api/md-add-transportation-details');
        } else {
            $apiUrl = url('api/md-edit-transportation-details');
        }
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
    }
    // Crypt::encrypt($hotel_detail['id'])
}
