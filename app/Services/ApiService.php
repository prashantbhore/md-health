<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiService
{


    public function getData( $token, $url, $body, $method ) {

        // if ( $method = 'POST' ) {
        //     $response = Http::withHeaders( [
        //         'Authorization' => 'Bearer ' . $token,
        // ] )->post( $url, $body );
        //     $responseData = $response->json();
        //     dd( $responseData );
        //     return $responseData;
        // } else {
        //     $response = Http::withHeaders( [
        //         'Authorization' => 'Bearer ' . $token,
        // ] )->post( $url, $body );
        //     $responseData = $response->json();
        //     dd( $responseData );
        //     return $responseData;
        // }
        // echo $method;
        // die;
        $request = Request :: create( $url, $method, $body??[] );
        if ( $token ) {
            $request->headers->set( 'Authorization', 'Bearer ' . $token );
           
        }
        $response = app()->handle( $request );
        // dd( $response );
        return json_decode( $response->getContent(), true );
    }

    public function getHotels()
    {
        $request = Request::create(url('/api/md-city-list'), 'GET', $body);
        if ($token) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }
        $response = app()->handle($request);
        return $json_decode($response->getContent(), true);
    }

    public function getMyActivePackages($token)
    {
        $request = Request::create(url('/api/md-customer-purchase-package-active-list'), 'GET');

        if ($token) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        $response = app()->handle($request);
        return json_decode($response->getContent(), true);
    }

    public function getMyCompletedPackages($token)
    {
        $request = Request::create(url('/api/md-customer-purchase-package-completed-list'), 'GET');

        if ($token) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        $response = app()->handle($request);
        return json_decode($response->getContent(), true);
    }

    public function getMyCancelledPackages($token)
    {
        $request = Request::create(url('/api/md-customer-purchase-package-cancelled-list'), 'GET');

        if ($token) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }


        $response = app()->handle($request);
        return json_decode($response->getContent(), true);
    }

//     public function postApi($token, $url, $request)
// {
//     $dataString = json_encode($request);
//     $headers = [
//         'Authorization: Bearer ' . $token,
//         'Content-Type: application/json',
//     ];

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, url($url));
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//     $response = curl_exec($ch);
//     if ($response === false) {
//         echo 'Error: ' . curl_error($ch);
//     } else {
//         // Handle the response here
//         $response = json_decode($response, true);
//         $hotel_details = $response['hotel_details'];

//         // Handle $hotel_details or return it if needed
//         // return $hotel_details;
//     }

//     curl_close($ch);
// }

// public function getApi($token, $url, $request)
// {
//     $dataString = json_encode($request);
//     $headers = [
//         'Authorization: Bearer ' . $token,
//         'Content-Type: application/json',
//     ];

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, url($url));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, false);
//     $response = curl_exec($ch);
//     if ($response === false) {
//         echo 'Error: ' . curl_error($ch);
//     } else {
//         // Handle the response here
//         $response = json_decode($response, true);
//         $hotel_details = $response['hotel_details'];

//         // Handle $hotel_details or return it if needed
//         // return $hotel_details;
//     }

//     curl_close($ch);
// }

}

