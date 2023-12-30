<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ApiService {

    public function getData( $token = null, $url, $body = null, $method ) {
        $env = explode( ':', url( '/' ) )[ 0 ];
        // if ( $method == 'POST' ) {

        //     $response = Http::withHeaders( [
        //       'Authorization' => 'Bearer ' . $token
        // ] )->post( $url, $body ?? null );

        //     // dd( $response );
        //     return $responseData;
        // } else {

        //     $response = Http::withHeaders( [
        //         'Authorization' => 'Bearer ' . $token,
        // ] )->get( $url );
        //     $responseData = $response->json();
        //     // dd( $response );
        //     return $responseData;
        // }

        if ( $env == 'https' ) {
            $headers = [];

            if ( $token ) {
                $headers[ 'Authorization' ] = 'Bearer ' . $token;
            }

            $response = Http::withHeaders( $headers )-> {
                $method}
                ( $url, $body ?? null );

                return $response->json();
            } else {
                $request = Request :: create( $url, $method, $body??[] );
                if ( $token ) {
                    $request->headers->set( 'Authorization', 'Bearer ' . $token );

                }
                $response = app()->handle( $request );
                // dd( $response );
                return json_decode( $response->getContent(), true );
            }
        }

        public function getHotels() {
            $request = Request :: create( url( '/api/md-city-list' ), 'GET', $body );
            if ( $token ) {
                $request->headers->set( 'Authorization', 'Bearer ' . $token );
            }
            $response = app()->handle( $request );
            return $json_decode( $response->getContent(), true );
        }

        public function getMyActivePackages( $token ) {
            $request = Request :: create( url( '/api/md-customer-purchase-package-active-list' ), 'GET' );

            if ( $token ) {
                $request->headers->set( 'Authorization', 'Bearer ' . $token );
            }

            $response = app()->handle( $request );
            return  json_decode( $response->getContent(), true );
        }

        public function getMyCompletedPackages( $token ) {
            $request = Request :: create( url( '/api/md-customer-purchase-package-completed-list' ), 'GET' );

            if ( $token ) {
                $request->headers->set( 'Authorization', 'Bearer ' . $token );
            }

            $response = app()->handle( $request );
            return  json_decode( $response->getContent(), true );
        }

        public function getMyCancelledPackages( $token ) {
            $request = Request :: create( url( '/api/md-customer-purchase-package-cancelled-list' ), 'GET' );

            if ( $token ) {
                $request->headers->set( 'Authorization', 'Bearer ' . $token );
            }

            $response = app()->handle( $request );
            return  json_decode( $response->getContent(), true );
        }

        public function cancelPackage( $token, $id ) {

            $body = [ 'id' => $id ];

            $request = Request :: create( url( '/api/md-customer-change-package-list-active-cancelled' ), 'POST', $body );

            if ( $token ) {
                $request->headers->set( 'Authorization', 'Bearer ' . $token );
            }

            $response = app()->handle( $request );
            return  json_decode( $response->getContent(), true );

}
}
