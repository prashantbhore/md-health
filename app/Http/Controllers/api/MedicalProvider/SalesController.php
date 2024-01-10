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
use App\Models\MedicalProviderSystemUser;
use App\Models\AddNewAcommodition;
use APP\Models\VehicleBrand;
use App\Models\CustomerPaymentDetails;


class SalesController extends BaseController{

    public function active_treatment_list()
    {
    
        $active_treatment_list = CustomerPurchaseDetails::whereIn('purchase_type', ['pending','in_progress'])->where('provider_id',Auth::user()->id)
            ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
            ->get();


        if (!empty($active_treatment_list)){
            return response()->json([
                'status' => 200,
                'message' => 'active treatment list found.',
                'packages_active_list' => $active_treatment_list,
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. active treatment list not found.',
            ]);
        }
    }


    public function completed_treatment_list()
    {

        $completed_treatment_list = CustomerPurchaseDetails::where('purchase_type','completed')->where('provider_id',Auth::user()->id)
            ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
            ->get();


        if (!empty($completed_treatment_list)) {
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

        $cancelled_treatment_list = CustomerPurchaseDetails::where('purchase_type', 'cancelled')->where('provider_id',Auth::user()->id)
            ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
            ->get();


        if (!empty($cancelled_treatment_list)){
            return response()->json([
                'status' => 200,
                'message' => 'cancelled treatment list found.',
                'packages_active_list' =>   $cancelled_treatment_list,
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

        $validator = Validator::make($request->all(),[
            'purchage_id' => 'required',
        ]);


        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $patient_details = CustomerPurchaseDetails::where('id', $request->purchage_id)->with('customer','customer.city','customer.country','package','paymentDetails','case_manager','hotel','vehical')->first();

        $latest_payment= CustomerPaymentDetails::where('order_id', $patient_details->id)
        ->where('payment_status', 'completed')
        ->orderBy('created_at', 'desc')
        ->first();

        if (!empty($patient_details)){
            return response()->json([
                'status' => 200,
                'message' => 'patient details found.',
                'patient_details' =>  $patient_details,
                'payment_details'=>    $latest_payment,
            ]);
        } else{
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

        $patient_details = CustomerPurchaseDetails::where('id', $request->treatment_purchage_id)->update(['purchase_type' => $request->treatment_status, 'treatment_start_date' => $request->treatment_start_date]);


        if (!empty($patient_details)){
            return response()->json([
                'status' => 200,
                'message' => 'date and status store successfully.',
                'patient_details' =>  $patient_details,
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.failed to store date and status.',
            ]);
        }
    }


    public function case_manager_list()
    {
       $provider_id = Auth::user()->id;

        // $provider_id = 1;

        $caseManagers = MedicalProviderSystemUser::where('status', 'active')->where('medical_provider_id', $provider_id)->select('id', 'name')->get();

        if (!empty($caseManagers)) {
            return response()->json([
                'status' => 200,
                'message' => 'case manager list found.',
                'case_managers' =>  $caseManagers,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.case manager list not found.',
            ]);
        }
    }


   public function package_details(Request $request){


     $validator = Validator::make($request->all(), [
           'purchage_id' => 'required',
       ]);
   
       if ($validator->fails()) {
           return $this->sendError('Validation Error.', $validator->errors());
       }

    $package_details = CustomerPurchaseDetails::where('id', $request->purchage_id)->with('customer', 'package', 'paymentDetails')->first();

    $case_manager=MedicalProviderSystemUser::where('id', $package_details->case_manager_id)->select('id','name')->first();

     
    $hotel=AddNewAcommodition::where('id', $package_details->hotel_id)->first();

      
    $vehicle=TransportationDetails::where('id', $package_details->vehicle_id)->first();

    // $vehicle_brand=VehicleBrand::where('id',$vehicle->vehicle_brand_id)->first();
     
   
    if (!empty($package_details)){

        $selected_data = [
            'purchage_id' => !empty($package_details->id) ? $package_details->id : '',
            'treatment_no' => !empty($package_details->order_id) ? $package_details->order_id : '',
            'treatment_name' => !empty($package_details->package->package_name) ? $package_details->package->package_name : '',
            'treatment_period' => !empty($package_details->package->treatment_period_in_days) ? $package_details->package->treatment_period_in_days : '',
            'case_manger_id' => !empty($case_manager->id) ? $case_manager->id : '',
            'case_manger_name' => !empty($case_manager->name) ? $case_manager->name : '',
            'hotel_id' => !empty($hotel->id) ? $hotel->id : '',
            'hotel_name' => !empty($hotel->hotel_name) ? $hotel->hotel_name : '',
            'hotel_address' => !empty($hotel->hotel_address) ? $hotel->hotel_address : '',
            'vehicle_id' => !empty($vehicle->id) ? $vehicle->id : '',
            'vehicle_name' => !empty($vehicle->vehicle_model_id) ? $vehicle->vehicle_model_id : '',
            'vehicle_other_services' => !empty($vehicle->other_services) ? $vehicle->other_services : '',
            'status' => !empty($package_details->purchase_type) ? $package_details->purchase_type : '',
        ];
        



        return response()->json([
            'status' => 200,
            'message' => 'package details found.',
            'package_details' =>   $selected_data,   

        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Something went wrong.package details not found.',
        ]);
    }

   } 


   public function store_package_details_changes(Request $request)
   {

       $validator = Validator::make($request->all(), [
           'purchage_id' => 'required|string',
       ]);
   
       if ($validator->fails()) {
           return $this->sendError('Validation Error.', $validator->errors());
       }
   
       $conditionExecuted = false;
   
       if ($request->case_manager_id) {
           $caseNo = 'MD' . $request->purchage_id;
           CustomerPurchaseDetails::where('id', $request->purchage_id)
               ->update(['case_manager_id' => $request->case_manager_id,'case_no'=> $caseNo]);
           $conditionExecuted = true;
       }
   
       if ($request->hotel_id) {
           CustomerPurchaseDetails::where('id', $request->purchage_id)
               ->update(['hotel_id' => $request->hotel_id]);
           $conditionExecuted = true;
       }
   
       if ($request->vehicle_id) {
           CustomerPurchaseDetails::where('id', $request->purchage_id)
               ->update(['vehicle_id' => $request->vehicle_id]);
           $conditionExecuted = true;
       }
   
       if ($request->status) {
           CustomerPurchaseDetails::where('id', $request->purchage_id)
               ->update(['purchase_type' => $request->status]);
           $conditionExecuted = true;
       }
   
       if ($conditionExecuted || !empty($request->purchage_id)) {
           return response()->json([
               'status' => 200,
               'message' => 'Package details changes added successfully.',
           ]);
       } else {
           return response()->json([
               'status' => 404,
               'message' => 'Something went wrong. Package details changes not added successfully.',
           ]);
       }
   }

     public function treatment_search(Request $request)
     {
        $validator = Validator::make($request->all(),[
            'search_query' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Error.',
                'errors' => $validator->errors(),
            ]);
        }

        $searchQuery = $request->search_query;

        $result = CustomerPurchaseDetails::where(function ($query) use ($searchQuery) {
            $query->whereHas('customer', function ($subquery) use ($searchQuery) {
                    $subquery->where('first_name', 'LIKE', '%' . $searchQuery . '%');
                })
                ->orWhereHas('package', function ($subquery) use ($searchQuery) {
                    $subquery->where('name', 'LIKE', '%' . $searchQuery . '%');
                })
                ->orWhereHas('package.provider', function ($subquery) use ($searchQuery) {
                    $subquery->where('company_name', 'LIKE', '%' . $searchQuery . '%');
                })
                ->orWhere('purchase_type', 'LIKE', '%' . $searchQuery . '%');
        })
        ->where('provider_id', Auth::user()->id)
        ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
        ->get();
        

        if ($result->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'message' => 'Search results found.',
                'result' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No results found for the provided search query.',
            ]);
        }
    }
   
     public function salesSummary(Request $request){

        $providerId = Auth::user()->id;
        $currentDate = now()->toDateString();
        $currentYear = now()->year;
        $currentMonth = now()->month;
    
        // Daily Sales
        $dailySales = CustomerPurchaseDetails::where('provider_id', $providerId)
            ->whereDate('created_at', $currentDate)
            ->sum('paid_amount');
    
        // Monthly Sales
        $monthlySales = CustomerPurchaseDetails::where('provider_id', $providerId)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->sum('paid_amount');

    
        return response()->json([
            'status' => 200,
            'message' => 'Sales summary retrieved successfully',
            'daily_sales' => $dailySales,
            'monthly_sales' => $monthlySales,
        ]);
    }

}
