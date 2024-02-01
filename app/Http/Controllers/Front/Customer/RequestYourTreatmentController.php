<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Models\MakeRequest;
use Illuminate\Http\Request;

class RequestYourTreatmentController extends Controller {
    public function request_your_treatment( Request $request ) {
        // dd( $request );
        if ( $request->hasFile( 'treatment_image_name' ) ) {
            // Get the file name with extension
            $fileNameWithExt = $request->file( 'treatment_image_name' )->getClientOriginalName();

            // Get just the file name
            $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );

            // Get just the extension
            $extension = $request->file( 'treatment_image_name' )->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // Upload image
            $path = $request->file( 'treatment_image_name' )->storeAs( 'public/treatment_images', $fileNameToStore );

        }
        // Handle case when no file is uploaded
        // dd( $_FILES );
        // dd( $path, $fileNameToStore );
        $send_data = new MakeRequest();
        $send_data->first_name = $request->first_name;
        $send_data->last_name = $request->last_name;
        $send_data->email = !empty( $request->email )?$request->email:'';
        $send_data->country = $request->country;
        $send_data->contact_no = $request->contact_no;
        $send_data->treatment_image_path = !empty( $path ) ? $path : '';
        $send_data->treatment_image_name = !empty( $fileNameToStore ) ? $fileNameToStore : '';
        $send_data->details = $request->details;
        $send_data->previous_treatment = $request->previous_treatment;
        $send_data->why_do_you_need_treatment = $request->why_do_you_need_treatment;
        $send_data->travel_visa = $request->travel_visa;
        $send_data->save();

        return redirect()->back()->with( 'success', 'Your Form Has Been Submitted' );
    }
}
