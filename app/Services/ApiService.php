<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiService {
    public function fetchSomeData() {

        // $requestData = [
        //     'country_id' => '1',
        // ];

        // $response = Http::withHeaders( [
        //     'DOCUMENT_ROOT' => '/opt/lampp/htdocs/MD-Health-AdminPanel/public',
        //     'REMOTE_ADDR' => '127.0.0.1',
        //     'REMOTE_PORT' => '32884',
        //     'SERVER_SOFTWARE' => 'PHP 8.2.14 Development Server',
        //     'SERVER_PROTOCOL' => 'HTTP/1.1',
        //     'SERVER_NAME' => '127.0.0.1',
        //     'SERVER_PORT' => '4000',
        //     'REQUEST_URI' => '/api/md-city-list',
        //     'REQUEST_METHOD' => 'POST',
        //     'SCRIPT_NAME' => '/index.php',
        //     'SCRIPT_FILENAME' => '/opt/lampp/htdocs/MD-Health-AdminPanel/public/index.php',
        //     'PATH_INFO' => '/api/md-city-list',
        //     'PHP_SELF' => '/index.php/api/md-city-list',
        //     'HTTP_USER_AGENT' => 'PostmanRuntime/7.28.4',
        //     'HTTP_ACCEPT' => '*/*',
        //     'HTTP_CACHE_CONTROL' => 'no-cache',
        //     'HTTP_POSTMAN_TOKEN' => '01dd7024-a6f2-41fc-8005-1738d8df7b1e',
        //     'HTTP_HOST' => '127.0.0.1:4000',
        //     'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br',
        //     'HTTP_CONNECTION' => 'keep-alive',
        //     'CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------223555626824200701715731',
        //     'HTTP_CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------223555626824200701715731',
        //     'CONTENT_LENGTH' => '166',
        //     'HTTP_CONTENT_LENGTH' => '166',
        //     'REQUEST_TIME_FLOAT' => 1703568590.1679,
        //     'REQUEST_TIME' => 1703568590,
        // ] )->post( 'http://127.0.0.1:4000/api/md-city-list', $requestData );

        // Process the response as needed
        // dd( $response );
        // $responseData = $response->json();
        // Assuming the response is JSON

        // return $responseData;

        // $requestData = [
        //     'country_type' => '1',
        // ];

        // $request = Request :: create( '/api/md-city-list', 'POST', $requestData );
        // $request->setMethod( 'POST' );
        // // $request->setFormat( 'form', [
        // //     'country_type' => '1',
        // // ] );

        // // $request->merge( [ 'country_id' => '1' ] );

        $request = Request::create( '/api/md-hotel-list', 'GET' );
        // echo'<pre>';
        // print_r( $request );
        $response = Route::dispatch( $request );
        dd( $response );
        $response = $response->getContent();
        $responseData = json_decode( $response, true );
        foreach ( $responseData[ 'hotel_details' ] as $key => $hotel_details ) {
            dd( $hotel_details );
        }

        // // dd( $response );
        return $response;
    }

}

