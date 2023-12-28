<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiService {
    public function fetchSomeData($token) {

        $request = Request :: create( url( '/api/md-customer-purchase-package-completed-list' ), 'GET' );

        if ( $token ) {
            $request->headers->set( 'Authorization', 'Bearer ' . $token );
        }

        $response = app()->handle( $request );
        return  json_decode( $response->getContent(), true );
    }

}

