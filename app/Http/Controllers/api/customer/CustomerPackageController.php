<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\AddNewAcommodition;
use App\Models\Packages;
use App\Models\ToursDetails;
use App\Models\TransportationDetails;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\CustomerPaymentDetails;
use App\Models\CustomerPurchaseDetails;
use App\Models\PatientInformation;



class CustomerPackageController extends BaseController
{
    //
    public function customer_package_search_filter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'treatment_name' => 'required',
            // 'city_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (!empty($request->treatment_name)) {
            $packages = Packages::select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                'md_packages.other_services',
                'md_packages.package_price',
                'md_packages.sale_price',
                'md_product_category.product_category_name',
                'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name'
            )
                ->where('md_packages.status', 'active')
                ->where('md_product_category.status', 'active')
                ->where('md_product_sub_category.status', 'active')
                ->join('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
                ->join('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
                ->join('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
                ->join('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id');

            if (!empty($request->treatment_name)) {
                $packages = $packages->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
            }
            if (!empty($request->city_name)) {
                $packages = $packages->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
            }
            $packages = $packages->get();

            $data = [];
            $data['package_list'] = [];
            if (!empty($packages)) {
                foreach ($packages as $key => $value) {
                    $data['package_list'][$key]['id'] = !empty($value->id) ? $value->id : '';
                    $data['package_list'][$key]['package_unique_no'] = !empty($value->package_unique_no) ? $value->package_unique_no : '';
                    $data['package_list'][$key]['package_name'] = !empty($value->package_name) ? $value->package_name : '';
                    $data['package_list'][$key]['treatment_period_in_days'] = !empty($value->treatment_period_in_days) ? $value->treatment_period_in_days : '';
                    $data['package_list'][$key]['other_services'] = !empty($value->other_services) ? $value->other_services : '';
                    $data['package_list'][$key]['package_price'] = !empty($value->package_price) ? $value->package_price : '';
                    $data['package_list'][$key]['sale_price'] = !empty($value->sale_price) ? $value->sale_price : '';
                    $data['package_list'][$key]['product_category_name'] = !empty($value->product_category_name) ? $value->product_category_name : '';
                    $data['package_list'][$key]['product_sub_category_name'] = !empty($value->product_sub_category_name) ? $value->product_sub_category_name : '';
                    $data['package_list'][$key]['city_name'] = !empty($value->city_name) ? $value->city_name : '';
                }
            }

            if (!empty($data)) {
                if (!empty($packages)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Here is your package list.',
                        'data' => $data
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'your package list is empty.',
                        'data' => $data
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'your package list is empty.',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Please select treatment name.',
            ]);
        }
    }



    
    public function packages_view_on_search_result(Request $request)
    {


        $validator = Validator::make($request->all(),[
            'id' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->id;


        $packages_view = Packages::with(['provider', 'providerGallery','city'])->where('id', $id)->first();
        
        if(!empty($packages_view)){
            return response()->json([
                'status' => 200,
                'message' => 'package found.',
                'packages_deactive_list' => $packages_view
            ]);
    
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. package not found.',
            ]);
    }
}

  public function customer_package_purchase_details(Request $request)
  {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            // 'city_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $purchase_details = Packages::where('md_packages.status', 'active')
            ->where('md_packages.id', $request->package_id)
        ->select('md_packages.id', 'md_packages.package_name', 'md_master_cities.city_name', 'md_packages.treatment_price', 'md_add_new_acommodition.hotel_name', 'md_packages.hotel_acommodition_price', 'md_add_transportation_details.vehicle_model_id', 'md_packages.transportation_acommodition_price', 'md_medical_provider_register.authorisation_full_name', 'md_medical_provider_register.id as provider_id', 'md_packages.sale_price', 'md_packages.package_price', 'md_packages.package_discount')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
            ->leftjoin('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
            ->first();

        if (!empty($purchase_details)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your purchase details.',
                'purchase_details' => $purchase_details
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'your purchase details list is empty.',
                'purchase_details' => $purchase_details
            ]);
        }
    }

   public function change_patient_information(Request $request){
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'patient_full_name' => 'required',
            'patient_relation' => 'required',
            'patient_email' => 'required',
            'patient_contact_no' => 'required',
            'patient_country_id' => 'required',
            'patient_city_id' => 'required',
            'platform_type'=>'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $PatientInformation = [];

        $PatientInformation['customer_id'] = 1;
        $PatientInformation['package_id'] = $request->package_id;
        $PatientInformation['patient_full_name'] = $request->patient_full_name;
        $PatientInformation['patient_relation'] = $request->patient_relation;
        $PatientInformation['package_transportation_price'] = $request->package_transportation_price;
        $PatientInformation['patient_email'] = $request->patient_email;
        $PatientInformation['patient_contact_no'] = $request->patient_contact_no;
        $PatientInformation['patient_country_id'] = $request->patient_country_id;
        $PatientInformation['patient_city_id'] = $request->patient_city_id;
        $PatientInformation['created_by'] = 1;
        $purchase_details_data = PatientInformation::create($PatientInformation);
        $PatientInformation = PatientInformation::select('id')->get();
        if (!empty($PatientInformation)) {
            foreach ($PatientInformation as $key => $value) {
                $length = strlen($value->id);
                if ($length == 1) {
                    $patient_unique_id = '#MD00000' . $value->id;
                } elseif ($length == 2) {
                    $patient_unique_id = '#MD0000' . $value->id;
                } elseif ($length == 3) {
                    $patient_unique_id = '#MD000' . $value->id;
                } elseif ($length == 4) {
                    $patient_unique_id = '#MD00' . $value->id;
                } elseif ($length == 5) {
                    $patient_unique_id = '#MD0' . $value->id;
                } else {
                    $patient_unique_id = '#MD' . $value->id;
                }

                $update_unique_id = PatientInformation::where('id', $value->id)->update(['patient_unique_id' => $patient_unique_id]);
            }
        }

        if (!empty($update_unique_id)) {
            return response()->json([
                'status' => 200,
                'message' => 'patient information stored successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .',
            ]);
        }
   }

    public function customer_purchase_package(Request $request){
        // return 'asds';
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'package_treatment_price' => 'required',
            'package_hotel_price' => 'required',
            'package_transportation_price' => 'required',
            'package_total_price' => 'required',
            'payment_method' => 'required',
            'platform_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $purchase_details = [];

        $purchase_details['customer_id'] = 1;
        $purchase_details['package_id'] = $request->package_id;
        $purchase_details['package_treatment_price'] = $request->package_treatment_price;
        $purchase_details['package_hotel_price'] = $request->package_hotel_price;
        $purchase_details['package_transportation_price'] = $request->package_transportation_price;
        $purchase_details['package_total_price'] = $request->package_total_price;
        $purchase_details['package_payment_plan'] = $request->package_payment_plan;
        $purchase_details['transaction_id'] = $request->transaction_id;
        $purchase_details['payment_method'] = $request->payment_method;
        $purchase_details['created_by'] = 1;

        $purchase_details_data = CustomerPurchaseDetails::create($purchase_details);

        $CustomerPurchaseDetails = CustomerPurchaseDetails::select('id')->get();
        // return $CustomerPurchaseDetails;
        if (!empty($CustomerPurchaseDetails)) {
            foreach ($CustomerPurchaseDetails as $key => $value) {
                $length = strlen($value->id);
                if ($length == 1) {
                    $order_unique_id = '#MD00000' . $value->id;
                } elseif ($length == 2) {
                    $order_unique_id = '#MD0000' . $value->id;
                } elseif ($length == 3) {
                    $order_unique_id = '#MD000' . $value->id;
                } elseif ($length == 4) {
                    $order_unique_id = '#MD00' . $value->id;
                } elseif ($length == 5) {
                    $order_unique_id = '#MD0' . $value->id;
                } else {
                    $order_unique_id = '#MD' . $value->id;
                }

                $update_unique_id = CustomerPurchaseDetails::where('id', $value->id)->update(['order_id' => $order_unique_id]);
            }
        }

        if(!empty($update_unique_id)){
            $payment_details = [];
            $payment_details['order_id'] = $purchase_details_data->id;
            $payment_details['customer_id'] = $purchase_details_data->customer_id;
            $payment_details['card_name'] = $request->card_name;
            $payment_details['card_no'] = $request->card_no;
            $payment_details['card_expiry_date'] = $request->card_expiry_date;
            $payment_details['card_cvv'] = $request->card_cvv;
            $payment_details = CustomerPaymentDetails::create($payment_details);
        }

        if (!empty($payment_details)) {
            return response()->json([
                'status' => 200,
                'message' => 'package purchase successfully.',
                // 'payment_details' => $payment_details,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .package not purchased.',
            ]);
        }
    }
}