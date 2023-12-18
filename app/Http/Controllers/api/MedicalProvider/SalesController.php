<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\Packages;
use App\Models\CustomerPurchaseDetails;
use App\Models\ToursDetails;
use App\Models\TransportationDetails;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class SalesController extends Controller
{


    public function active_treatment_list()
    {
        $active_treatment_list = CustomerPurchaseDetails::whereIn('purchase_type', ['pending', 'inprogress'])
        ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
        ->get();


        if (!empty($active_treatment_list)){
            return response()->json([
                'status' => 200,
                'message' => 'active treatment list found.',
                'packages_active_list' =>$active_treatment_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. active treatment list not found.',
            ]);
        }
    }


    public function completed_treatment_list()
    {

        $completed_treatment_list = CustomerPurchaseDetails::where('purchase_type','completed')
        ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
        ->get();


        if (!empty($completed_treatment_list)){
            return response()->json([
                'status' => 200,
                'message' => 'completed treatment list found.',
                'packages_active_list' => $completed_treatment_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. completed treatment list not found.',
            ]);
        }
    }



    
    public function cancelled_treatment_list()
    {

        $cancelled_treatment_list = CustomerPurchaseDetails::where('purchase_type','cancelled')
        ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
        ->get();


        if (!empty($cancelled_treatment_list )){
            return response()->json([
                'status' => 200,
                'message' => 'cancelled treatment list found.',
                'packages_active_list' =>   $cancelled_treatment_list ,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.cancelled treatment list not found.',
            ]);
        }
    }


    public function patient_details(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'purchage_id' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

         $patient_details= CustomerPurchaseDetails::where('id',$request->purchage_id)->with('customer','package','paymentDetails')->first();


        if (!empty($patient_details)){
            return response()->json([
                'status' => 200,
                'message' => 'patient details found.',
                'patient_details' =>  $patient_details,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.patient details not fond.',
            ]);
        }
    }


    public function treatement_date_status(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'treatment_purchage_id' => 'required|string',
            'treatment_start_date' => 'required|string',
            'treatment_status' => 'required|string',
        ]);

    
        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

         $patient_details= CustomerPurchaseDetails::where('id',$request->treatment_purchage_id)->update(['purchase_type'=>$request->treatment_status,'treatment_start_date'=>$request->treatment_start_date]);


        if (!empty($patient_details)){
            return response()->json([
                'status' => 200,
                'message' => 'date and status store successfully.',
                'patient_details' =>  $patient_details,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.failed to store date and status.',
            ]);
        }
    }



    
}
