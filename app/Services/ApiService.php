<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ApiService {

    public function getData( $token = null, $url, $body = null, $method, $image = null, $image_input_field_name = null ) {

        $env = explode( ':', url( '/' ) )[ 0 ];

        if ( $env == 'https' ) {

        $apiRequest = Http::withHeaders($headers);

            if ( $token ) {
                $headers[ 'Authorization' ] = 'Bearer ' . $token;
            }

            $apiRequest = Http::withHeaders( $headers );

            if ( $image ) {
                if ( is_array( $image ) ) {
                    foreach ( $image as $index => $image ) {
                        if ( $image->isValid() ) {
                            $extension = $image->getClientOriginalExtension();
                            $apiRequest->attach(
                                $image_input_field_name[ $index ],
                                file_get_contents( $image ),
                                time() . Str::random( 5 ) . '_' . $index . '.' . $extension
                            );
                        }
                    }
                } else {
                    if ( $image->isValid() ) {
                        $extension = $image->getClientOriginalExtension();
                        $apiRequest->attach(
                            $image_input_field_name,
                            file_get_contents( $image ),
                            time() . Str::random( 5 ) . '.' . $extension
                        );
                    }
                }
            }

            $response = $apiRequest-> {
                $method}
                ( $url, $body ?? null );
                // dd( $response->json() );
                try {
                    if ( empty( $response->json() ) ) {

                        throw new \Exception( $response );
                    } else {
                        return $response->json();
                    }
                    //  echo $response;
                } catch ( \Exception $e ) {
                    echo $e->getMessage();
                    die;
                }

                // dd( $response );
            } else {

                $headers = [];

                if ( $token ) {
                    $headers[ 'Authorization' ] = 'Bearer ' . $token;
                }

                $request = Request::create( $url, $method, $body ?? [] );

                $request->headers->add( $headers );

                if ( $image ) {
                    if ( is_array( $image ) ) {

                        foreach ( $image as $fieldName => $imageFiles ) {
                            $files = [];

                            foreach ( $imageFiles as $index => $singleImage ) {

                                if ( $singleImage instanceof \Illuminate\Http\UploadedFile  && $singleImage->isValid() ) {
                                    $extension = $singleImage->getClientOriginalExtension();
                                    $filename = time() . Str::random( 5 ) . '_' . $index . '.' . $extension;

                                    $files[ $index ] = $singleImage;

                                    $request->request->add( [
                                        $fieldName . '_' . $index => $filename,
                                    ] );
                                }
                            }

                            $request->files->set( $fieldName, $files );
                        }

                    } else {
                        $extension = $image->getClientOriginalExtension();
                        $request->files->set( $image_input_field_name, $image );
                        $request->request->add( [
                            $image_input_field_name => file_get_contents( $image ),
                            'filename' => time() . Str::random( 5 ) . '.' . $extension,
                        ] );
                    }
                }

                $response = app()->handle( $request );
                // echo ( $response->getContent() );
                // die;
                // dd( jso n_decode( $response->getContent(), true ) );

                try {
                    if ( empty( $response->getContent() ) ) {

                        throw new \Exception( $response );
                    } else {
                        return json_decode( $response->getContent(), true );
                    }
                    //  echo $response;
                } catch ( \Exception $e ) {
                    echo $e->getMessage();
                    die;
                }
            }
        }
        //     public function getData( $token = null, $url, $body = null, $method, $image = null, $image_input_field_name = null )
        // {
        //     // dd( $body );
        //     $env = explode( ':', url( '/' ) )[ 0 ];

        //     if ( $env === 'https' ) {
        //         $headers = [];

        //         if ( $token ) {
        //             $headers[ 'Authorization' ] = 'Bearer ' . $token;
        //         }

        //         $apiRequest = Http::withHeaders( $headers );

        //         if ( $image ) {
        //             if ( is_array( $image ) ) {
        //                 foreach ( $image as $index => $img ) {
        //                     if ( $img->isValid() ) {
        //                         $extension = $img->getClientOriginalExtension();
        //                         $apiRequest->attach(
        //                             $image_input_field_name[ $index ],
        //                             file_get_contents( $img ),
        //                             time() . Str::random( 5 ) . '_' . $index . '.' . $extension
        // );
        //                     }
        //                 }
        //             } else {
        //                 if ( $image->isValid() ) {
        //                     $extension = $image->getClientOriginalExtension();
        //                     $apiRequest->attach(
        //                         $image_input_field_name,
        //                         file_get_contents( $image ),
        //                         time() . Str::random( 5 ) . '.' . $extension
        // );
        //                 }
        //             }
        //         }

        //         $response = $apiRequest-> {
        // $method}
        // ( $url, $body ?? null );
        //         return $response->json();
        //     } else {
        //         // dd( $image_input_field_name );
        //         $headers = [];

        //         if ( $token ) {
        //             $headers[ 'Authorization' ] = 'Bearer ' . $token;
        //         }

        //         $request = Request::create( $url, $method, $body ?? [] );
        //         $request->headers->add( $headers );

        //         if ( $image ) {
        //             if ( is_array( $image ) ) {
        //                 foreach ( $image as $fieldName => $imageFiles ) {
        //                     $files = [];

        //                     foreach ( $imageFiles as $index => $singleImage ) {
        //                         // Check if $singleImage is an instance of UploadedFile and is valid
        //                         if ( $singleImage instanceof \Illuminate\Http\UploadedFile && $singleImage->isValid() ) {
        //                             $extension = $singleImage->getClientOriginalExtension();
        //                             $filename = time() . Str::random( 5 ) . '_' . $index . '.' . $extension;

        //                             // Save the file to the files array
        //                             $files[ $index ] = $singleImage;

        //                             // Add the filename to the request
        //                             $request->request->add( [
        //                                 $fieldName . '_' . $index => $filename,
        // ] );
        //                         }
        //                     }

        //                     // Set the files to the request
        //                     $request->files->set( $fieldName, $files );
        //                 }
        //             }

        //         else {
        //                 $extension = $image->getClientOriginalExtension();
        //                 $request->files->set( $image_input_field_name, $image );
        //                 $request->request->add( [
        //                     $image_input_field_name => file_get_contents( $image ),
        //                     'filename' => time() . Str::random( 5 ) . '.' . $extension,
        // ] );
        //             }
        //         }

        //         $response = app()->handle( $request );
        //         return json_decode( $response->getContent(), true );
        //     }
        // }

    }

    // dd( $env );

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
    // $headers[ 'Content-Type' ] = 'multipart/form-data';
    // if ( $image_path ) {
    //     $headers[ 'Content-Type' ] = 'multipart/form-data';
    // }
    // dd( $body );
    // $response = Http::withHeaders( $headers )
    //     ->attach( 'hotel_image_path', file_get_contents( $image ), 'image.jpg' )
    //     -> {
    // $method}
    // ( $apiUrl, $body );
    // $response = Http::withHeaders( $headers )-> {
    //     $method}
    //     ( $url, $body ?? null );
    // dd( time().Str::random( 5 ).'.'.$extension );
