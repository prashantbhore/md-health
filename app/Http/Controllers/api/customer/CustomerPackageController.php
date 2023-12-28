<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Storage;
use App\Models\AddNewAcommodition;
use App\Models\Packages;
use App\Models\ToursDetails;
use App\Models\TransportationDetails;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\CustomerPaymentDetails;
use App\Models\CustomerPurchaseDetails;
use App\Models\PatientInformation;
use App\Models\CustomerDocuments;
use App\Models\CustomerReviews;
use App\Models\CustomerCancelledReason;

class CustomerPackageController extends BaseController
{
    use MediaTrait;


    // public function customer_package_search_filter(Request $request)
    // {
    //     // $validator = Validator::make($request->all(), [
    //     //     'treatment_name' => 'required',
    //     //     // 'city_name' => 'required',
    //     // ]);

    //     // if ($validator->fails()) {
    //     //     return $this->sendError('Validation Error.', $validator->errors());
    //     // }

    //     // if (!empty($request->treatment_name)) {
    //     $packages = Packages::select(
    //         'md_packages.id',
    //         'md_packages.package_unique_no',
    //         'md_packages.package_name',
    //         'md_packages.treatment_period_in_days',
    //         'md_packages.other_services',
    //         'md_packages.package_price',
    //         'md_packages.sale_price',
    //         'md_product_category.product_category_name',
    //         'md_product_sub_category.product_sub_category_name',
    //         'md_master_cities.city_name'
    //     )
    //         ->where('md_packages.status', 'active')
    //         ->where('md_product_category.status', 'active')
    //         ->where('md_product_sub_category.status', 'active')
    //         ->join('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
    //         ->join('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
    //         ->join('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
    //         ->join('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id');

    //     if (!empty($request->treatment_name)) {
    //         $packages = $packages->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
    //     }
    //     if (!empty($request->city_name)) {
    //         $packages = $packages->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
    //     }
    //     $packages = $packages->get();

    //     $data = [];
    //     $data['package_list'] = [];
    //     if (!empty($packages)) {
    //         foreach ($packages as $key => $value) {
    //             $data['package_list'][$key]['id'] = !empty($value->id) ? $value->id : '';
    //             $data['package_list'][$key]['package_unique_no'] = !empty($value->package_unique_no) ? $value->package_unique_no : '';
    //             $data['package_list'][$key]['package_name'] = !empty($value->package_name) ? $value->package_name : '';
    //             $data['package_list'][$key]['treatment_period_in_days'] = !empty($value->treatment_period_in_days) ? $value->treatment_period_in_days : '';
    //             $data['package_list'][$key]['other_services'] = !empty($value->other_services) ? explode(',',$value->other_services) : '';
    //             $data['package_list'][$key]['package_price'] = !empty($value->package_price) ? $value->package_price : '';
    //             $data['package_list'][$key]['sale_price'] = !empty($value->sale_price) ? $value->sale_price : '';
    //             $data['package_list'][$key]['product_category_name'] = !empty($value->product_category_name) ? $value->product_category_name : '';
    //             $data['package_list'][$key]['product_sub_category_name'] = !empty($value->product_sub_category_name) ? $value->product_sub_category_name : '';
    //             $data['package_list'][$key]['city_name'] = !empty($value->city_name) ? $value->city_name : '';
    //         }
    //     }

    //     if (!empty($data)) {
    //         if (!empty($packages)) {
    //             return response()->json([
    //                 'status' => 200,
    //                 'message' => 'Here is your package list.',
    //                 'data' => $data
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'status' => 404,
    //                 'message' => 'your package list is empty.',
    //                 'data' => $data
    //             ]);
    //         }
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'your package list is empty.',
    //         ]);
    //     }
    //     // } else {
    //     //     return response()->json([
    //     //         'status' => 404,
    //     //         'message' => 'Something went wrong. Please select treatment name.',
    //     //     ]);
    //     // }
    // }

    public function customer_package_search_filter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'platform_type' => 'required',
            // 'city_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->platform_type == 'android') {
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
                // ->where('md_packages.status', 'active')
                // ->where('md_product_category.status', 'active')
                // ->where('md_product_sub_category.status', 'active')
                ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
                ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
                ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
                ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id');

            if (!empty($request->treatment_name)) {
                $packages = $packages->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
            }
            if (!empty($request->city_name)) {
                $packages = $packages->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
            }
            $packages = $packages->get();
            // return $packages;

            $data = [];
            $data['package_list'] = [];
            if (!empty($packages)) {
                foreach ($packages as $key => $value) {
                    $data['package_list'][$key]['id'] = !empty($value->id) ? $value->id : '';
                    $data['package_list'][$key]['package_unique_no'] = !empty($value->package_unique_no) ? $value->package_unique_no : '';
                    $data['package_list'][$key]['package_name'] = !empty($value->package_name) ? $value->package_name : '';
                    $data['package_list'][$key]['treatment_period_in_days'] = !empty($value->treatment_period_in_days) ? $value->treatment_period_in_days : '';
                    $data['package_list'][$key]['other_services'] = !empty($value->other_services) ? explode(',', $value->other_services) : '';
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
            // } else {
            //     return response()->json([
            //         'status' => 404,
            //         'message' => 'Something went wrong. Please select treatment name.',
            //     ]);
            // }
        } else {

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
                // ->where('md_packages.status', 'active')
                // ->where('md_product_category.status', 'active')
                // ->where('md_product_sub_category.status', 'active')
                ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
                ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
                ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
                ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id');

            if (!empty($request->treatment_name)) {
                $packages = $packages->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
            }
            if (!empty($request->city_name)) {
                $packages = $packages->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
            }
            $packages = $packages->get();
            // return $packages;

            $data = [];
            $data['package_list'] = [];
            if (!empty($packages)) {
                foreach ($packages as $key => $value) {
                    $data['package_list'][$key]['id'] = !empty($value->id) ? $value->id : '';
                    $data['package_list'][$key]['package_unique_no'] = !empty($value->package_unique_no) ? $value->package_unique_no : '';
                    $data['package_list'][$key]['package_name'] = !empty($value->package_name) ? $value->package_name : '';
                    $data['package_list'][$key]['treatment_period_in_days'] = !empty($value->treatment_period_in_days) ? $value->treatment_period_in_days : '';
                    $data['package_list'][$key]['other_services'] = !empty($value->other_services) ? explode(',', $value->other_services) : '';
                    $data['package_list'][$key]['package_price'] = !empty($value->package_price) ? $value->package_price : '';
                    $data['package_list'][$key]['sale_price'] = !empty($value->sale_price) ? $value->sale_price : '';
                    $data['package_list'][$key]['product_category_name'] = !empty($value->product_category_name) ? $value->product_category_name : '';
                    $data['package_list'][$key]['product_sub_category_name'] = !empty($value->product_sub_category_name) ? $value->product_sub_category_name : '';
                    $data['package_list'][$key]['city_name'] = !empty($value->city_name) ? $value->city_name : '';
                }
            }

            if (!empty($data)) {
                if (!empty($packages)) {
                    return redirect('/health-search-result')->with('success', 'Here is your package details!');
                } else {
                    return redirect('/index')->with('success', 'your package list is empty!');
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'your package list is empty.',
                ]);
            }
        }
    }



    public function packages_view_on_search_result(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $id = $request->id;

        $packages_view = Packages::with(['provider', 'providerGallery', 'provider.city'])->where('id', $id)->first();


        if (!empty($packages_view)) {

            $provider_gallery = [];
            foreach ($packages_view->providerGallery as $val) {
                $provider_gallery[] = !empty($val->provider_image_path) ? url(Storage::url($val->provider_image_path)) : '';
            }


            $packageDetails = [
                "id" => !empty($packages_view->id) ? $packages_view->id : '',
                "package_unique_no" => !empty($packages_view->package_unique_no) ? $packages_view->package_unique_no : '',
                "city_id" => !empty($packages_view->provider->city->id) ? $packages_view->provider->city->id : '',
                "review_stars" => !empty($packages_view->review->start) ? $packages_view->review->start : '',
                "total_reviews" => !empty($packages_view->review_count) ? $packages_view->review_count : '',
                "verbose_review" => !empty($packages_view->review_words) ? $packages_view->review_words : '',
                "overview" => !empty($packages_view->provider->company_overview) ? $packages_view->provider->company_overview : '',
                "package_name" => !empty($packages_view->package_name) ? $packages_view->package_name : '',
                "treatment_category_id" => !empty($packages_view->treatment_category_id) ? $packages_view->treatment_category_id : '',
                "treatment_id" => !empty($packages_view->treatment_id) ? $packages_view->treatment_id : '',
                "other_services" => !empty($packages_view->other_services) ? explode(',', $packages_view->other_services) : '',
                "treatment_period_in_days" => !empty($packages_view->treatment_period_in_days) ? $packages_view->treatment_period_in_days : '',
                "treatment_price" => !empty($packages_view->treatment_price) ? $packages_view->treatment_price : '',


                "city_name" => !empty($packages_view->provider->city->city_name) ? $packages_view->provider->city->city_name : '',
            ];

            return response()->json([
                'status' => 200,
                'message' => 'Package found.',
                'packages_details' => $packageDetails,
                'provider_gallery' => $provider_gallery,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Package not found.',
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
            ->select('md_packages.id', 'md_packages.package_name', 'md_packages.treatment_period_in_days', 'md_master_cities.city_name', 'md_packages.treatment_price', 'md_add_new_acommodition.hotel_name', 'md_packages.hotel_acommodition_price', 'md_add_transportation_details.vehicle_model_id', 'md_packages.transportation_acommodition_price', 'md_packages.tour_price', 'md_packages.visa_service_price', 'md_medical_provider_register.authorisation_full_name', 'md_medical_provider_register.id as provider_id', 'md_packages.sale_price', 'md_packages.package_price', 'md_packages.package_discount')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
            ->leftjoin('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
            ->first();

        if ($purchase_details) {
            $purchase_details['package_id'] = !empty($purchase_details->id) ? $purchase_details->id : '';
            $purchase_details['package_name'] = !empty($purchase_details->package_name) ? $purchase_details->package_name : '';
            $purchase_details['city_name'] = !empty($purchase_details->city_name) ? $purchase_details->city_name : '';
            $purchase_details['treatment_price'] = !empty($purchase_details->treatment_price) ? $purchase_details->treatment_price : '';
            // $purchase_details['other_services'] = !empty($purchase_details->other_services) ? explode(',',$purchase_details->other_services) : [];
            // $purchase_details['hotel_name'] = !empty($purchase_details->hotel_name) ? $purchase_details->hotel_name : '';
            // $purchase_details['hotel_acommodition_price'] = !empty($purchase_details->hotel_acommodition_price) ? $purchase_details->hotel_acommodition_price : '';
            $services = [];



            // Acommodition Service

            if (!empty($purchase_details->hotel_acommodition_price)) {
                $accommodation = [
                    'id' => 1,
                    'title' => 'Acommodition',
                    'price' => $purchase_details->hotel_acommodition_price, // Replace with actual price format

                ];
            }


            // Transportation Service
            $transportation = [
                'id' => 2,
                'title' => 'Transportation',
                'price' => $purchase_details->transportation_acommodition_price, // Replace with actual price format

            ];

            // Visa Details
            $tour_details = [
                'id' => 3,
                'title' => 'Tour Details',
                'price' => $purchase_details->tour_price, // Replace with actual price format

            ];

            // Visa Details
            $visa_details = [
                'id' => 4,
                'title' => 'Visa Details',
                'price' => $purchase_details->visa_service_price, // Replace with actual price format

            ];


            // Add services to the services array
            $services[] = $accommodation;
            $services[] = $transportation;
            $services[] = $tour_details;
            $services[] = $visa_details;
            $purchase_details['vehicle_model_name'] = !empty($purchase_details->vehicle_model_id) ? $purchase_details->vehicle_model_id : '';
            $purchase_details['treatment_period_in_days'] = !empty($purchase_details->treatment_period_in_days) ? $purchase_details->treatment_period_in_days : '';
            $purchase_details['transportation_price'] = !empty($purchase_details->transportation_acommodition_price) ? $purchase_details->transportation_acommodition_price : '';
            $purchase_details['authorisation_full_name'] = !empty($purchase_details->authorisation_full_name) ? $purchase_details->authorisation_full_name : '';
            $purchase_details['provider_id'] = !empty($purchase_details->provider_id) ? $purchase_details->provider_id : '';
            $purchase_details['sale_price'] = !empty($purchase_details->sale_price) ? $purchase_details->sale_price : '';


            $sale_price = $purchase_details['sale_price'];
            $twenty_percent = $sale_price * 0.2; // 20% of sale_price
            $thirty_percent = $sale_price * 0.3; // 30% of sale_price
            $fifty_percent = $sale_price * 0.5; // 50% of sale_price
            $hundred_percent = $sale_price; // 100% of sale_price

            // Apply discounts
            $thirty_percent_discounted = $thirty_percent - ($thirty_percent * 0.05); // 5% discount on 30%
            $fifty_percent_discounted = $fifty_percent - ($fifty_percent * 0.08); // 8% discount on 50%
            $hundred_percent_discounted = $hundred_percent - ($hundred_percent * 0.1); // 10% discount on 100%

            $discount = [];
            $purchase_details['twenty_percent'] = $twenty_percent;
            $purchase_details['thirty_percent'] = $thirty_percent_discounted;
            $purchase_details['fifty_percent'] = $fifty_percent_discounted;
            $purchase_details['hundred_percent'] = $hundred_percent_discounted;

            $twenty_percent = [
                'id' => 1,
                'percentage' => '20 %',
                'minimum_discount' => 'min.Requirement',
                'title' => 'twenty_percent',
                'price' => number_format($twenty_percent, 2), // Replace with actual price format
            ];
            $thirty_percent = [
                'id' => 2,
                'percentage' => '30 %',
                'minimum_discount' => 'Get 5% Discount',
                'title' => 'thirty_percent',
                'price' => number_format($thirty_percent, 2), // Replace with actual price format
            ];
            $fifty_percent = [
                'id' => 3,
                'percentage' => '50 %',
                'minimum_discount' => 'Get 8% Discount',
                'title' => 'fifty_percent',
                'price' => number_format($fifty_percent, 2), // Replace with actual price format

            ];
            $hundred_percent = [
                'id' => 4,
                'percentage' => '100 %',
                'minimum_discount' => 'Get 10% Discount',
                'title' => 'hundred_percent',
                'price' => number_format($hundred_percent, 2), // Replace with actual price format

            ];
            $discount[] = $twenty_percent;
            $discount[] = $thirty_percent;
            $discount[] = $fifty_percent;
            $discount[] = $hundred_percent;
            $purchase_details['package_price'] = !empty($purchase_details->package_price) ? $purchase_details->package_price : '';
            $purchase_details['package_discount'] = !empty($purchase_details->package_discount) ? $purchase_details->package_discount : '';
        }

        if (!empty($purchase_details)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your purchase details.',
                'purchase_details' => $purchase_details,
                'other_services' => $services,
                'discounts' => $discount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'your purchase details list is empty.',
                'purchase_details' => $purchase_details
            ]);
        }
    }


    public function change_patient_information(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'patient_full_name' => 'required',
            'patient_relation' => 'required',
            'patient_email' => 'required',
            'patient_contact_no' => 'required',
            'patient_country_id' => 'required',
            'patient_city_id' => 'required',
            'package_buy_for' => 'required',
            'platform_type' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->package_buy_for == 'myself') {
            $PatientInformation = [];
            $PatientInformation['customer_id'] = Auth::user()->id;
            $PatientInformation['package_id'] = $request->package_id;
            $PatientInformation['address'] = $request->address;
            $PatientInformation['patient_full_name'] = $request->patient_full_name;
            $PatientInformation['patient_country_id'] = $request->patient_country_id;
            $PatientInformation['patient_city_id'] = $request->patient_city_id;
            $PatientInformation['birth_date'] = $request->birth_date;
            $PatientInformation['package_buy_for'] = 'myself';
            $PatientInformation['created_by'] = Auth::user()->id;
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
                    'message' => 'patient information stored successfully in myself.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong .',
                ]);
            }
        } else {
            $PatientInformation = [];
            $PatientInformation['customer_id'] = Auth::user()->id;
            $PatientInformation['package_id'] = $request->package_id;
            $PatientInformation['patient_full_name'] = $request->patient_full_name;
            $PatientInformation['patient_relation'] = $request->patient_relation;
            $PatientInformation['package_transportation_price'] = $request->package_transportation_price;
            $PatientInformation['patient_email'] = $request->patient_email;
            $PatientInformation['patient_contact_no'] = $request->patient_contact_no;
            $PatientInformation['patient_country_id'] = $request->patient_country_id;
            $PatientInformation['patient_city_id'] = $request->patient_city_id;
            $PatientInformation['package_buy_for'] = 'other';
            $PatientInformation['created_by'] = Auth::user()->id;
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
                    'message' => 'patient information stored successfully in other.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong .',
                ]);
            }
        }
    }

    public function customer_get_percentage(Request $request)
    {
        $package_price = Packages::where('status', 'active')
        ->select('sale_price')
        ->where('id', $request->package_id)
        ->first();

        if ($request->sale_price) {
            $sale_price = $request->sale_price;
        } else {
            $sale_price = $package_price->sale_price;
        }

        $twenty_percent = $sale_price * 0.2; // 20% of sale_price
        $thirty_percent = $sale_price * 0.3; // 30% of sale_price
        $fifty_percent = $sale_price * 0.5; // 50% of sale_price
        $hundred_percent = $sale_price; // 100% of sale_price

        // Apply discounts
        $thirty_percent_discounted = $thirty_percent - ($thirty_percent * 0.05); // 5% discount on 30%
        $fifty_percent_discounted = $fifty_percent - ($fifty_percent * 0.08); // 8% discount on 50%
        $hundred_percent_discounted = $hundred_percent - ($hundred_percent * 0.1); // 10% discount on 100%

        $discount = [];
        $purchase_details['twenty_percent'] = $twenty_percent;
        $purchase_details['thirty_percent'] = $thirty_percent_discounted;
        $purchase_details['fifty_percent'] = $fifty_percent_discounted;
        $purchase_details['hundred_percent'] = $hundred_percent_discounted;

        $twenty_percent = [
            'id' => 1,
            'percentage' => '20 %',
            'minimum_discount' => 'min.Requirement',
            'title' => 'twenty_percent',
            'price' => number_format($twenty_percent, 2), // Replace with actual price format
        ];
        $thirty_percent = [
            'id' => 2,
            'percentage' => '30 %',
            'minimum_discount' => 'Get 5% Discount',
            'title' => 'thirty_percent',
            'price' => number_format($thirty_percent, 2), // Replace with actual price format
        ];
        $fifty_percent = [
            'id' => 3,
            'percentage' => '50 %',
            'minimum_discount' => 'Get 8% Discount',
            'title' => 'fifty_percent',
            'price' => number_format($fifty_percent, 2), // Replace with actual price format
        ];
        $hundred_percent = [
            'id' => 4,
            'percentage' => '100 %',
            'minimum_discount' => 'Get 10% Discount',
            'title' => 'hundred_percent',
            'price' => number_format($hundred_percent, 2), // Replace with actual price format

        ];
        $discount[] = $twenty_percent;
        $discount[] = $thirty_percent;
        $discount[] = $fifty_percent;
        $discount[] = $hundred_percent;

        if (!empty($discount)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your discount details.',
                'discounts' => $discount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'your list is empty.',

            ]);
        }
    }

    public function customer_get_purchase_information(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $purchase_details = Packages::where('md_packages.status', 'active')
            ->where('md_packages.id', $request->package_id)
            ->select('md_packages.treatment_price', 'md_add_new_acommodition.hotel_name', 'md_packages.hotel_acommodition_price', 'md_add_transportation_details.vehicle_model_id as vehicle_name', 'md_packages.transportation_acommodition_price', 'md_packages.tour_price', 'md_packages.visa_service_price', 'md_packages.sale_price', 'md_packages.package_price', 'md_packages.package_discount','md_product_category.product_category_name',
            'md_product_sub_category.product_sub_category_name as treatment_name')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
            ->leftjoin('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->first();

            $purchase_details_data=[];

            if(!empty($purchase_details))
            {
                $purchase_details_data['treatment_name']=$purchase_details->treatment_name;
                $purchase_details_data['hotel_name'] = $purchase_details->hotel_name;
                $purchase_details_data['hotel_acommodition_price'] = $purchase_details->hotel_acommodition_price;
                $purchase_details_data['vehicle_name'] = $purchase_details->vehicle_name;
                $purchase_details_data['transportation_acommodition_price'] = $purchase_details->transportation_acommodition_price;
                $purchase_details_data['tour_price'] = $purchase_details->tour_price;
                $purchase_details_data['visa_service_price'] = $purchase_details->visa_service_price;
                $purchase_details_data['sale_price'] = $request->sale_price;
                $purchase_details_data['percentage'] = $request->percentage;
                $purchase_details_data['price'] = $request->price;
            }

        if (!empty($purchase_details)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your purchase data details.',
                'purchase_details_data' => $purchase_details_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'your list is empty.',

            ]);
        }
    }

    public function customer_purchase_package(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'sale_price' => 'required',
            'paid_amount' => 'required',
            'percentage' => 'required',
            'platform_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->platform_type=='web'){

            // dd($request);

            if (!empty($request->purchase_id)) {
                $purchase_details = [];
                $purchase_details['payment_percentage'] = $request->package_percentage_price;
                $purchase_details['paid_amount'] = $request->paid_amount;
                $purchase_details['pending_payment'] = $request->pending_amount;
                // $package_percentage_price = $request->package_percentage_price;
                // $purchase_details['purchase_type'] = 'pending';
                $purchase_details['created_by'] = Auth::user()->id;
                $purchase_details_data = CustomerPurchaseDetails::where('id', $request->purchase_id)->update($purchase_details);

                if (!empty($purchase_details_data)) {
                    if ($request->pending_amount == $request->paid_amount) {
                        $payment_status_delete = [
                            'status' => 'delete',
                        ];

                        CustomerPaymentDetails::where('order_id', $request->purchase_id)
                            ->where('payment_status', 'pending')
                            ->update($payment_status_delete);

                        // When package_total_price and paid_amount are equal
                        $payment_details_pending = [
                            'payment_percentage' => $request->package_percentage_price,
                            'paid_amount' => $request->pending_amount,
                            'payment_status' => 'completed',
                            'pending_payment' => 0 // Assuming no pending amount for completed status
                        ];

                        $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->purchase_id)
                            ->update($payment_details_pending);
                        if (!empty($CustomerPayamentDetails)) {
                            return response()->json([
                                'status' => 200,
                                'message' => 'payment completed.',
                                // 'payment_details' => $payment_details,
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Something went wrong .payment not completed.',
                            ]);
                        } // This should come before the return to ensure the code below doesn't execute
                    } else {
                        // When package_total_price and paid_amount are not equal
                        // $payment_details_pending = [
                        //     'payment_percentage' => $request->package_percentage_price,
                        //     'paid_amount' => $request->pending_amount
                        // ];

                        // $remaining_amount = $request->package_total_price - $request->pending_amount;

                        // $payment_details_completed = [
                        //     'payment_percentage' => $request->package_percentage_price,
                        //     'paid_amount' => $request->pending_amount,
                        //     'pending_payment' => $remaining_amount,
                        //     'payment_status' => 'pending'
                        // ];

                        // $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->id)
                        //     ->update($payment_details_completed);
                        // if (!empty($CustomerPayamentDetails)) {
                        //     return response()->json([
                        //         'status' => 200,
                        //         'message' => 'success.',
                        //         // 'payment_details' => $payment_details,
                        //     ]);
                        // } else {
                        return response()->json([
                            'status' => 404,
                            'message' => 'Something went wrong .payment not completed.',
                        ]);
                        // }
                    }
                }
            } else {
                $purchase_details = [];

                $purchase_details['customer_id'] = Auth::user()->id;
                $purchase_details['package_id'] = $request->package_id;
                $packages = Packages::where('status', 'active')
                    ->select(
                        'hotel_id',
                        'vehicle_id',
                        'created_by',
                        'sale_price',
                        'treatment_price',
                        'hotel_acommodition_price',
                        'transportation_acommodition_price',
                        'visa_service_price',
                        'tour_price'
                    )
                    ->where('id', $request->package_id)
                    ->first();
                $purchase_details['package_treatment_price'] = $packages->treatment_price;
                $purchase_details['package_hotel_price'] = $packages->hotel_acommodition_price;
                $purchase_details['package_transportation_price'] = $packages->transportation_acommodition_price;
                // $purchase_details['package_payment_plan'] = $request->package_percentage_price;
                // $purchase_details['package_total_price'] = $request->package_total_price;
                // $purchase_details['transaction_id'] = $request->transaction_id;
                // $purchase_details['payment_method'] = $request->payment_method;
                $purchase_details['hotel_id'] = $packages->hotel_id;
                $purchase_details['vehicle_id'] = $packages->vehicle_id;
                $purchase_details['provider_id'] = $packages->created_by;
                $purchase_details['package_total_price'] = $request->sale_price;
                // $purchase_details['payment_percentage'] = $request->package_percentage_price;
                $purchase_details['paid_amount'] = $request->paid_amount;
                $pending_amount = $request->sale_price - $request->paid_amount;
                $purchase_details['pending_payment'] = $pending_amount;
                $purchase_details['payment_percentage'] = $request->percentage;
                $purchase_details['purchase_type'] = 'pending';
                $purchase_details['created_by'] = Auth::user()->id;

                $purchase_details_data = CustomerPurchaseDetails::create($purchase_details);

                $CustomerPurchaseDetails = CustomerPurchaseDetails::select('id')->get();
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

                // ... (existing code)
                if (!empty($update_unique_id)) {
                    $payment_details_pending = [];
                    $payment_details_pending['order_id'] = $purchase_details_data->id;
                    $payment_details_pending['customer_id'] = $purchase_details_data->customer_id;
                    $payment_details_pending['card_name'] = $request->card_name;
                    $payment_details_pending['card_no'] = $request->card_no;
                    $payment_details_pending['card_expiry_date'] = $request->card_expiry_date;
                    $payment_details_pending['card_cvv'] = $request->card_cvv;
                    $payment_details_pending['package_id'] = $request->package_id;
                    $payment_details_pending['provider_id'] = $packages->created_by;
                    $payment_details_pending['payment_percentage'] = $purchase_details_data->payment_percentage;
                    $payment_details_pending['paid_amount'] = $purchase_details_data->paid_amount;
                    // $payment_details_pending['pending_payment'] = $purchase_details_data->pending_payment;
                    $payment_details_pending['payment_status'] = 'completed';

                    // Calculate remaining amount after 'pending' payment
                    // $remaining_amount = $request->package_total_price - $request->pending_amount;

                    $payment_details_completed = $payment_details_pending; // Copy the array for completed entry
// return $payment_details_completed;
                    // Update 'completed' entry with remaining amount and status
                    // $payment_details_completed['paid_amount'] = $remaining_amount;
                    $payment_details_completed['pending_payment'] = $request->pending_amount;
                    // No pending amount for completed
                    $payment_details_completed['payment_status'] = 'pending';

                    $payment_pending = CustomerPaymentDetails::create($payment_details_pending);
// return   $payment_pending;
                    // Store 'completed' entry only if there's a remaining amount
                    if ($request->pending_amount > 0) {
                        $payment_completed = CustomerPaymentDetails::create($payment_details_completed);
                    }
                }


                if (!empty($payment_completed) ||!empty($payment_pending)) {
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

        }else{
            if (!empty($request->purchase_id)) {
                $purchase_details = [];
                $purchase_details['payment_percentage'] = $request->package_percentage_price;
                $purchase_details['paid_amount'] = $request->paid_amount;
                $purchase_details['pending_payment'] = $request->pending_amount;
                // $package_percentage_price = $request->package_percentage_price;
                // $purchase_details['purchase_type'] = 'pending';
                $purchase_details['created_by'] = Auth::user()->id;
                $purchase_details_data = CustomerPurchaseDetails::where('id', $request->purchase_id)->update($purchase_details);

                if (!empty($purchase_details_data)) {
                    if ($request->pending_amount == $request->paid_amount) {
                        $payment_status_delete = [
                            'status' => 'delete',
                        ];

                        CustomerPaymentDetails::where('order_id', $request->purchase_id)
                            ->where('payment_status', 'pending')
                            ->update($payment_status_delete);

                        // When package_total_price and paid_amount are equal
                        $payment_details_pending = [
                            'payment_percentage' => $request->package_percentage_price,
                            'paid_amount' => $request->pending_amount,
                            'payment_status' => 'completed',
                            'pending_payment' => 0 // Assuming no pending amount for completed status
                        ];

                        $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->purchase_id)
                            ->update($payment_details_pending);
                        if (!empty($CustomerPayamentDetails)) {
                            return response()->json([
                                'status' => 200,
                                'message' => 'payment completed.',
                                // 'payment_details' => $payment_details,
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Something went wrong .payment not completed.',
                            ]);
                        } // This should come before the return to ensure the code below doesn't execute
                    } else {
                        // When package_total_price and paid_amount are not equal
                        // $payment_details_pending = [
                        //     'payment_percentage' => $request->package_percentage_price,
                        //     'paid_amount' => $request->pending_amount
                        // ];

                        // $remaining_amount = $request->package_total_price - $request->pending_amount;

                        // $payment_details_completed = [
                        //     'payment_percentage' => $request->package_percentage_price,
                        //     'paid_amount' => $request->pending_amount,
                        //     'pending_payment' => $remaining_amount,
                        //     'payment_status' => 'pending'
                        // ];

                        // $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->id)
                        //     ->update($payment_details_completed);
                        // if (!empty($CustomerPayamentDetails)) {
                        //     return response()->json([
                        //         'status' => 200,
                        //         'message' => 'success.',
                        //         // 'payment_details' => $payment_details,
                        //     ]);
                        // } else {
                        return response()->json([
                            'status' => 404,
                            'message' => 'Something went wrong .payment not completed.',
                        ]);
                        // }
                    }
                }
            } else {
                $purchase_details = [];

                $purchase_details['customer_id'] = Auth::user()->id;
                $purchase_details['package_id'] = $request->package_id;
                $packages = Packages::where('status', 'active')
                ->select(
                    'hotel_id',
                    'vehicle_id',
                    'created_by',
                    'sale_price',
                    'treatment_price',
                    'hotel_acommodition_price',
                    'transportation_acommodition_price',
                    'visa_service_price',
                    'tour_price'
                )
                    ->where('id', $request->package_id)
                    ->first();
                $purchase_details['package_treatment_price'] = $packages->treatment_price;
                $purchase_details['package_hotel_price'] = $packages->hotel_acommodition_price;
                $purchase_details['package_transportation_price'] = $packages->transportation_acommodition_price;
                // $purchase_details['package_payment_plan'] = $request->package_percentage_price;
                // $purchase_details['package_total_price'] = $request->package_total_price;
                // $purchase_details['transaction_id'] = $request->transaction_id;
                // $purchase_details['payment_method'] = $request->payment_method;
                $purchase_details['hotel_id'] = $packages->hotel_id;
                $purchase_details['vehicle_id'] = $packages->vehicle_id;
                $purchase_details['provider_id'] = $packages->created_by;
                $purchase_details['package_total_price'] = $request->sale_price;
                // $purchase_details['payment_percentage'] = $request->package_percentage_price;
                $purchase_details['paid_amount'] = $request->paid_amount;
                $pending_amount = $request->sale_price - $request->paid_amount;
                $purchase_details['pending_payment'] = $pending_amount;
                $purchase_details['payment_percentage'] = $request->percentage;
                $purchase_details['purchase_type'] = 'pending';
                $purchase_details['created_by'] = Auth::user()->id;

                $purchase_details_data = CustomerPurchaseDetails::create($purchase_details);

                $CustomerPurchaseDetails = CustomerPurchaseDetails::select('id')->get();
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

                // ... (existing code)
                if (!empty($update_unique_id)) {
                    $payment_details_pending = [];
                    $payment_details_pending['order_id'] = $purchase_details_data->id;
                    $payment_details_pending['customer_id'] = $purchase_details_data->customer_id;
                    $payment_details_pending['card_name'] = $request->card_name;
                    $payment_details_pending['card_no'] = $request->card_no;
                    $payment_details_pending['card_expiry_date'] = $request->card_expiry_date;
                    $payment_details_pending['card_cvv'] = $request->card_cvv;
                    $payment_details_pending['package_id'] = $request->package_id;
                    $payment_details_pending['provider_id'] = $packages->created_by;
                    $payment_details_pending['payment_percentage'] = $purchase_details_data->payment_percentage;
                    $payment_details_pending['paid_amount'] = $purchase_details_data->paid_amount;
                    // $payment_details_pending['pending_payment'] = $purchase_details_data->pending_payment;
                    $payment_details_pending['payment_status'] = 'completed';

                    // Calculate remaining amount after 'pending' payment
                    // $remaining_amount = $request->package_total_price - $request->pending_amount;

                    $payment_details_completed = $payment_details_pending; // Copy the array for completed entry

                    // Update 'completed' entry with remaining amount and status
                    // $payment_details_completed['paid_amount'] = $remaining_amount;
                    $payment_details_completed['pending_payment'] = $request->pending_amount;
                    // No pending amount for completed
                    $payment_details_completed['payment_status'] = 'pending';

                    $payment_pending = CustomerPaymentDetails::create($payment_details_pending);

                    // Store 'completed' entry only if there's a remaining amount
                    if ($request->pending_amount > 0) {
                        $payment_completed = CustomerPaymentDetails::create($payment_details_completed);
                    }
                }


                if (!empty($payment_completed) || !empty($payment_pending)) {
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


    }


    public function customer_purchase_package_active_list()
    {
        $customer_purchase_package_active_list = CustomerPurchaseDetails::where('md_customer_purchase_details.status', 'active')
            ->where(function ($query) {
                $query->where('md_customer_purchase_details.purchase_type', 'in_progress')
                    ->orWhere('md_customer_purchase_details.purchase_type', 'pending');
            })
            ->select(
                'md_customer_purchase_details.id as purchase_id',
                // 'md_customer_purchase_details.status',
                // 'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                // 'md_packages.other_services',
                // 'md_packages.package_price',
                // 'md_packages.sale_price',
                'md_product_category.product_category_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            // ->leftjoin('md_medical_provider_license', 'md_medical_provider_license.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->where('md_customer_purchase_details.customer_id',Auth::user()->id)
            ->get();

        foreach ($customer_purchase_package_active_list as $key => $val) {
            $customer_purchase_package_active_list[$key]['purchase_id'] = !empty($val->purchase_id) ? $val->purchase_id : '';
            $customer_purchase_package_active_list[$key]['package_name'] = !empty($val->package_name) ? $val->package_name : '';
            $customer_purchase_package_active_list[$key]['city_name'] = !empty($val->city_name) ? $val->city_name : '';
            $customer_purchase_package_active_list[$key]['company_name'] = !empty($val->company_name) ? $val->company_name : '';
            $customer_purchase_package_active_list[$key]['treatment_name'] = !empty($val->product_category_name) ? $val->product_category_name : '';
            $customer_purchase_package_active_list[$key]['treatment_period_in_days'] = !empty($val->treatment_period_in_days) ? $val->treatment_period_in_days : '';
            $customer_purchase_package_active_list[$key]['company_logo_image_path'] = !empty($val->company_logo_image_path) ? url('/') . Storage::url($val->company_logo_image_path) : '';
        }

        if (!empty($customer_purchase_package_active_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your active purchase list.',
                'customer_purchase_package_active_list' => $customer_purchase_package_active_list
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .package is empty.',
            ]);
        }
    }

    public function customer_purchase_package_active_list_search(Request $request)
    {
        $customer_purchase_package_active_list = CustomerPurchaseDetails::where('md_customer_purchase_details.status', 'active')
            ->where(function ($query) {
                $query->where('md_customer_purchase_details.purchase_type', 'in_progress')
                    ->orWhere('md_customer_purchase_details.purchase_type', 'pending');
            })
            ->select(
                'md_customer_purchase_details.id',
                // 'md_customer_purchase_details.status',
                // 'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                // 'md_packages.other_services',
                // 'md_packages.package_price',
                // 'md_packages.sale_price',
                'md_product_category.product_category_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            // ->leftjoin('md_medical_provider_license', 'md_medical_provider_license.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->where('md_customer_purchase_details.customer_id', Auth::user()->id);
        if (!empty($request->treatment_name)) {
            $customer_purchase_package_active_list = $customer_purchase_package_active_list->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
        }
        if (!empty($request->city_name)) {
            $customer_purchase_package_active_list = $customer_purchase_package_active_list->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
        }

        $customer_purchase_package_active_list->get();
        foreach ($customer_purchase_package_active_list as $key => $val) {
            $customer_purchase_package_active_list[$key]['id'] = !empty($val->id) ? $val->id : '';
            $customer_purchase_package_active_list[$key]['package_name'] = !empty($val->package_name) ? $val->package_name : '';
            $customer_purchase_package_active_list[$key]['city_name'] = !empty($val->city_name) ? $val->city_name : '';
            $customer_purchase_package_active_list[$key]['company_name'] = !empty($val->company_name) ? $val->company_name : '';
            $customer_purchase_package_active_list[$key]['treatment_name'] = !empty($val->product_category_name) ? $val->product_category_name : '';
            $customer_purchase_package_active_list[$key]['treatment_period_in_days'] = !empty($val->treatment_period_in_days) ? $val->treatment_period_in_days : '';
            $customer_purchase_package_active_list[$key]['company_logo_image_path'] = !empty($val->company_logo_image_path) ? url('/') . Storage::url($val->company_logo_image_path) : '';
        }

        if (!empty($customer_purchase_package_active_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'your active purchase list found.',
                'customer_purchase_package_active_list' => $customer_purchase_package_active_list
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function customer_purchase_package_completed_list()
    {
        $customer_purchase_package_completed_list = CustomerPurchaseDetails::where('md_customer_purchase_details.purchase_type', 'completed')
            ->select(
                'md_customer_purchase_details.id',
                // 'md_customer_purchase_details.status',
                // 'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                // 'md_packages.other_services',
                // 'md_packages.package_price',
                // 'md_packages.sale_price',
                'md_product_category.product_category_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            // ->leftjoin('md_medical_provider_license', 'md_medical_provider_license.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->where('md_customer_purchase_details.customer_id', Auth::user()->id)
            ->get();

        foreach ($customer_purchase_package_completed_list as $key => $val) {
            $customer_purchase_package_completed_list[$key]['id'] = !empty($val->id) ? $val->id : '';
            $customer_purchase_package_completed_list[$key]['package_name'] = !empty($val->package_name) ? $val->package_name : '';
            $customer_purchase_package_completed_list[$key]['city_name'] = !empty($val->city_name) ? $val->city_name : '';
            $customer_purchase_package_completed_list[$key]['company_name'] = !empty($val->company_name) ? $val->company_name : '';
            $customer_purchase_package_completed_list[$key]['treatment_name'] = !empty($val->product_category_name) ? $val->product_category_name : '';
            $customer_purchase_package_completed_list[$key]['treatment_period_in_days'] = !empty($val->treatment_period_in_days) ? $val->treatment_period_in_days : '';
            $customer_purchase_package_completed_list[$key]['company_logo_image_path'] = !empty($val->company_logo_image_path) ? url('/') . Storage::url($val->company_logo_image_path) : '';
        }

        if (!empty($customer_purchase_package_completed_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your completed purchase list.',
                'customer_purchase_package_completed_list' => $customer_purchase_package_completed_list
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .package is empty.',
            ]);
        }
    }

    public function customer_purchase_package_completed_list_search(Request $request)
    {
        $customer_purchase_package_completed_list = CustomerPurchaseDetails::where('md_customer_purchase_details.purchase_type', 'completed')
            ->select(
                'md_customer_purchase_details.id',
                // 'md_customer_purchase_details.status',
                // 'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                // 'md_packages.other_services',
                // 'md_packages.package_price',
                // 'md_packages.sale_price',
                'md_product_category.product_category_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            // ->leftjoin('md_medical_provider_license', 'md_medical_provider_license.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->where('md_customer_purchase_details.customer_id', Auth::user()->id);
        if (!empty($request->treatment_name)) {
            $customer_purchase_package_completed_list = $customer_purchase_package_completed_list->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
        }
        if (!empty($request->city_name)) {
            $customer_purchase_package_completed_list = $customer_purchase_package_completed_list->where('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
        }
        $customer_purchase_package_completed_list->get();

        foreach ($customer_purchase_package_completed_list as $key => $val) {
            $customer_purchase_package_completed_list[$key]['id'] = !empty($val->id) ? $val->id : '';
            $customer_purchase_package_completed_list[$key]['package_name'] = !empty($val->package_name) ? $val->package_name : '';
            $customer_purchase_package_completed_list[$key]['city_name'] = !empty($val->city_name) ? $val->city_name : '';
            $customer_purchase_package_completed_list[$key]['company_name'] = !empty($val->company_name) ? $val->company_name : '';
            $customer_purchase_package_completed_list[$key]['treatment_name'] = !empty($val->product_category_name) ? $val->product_category_name : '';
            $customer_purchase_package_completed_list[$key]['treatment_period_in_days'] = !empty($val->treatment_period_in_days) ? $val->treatment_period_in_days : '';
            $customer_purchase_package_completed_list[$key]['company_logo_image_path'] = !empty($val->company_logo_image_path) ? url('/') . Storage::url($val->company_logo_image_path) : '';
        }

        if (!empty($customer_purchase_package_completed_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'your completed purchase list found.',
                'customer_purchase_package_completed_list' => $customer_purchase_package_completed_list
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }


    public function customer_purchase_package_cancelled_list()
    {
        $customer_purchase_package_cancelled_list = CustomerPurchaseDetails::where('md_customer_purchase_details.purchase_type', 'cancelled')
            ->select(
                'md_customer_purchase_details.id',
                // 'md_customer_purchase_details.status',
                // 'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                // 'md_packages.other_services',
                // 'md_packages.package_price',
                // 'md_packages.sale_price',
                'md_product_category.product_category_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            // ->leftjoin('md_medical_provider_license', 'md_medical_provider_license.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->where('md_customer_purchase_details.customer_id', Auth::user()->id)
            ->get();

        foreach ($customer_purchase_package_cancelled_list as $key => $val) {
            $customer_purchase_package_cancelled_list[$key]['id'] = !empty($val->id) ? $val->id : '';
            $customer_purchase_package_cancelled_list[$key]['package_name'] = !empty($val->package_name) ? $val->package_name : '';
            $customer_purchase_package_cancelled_list[$key]['city_name'] = !empty($val->city_name) ? $val->city_name : '';
            $customer_purchase_package_cancelled_list[$key]['company_name'] = !empty($val->company_name) ? $val->company_name : '';
            $customer_purchase_package_cancelled_list[$key]['treatment_name'] = !empty($val->product_category_name) ? $val->product_category_name : '';
            $customer_purchase_package_cancelled_list[$key]['treatment_period_in_days'] = !empty($val->treatment_period_in_days) ? $val->treatment_period_in_days : '';
            $customer_purchase_package_cancelled_list[$key]['company_logo_image_path'] = !empty($val->company_logo_image_path) ? url('/') . Storage::url($val->company_logo_image_path) : '';
        }

        if (!empty($customer_purchase_package_cancelled_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your cancelled purchase list.',
                'customer_purchase_package_cancelled_list' => $customer_purchase_package_cancelled_list
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .package is empty.',
            ]);
        }
    }


    public function customer_change_package_list_active_cancelled(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $status_update['purchase_type'] = 'cancelled';
        $status_update['modified_by'] = Auth::user()->id;
        $status_update['modified_ip_address'] = $request->ip();

        $CustomerPurchaseDetails = CustomerPurchaseDetails::where('id', $request->id)->update($status_update);
        if (!empty($CustomerPurchaseDetails)) {
            return response()->json([
                'status' => 200,
                'message' => 'package details cancelled successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not cancelled.',
            ]);
        }
    }

    public function customer_purchase_cancellation_reason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'purchase_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cancellation_reason = [];
        $cancellation_reason['purchase_id'] = $request->purchase_id;
        $cancellation_reason['package_id'] = $request->package_id;
        $cancellation_reason['customer_id'] = Auth::user()->id;
        $cancellation_reason['cancellation_reason'] = $request->cancellation_reason;
        $cancellation_reason['created_by'] = Auth::user()->id;
        $CustomerCancelledReason = CustomerCancelledReason::create($cancellation_reason);
        if (!empty($CustomerCancelledReason)) {
            return response()->json([
                'status' => 200,
                'message' => 'Thank You For Your Reason.We will get back to you.',
                'CustomerCancelledReason' => $CustomerCancelledReason,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function change_patient_information_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $PatientInformation = PatientInformation::where('status', 'active')
            ->select(
                'id',
                'patient_unique_id',
                'customer_id',
                'package_id',
                'patient_full_name',
                'patient_relation',
                'patient_email',
                'patient_contact_no',
                'patient_country_id',
                'patient_city_id',
                'package_buy_for'
            )
            ->where('package_id', $request->id)
            ->where('customer_id',Auth::user()->id)
            ->get();

        if (!empty($PatientInformation)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your Patient Information list.',
                'PatientInformation' => $PatientInformation,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Patient Information list .',
            ]);
        }
    }

    public function update_patient_information(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $patient_information = [];
        $patient_information['patient_full_name'] = $request->patient_full_name;
        $patient_information['patient_relation'] = $request->patient_relation;
        $patient_information['patient_email'] = $request->patient_email;
        $patient_information['patient_contact_no'] = $request->patient_contact_no;
        $patient_information['patient_country_id'] = $request->patient_country_id;
        $patient_information['patient_city_id'] = $request->patient_city_id;
        $patient_information['address'] = $request->address;
        $patient_information['birth_date'] = $request->birth_date;
        $patient_information['created_by'] = Auth::user()->id;

        $PatientInformation = PatientInformation::where('id', $request->id)->update($patient_information);

        if (!empty($PatientInformation)) {
            return response()->json([
                'status' => 200,
                'message' => 'Patient Information updated successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not updated.',
            ]);
        }
    }


    public function customer_package_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer_purchase_package_active_list = CustomerPurchaseDetails::where('md_customer_purchase_details.status', 'active')
            ->where(function ($query) {
                $query->where('md_customer_purchase_details.purchase_type', 'in_progress')
                    ->orWhere('md_customer_purchase_details.purchase_type', 'pending');
            })
            ->select(
                'md_customer_purchase_details.id as purchase_id',
                // 'md_customer_purchase_details.status',
                // 'md_customer_purchase_details.package_total_price',
                // 'md_customer_purchase_details.created_at',
                'md_packages.id as package_id',
                // 'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.treatment_period_in_days',
                'md_packages.other_services',
                'md_customer_purchase_details.paid_amount',
                'md_customer_purchase_details.pending_payment',
                'md_packages.hotel_id',
                'md_packages.vehicle_id',
                'md_product_category.product_category_name as treatment_name',
                // 'md_product_sub_category.product_sub_category_name',
                'md_master_cities.city_name',
                'md_medical_provider_register.company_name',
                'md_medical_provider_logo.company_logo_image_path'
            )
            ->leftjoin('md_packages', 'md_packages.id', 'md_customer_purchase_details.package_id')
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->leftjoin('md_medical_provider_logo', 'md_medical_provider_logo.medical_provider_id', '=', 'md_medical_provider_register.id')
            ->where('md_customer_purchase_details.package_id', $request->package_id)
            ->first();

        // foreach ($customer_purchase_package_active_list as $key => $val) {
        $customer_purchase_package_active_list['purchase_id'] = !empty($customer_purchase_package_active_list->purchase_id) ? $customer_purchase_package_active_list->purchase_id : '';
        $customer_purchase_package_active_list['package_unique_no'] = !empty($customer_purchase_package_active_list->package_unique_no) ? $customer_purchase_package_active_list->package_unique_no : '';
        // $customer_purchase_package_active_list['other_services'] = !empty($customer_purchase_package_active_list->other_services) ? explode(',',$customer_purchase_package_active_list->other_services) : '';
        $customer_purchase_package_active_list['package_name'] = !empty($customer_purchase_package_active_list->package_name) ? $customer_purchase_package_active_list->package_name : '';
        $customer_purchase_package_active_list['city_name'] = !empty($customer_purchase_package_active_list->city_name) ? $customer_purchase_package_active_list->city_name : '';
        $customer_purchase_package_active_list['company_name'] = !empty($customer_purchase_package_active_list->company_name) ? $customer_purchase_package_active_list->company_name : '';
        $customer_purchase_package_active_list['treatment_name'] = !empty($customer_purchase_package_active_list->treatment_name) ? $customer_purchase_package_active_list->treatment_name : '';
        $customer_purchase_package_active_list['treatment_period_in_days'] = !empty($customer_purchase_package_active_list->treatment_period_in_days) ? $customer_purchase_package_active_list->treatment_period_in_days : '';
        $customer_purchase_package_active_list['company_logo_image_path'] = !empty($customer_purchase_package_active_list->company_logo_image_path) ? url('/') . Storage::url($customer_purchase_package_active_list->company_logo_image_path) : '';
        $customer_purchase_package_active_list['package_payment_plan'] = !empty($customer_purchase_package_active_list->package_payment_plan) ? $customer_purchase_package_active_list->package_payment_plan : '';
        $customer_purchase_package_active_list['package_total_price'] = !empty($customer_purchase_package_active_list->package_total_price) ? $customer_purchase_package_active_list->package_total_price : '';
        // $customer_purchase_package_active_list['created_at'] = !empty($customer_purchase_package_active_list->created_at) ? $customer_purchase_package_active_list->created_at : '';
        // }

        $services = [];
        if (!empty($customer_purchase_package_active_list->hotel_id)) {
            $accommodation = [
                'id' => $customer_purchase_package_active_list->hotel_id,
                'title' => 'Acommodition',
                'status' => 'active', // Replace with actual price format
            ];
        }

        if (!empty($customer_purchase_package_active_list->vehicle_id)) {
            $transportation = [
                'id' => $customer_purchase_package_active_list->vehicle_id,
                'title' => 'Transportation',
                'status' => 'active', // Replace with actual price format

            ];
        }



        $services[] = $accommodation;
        $services[] = $transportation;


        if (!empty($customer_purchase_package_active_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your purchase details list.',
                'customer_purchase_package_list' => $customer_purchase_package_active_list,
                'other_services' => $services
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong .details list is empty.',
            ]);
        }
    }


    public function customer_upload_documents(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $customer_documents = [];
        $customer_documents['package_id'] = $request->package_id;
        $customer_documents['customer_id'] = Auth::user()->id;
        if ($request->has('customer_document_image_path')) {
            if ($request->file('customer_document_image_path')) {
                $customer_documents['customer_document_image_path'] = $this->verifyAndUpload($request, 'customer_document_image_path', 'customer/customer_documents');
                $original_name = $request->file('customer_document_image_path')->getClientOriginalName();
                $customer_documents['customer_document_image_name'] = $original_name;
            }
        }
        $customer_documents_data = CustomerDocuments::create($customer_documents);

        if ($customer_documents_data) {
            $CustomerDocuments = CustomerDocuments::where('status', 'active')
                ->select('id', 'customer_document_image_path', 'package_id')
                ->where('customer_id', Auth::user()->id)
                ->get();

            foreach ($CustomerDocuments as $key => $val) {
                $CustomerDocuments[$key]['package_id'] = !empty($val->package_id) ? $val->package_id : '';
                $CustomerDocuments[$key]['customer_document_image_path'] = !empty($val->customer_document_image_path) ? url('/') . Storage::url($val->customer_document_image_path) : '';
            }
        }

        if (!empty($CustomerDocuments)) {
            return response()->json([
                'status' => 200,
                'message' => 'your documents uploaded successfully.',
                'data' => $CustomerDocuments,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'documents not uploaded.',
            ]);
        }
    }


    public function customer_pay_now(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $CustomerPurchaseDetails = [];

        $CustomerPurchaseDetails['pending_payment'] = $request->discount_amount;
        $CustomerPurchaseDetails['paid_amount'] = $request->pending_amount;
        $CustomerPurchaseDetails['purchase_type'] = $request->purchase_type;

        $CustomerPurchaseDetails['created_by'] = Auth::user()->id;

        $CustomerPurchaseDetails = CustomerPurchaseDetails::where('id', $request->id)->update($CustomerPurchaseDetails);

        if (!empty($CustomerPurchaseDetails)) {
            $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->id)->update($CustomerPurchaseDetails);
        }

        if (!empty($CustomerPurchaseDetails)) {
            return response()->json([
                'status' => 200,
                'message' => 'pending amount store successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong.',
            ]);
        }
    }


    public function customer_my_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $PatientInformation = PatientInformation::where('md_other_patient_information.status', 'active')
            ->select(
                'md_other_patient_information.id',
                'patient_full_name',
                'md_other_patient_information.patient_relation',
                'md_other_patient_information.patient_email',
                'md_other_patient_information.patient_contact_no',
                'md_master_cities.city_name',
                'md_master_country.country_name'
            )
            ->leftjoin('md_master_cities', 'md_master_cities.id', 'md_other_patient_information.patient_city_id')
            ->leftjoin('md_master_country', 'md_master_country.id', 'md_other_patient_information.patient_country_id')
            ->where('md_other_patient_information.id', $request->patient_id)
            ->first();

        $treatment_information = Packages::select(
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
            ->join('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
            ->where('md_packages.id', $request->package_id)
            ->first();

        if (!empty($PatientInformation) || !empty($treatment_information)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your patient and treatment list.',
                'PatientInformation' => $PatientInformation,
                'treatment_information' => $treatment_information,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong.list not found',
            ]);
        }
    }

    public function customer_acommodition_details_view(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $AddNewAcommodition = AddNewAcommodition::where('status', 'active')
            ->select(
                'id',
                'hotel_name',
                'hotel_address',
                'hotel_stars',
                'hotel_image_path',
                'hotel_image_name',
                'hotel_per_night_price',
                'hotel_other_services',
                'service_provider_id',
            )
            ->where('id', $request->hotel_id)
            ->first();
        // return $AddNewAcommodition;
        $acommodation = [];

        if (!empty($AddNewAcommodition)) {
            $acommodation['id'] = !empty($AddNewAcommodition->id) ? $AddNewAcommodition->id : 0;
            $acommodation['hotel_name'] = !empty($AddNewAcommodition->hotel_name) ? $AddNewAcommodition->hotel_name : '';
            $acommodation['hotel_address'] = !empty($AddNewAcommodition->hotel_address) ? $AddNewAcommodition->hotel_address : '';
            $acommodation['hotel_image_path'] = !empty($AddNewAcommodition->hotel_image_path) ? url('/') . Storage::url($AddNewAcommodition->hotel_image_path) : '';
            $acommodation['hotel_other_services'] = !empty($AddNewAcommodition->hotel_other_services) ? explode(',', $AddNewAcommodition->hotel_other_services) : '';
        }

        if (!empty($acommodation)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your hotel list.',
                'hotel_list' => $acommodation,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong.list not found',
            ]);
        }
    }

    public function customer_transporatation_details_view(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $TransportationDetails = TransportationDetails::where('md_add_transportation_details.status', '=', 'active')
            ->select(
                'md_add_transportation_details.id',
                'md_add_transportation_details.status',
                'md_master_brand.brand_name',
                'md_add_transportation_details.vehicle_model_id',
                'md_add_transportation_details.vehicle_per_day_price',
                'md_add_transportation_details.other_services',
                'md_master_vehicle_comfort_levels.vehicle_level_name'
            )
            ->leftjoin(
                'md_master_vehicle_comfort_levels',
                'md_master_vehicle_comfort_levels.id',
                'md_add_transportation_details.comfort_level_id'
            )
            ->leftjoin('md_master_brand', 'md_master_brand.id', 'md_add_transportation_details.vehicle_brand_id')
            ->where('md_add_transportation_details.id', $request->vehicle_id)
            ->first();

        if (!empty($TransportationDetails)) {
            return response()->json([
                'status' => 200,
                'message' => 'Transportation Details list found.',
                'data' => $TransportationDetails,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transportation Details list is empty.',
            ]);
        }
    }

    public function customer_tour_details_view(Request $request)
    {
        $ToursDetails = ToursDetails::where('status', '=', 'active')
            ->select(
                'id',
                'tour_name',
                'tour_description',
                'tour_days',
                'tour_image_path',
                'tour_image_name',
                'tour_price',
                'tour_other_services',
                'platform_type',
                'status',
                'created_by'
            )
            ->where('id', $request->tour_id)
            ->first();

        if (!empty($ToursDetails)) {
            // foreach ($ToursDetails as $key => $value) {
            $ToursDetails['tour_name'] = !empty($ToursDetails->tour_name) ? $ToursDetails->tour_name : '';
            $ToursDetails['tour_description'] = !empty($ToursDetails->tour_description) ? $ToursDetails->tour_description : '';
            $ToursDetails['tour_days'] = !empty($ToursDetails->tour_days) ? $ToursDetails->tour_days : '';
            $ToursDetails['tour_image_path'] = url('/') . Storage::url($ToursDetails->tour_image_path);
            $ToursDetails['tour_price'] = !empty($ToursDetails->tour_price) ? $ToursDetails->tour_price : '';
            $ToursDetails['tour_other_services'] = !empty($ToursDetails->tour_other_services) ? explode(',', $ToursDetails->tour_other_services) : '';
            // }
        }

        if (!empty($ToursDetails)) {
            return response()->json([
                'status' => 200,
                'message' => 'Tours Details found.',
                'tour_details' => $ToursDetails,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function customer_reviews(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer_reviews = [];
        $customer_reviews['customer_id'] = Auth::user()->id;
        $customer_reviews['package_id'] = $request->package_id;
        $customer_reviews['treatment_reviews'] = $request->treatment_reviews;
        $customer_reviews['acommodation_reviews'] = $request->acommodation_reviews;
        $customer_reviews['transporatation_reviews'] = $request->transporatation_reviews;
        $customer_reviews['behaviour_reviews'] = $request->behaviour_reviews;
        $customer_reviews['provider_reviews'] = $request->provider_reviews;
        $customer_reviews['extra_notes'] = $request->extra_notes;
        $customer_reviews['created_by'] = Auth::user()->id;
        $customer_reviews_data = CustomerReviews::create($customer_reviews);

        if (!empty($customer_reviews_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Your Reviews Added Successfully.',
                'customer_reviews_data' => $customer_reviews_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }
}
