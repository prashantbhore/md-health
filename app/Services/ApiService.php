<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiService {

    public function getCities() {

        $request = Request :: create( url( '/api/md-city-list' ), 'POST', $body );
        if ( $token ) {
            $request->headers->set( 'Authorization', 'Bearer ' . $token );
        }
        $response = app()->handle( $request );
        return $json_decode( $response->getContent(), true );
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

    public function activePackageDetails( $token, $id ) {

        $body = [ 'package_id' => $id ];

        $request = Request :: create( url( '/api/md-customer-package-details' ), 'POST', $body );

        if ( $token ) {
            $request->headers->set( 'Authorization', 'Bearer ' . $token );
        }

        $response = app()->handle( $request );
        return  json_decode( $response->getContent(), true );
    }

}

