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
    $request = Request::create( '/api/md-hotel-list', 'GET');
    $response = Route::dispatch( $request );
    $respo = $response->getContent();
    
    $responseData = json_decode( $respo, true );
    // dd($responseData[ 'message' ]);
    $hotel_details=$responseData[ 'hotel_details' ];
   
    
    return view('front.mdhealth.medical-provider.other-services',compact('hotel_details'));
}

    public function add_acommodition(){
        return view('front/mdhealth/medical-provider/add-acommodition');
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
        
        $newRequest = Request::create('/api/md-edit-hotel-list', 'POST', ['hotel_id' => $decryptedId]);
        $response = app()->handle($newRequest); 
        
        $respo = $response->getContent();
        dd($respo);
        $selectedStars = $request->input('selectedStars');
        return response()->json(['message' => 'Stars count received: ' . $selectedStars]);
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
