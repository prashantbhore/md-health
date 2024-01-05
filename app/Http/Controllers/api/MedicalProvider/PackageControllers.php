<?php

namespace App\Http\Controllers\api\MedicalProvider;

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

class PackageControllers extends BaseController
{

    public function treatment_category_list()
    {
        $treatment_category_list = ProductCategory::where('status', 'active')
            ->select(
                'id',
                'product_category_name',
                'status'
            )
            ->where('main_product_category_id', 1)
            ->get();


        if (!empty($treatment_category_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'treatment details found.',
                'packages_active_list' => $treatment_category_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function treatment_list(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $treatment_category_list = ProductSubCategory::where('status', 'active')
            ->select(
                'id',
                'product_sub_category_name',
                'status'
            )
            ->where('product_category_id', $request->id)
            ->get();


        if (!empty($treatment_category_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'treatment details found.',
                'packages_active_list' => $treatment_category_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }


    //add_packages
    public function add_packages(Request $request)
    {
        // dd($request);
        // dd(Auth::user()->id);
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'treatment_category_id' => 'required',
            'treatment_id' => 'required',
            // 'package_price' => 'required',
            'platform_type' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $package_exist_or_not = Packages::where('status', '!=', 'delete')
            ->where('package_name', $request->package_name)
            ->first();

        if (empty($package_exist_or_not)) {
            if (!empty($request->button_type)) {
                if ($request->button_type == 'active') {
                    $package_input = [];
                    $package_input['package_name'] = $request->package_name;
                    $package_input['treatment_category_id'] = $request->treatment_category_id;
                    $package_input['treatment_id'] = $request->treatment_id;
                    $package_input['other_services'] = $request->other_services;
                    $package_input['treatment_period_in_days'] = $request->treatment_period_in_days;
                    $package_input['treatment_price'] = $request->treatment_price;
                    $package_input['hotel_id'] = $request->hotel_id;
                    $package_input['hotel_in_time'] = $request->hotel_in_time;
                    $package_input['hotel_out_time'] = $request->hotel_out_time;
                    $package_input['hotel_acommodition_price'] = $request->hotel_acommodition_price;
                    $package_input['vehicle_id'] = $request->vehicle_id;
                    $package_input['vehicle_in_time'] = $request->vehicle_in_time;
                    $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                    $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                    $package_input['tour_id'] = $request->tour_id;
                    $package_input['tour_in_time'] = $request->tour_in_time;
                    $package_input['tour_price'] = $request->tour_price;
                    $package_input['tour_out_time'] = $request->tour_out_time;
                    // $package_input['tour_price'] = $request->tour_price;
                    $package_input['visa_details'] = $request->visa_details;
                    $package_input['visa_service_price'] = $request->visa_service_price;
                    $package_input['translation_price'] = $request->translation_price;
                    $package_input['ambulance_service_price'] = $request->ambulance_service_price;
                    $package_input['ticket_price'] = $request->ticket_price;
                    $package_input['package_discount'] = $request->package_discount;
                    $package_input['package_price'] = $request->package_price;
                    $package_input['sale_price'] = $request->sale_price;
                    $package_input['platform_type'] = $request->platform_type;
                    $package_input['created_by'] = Auth::user()->id;
                    $AddPackages = Packages::create($package_input);
                    $Packages = Packages::select('id')->get();
                    if (!empty($Packages)) {
                        foreach ($Packages as $key => $value) {

                            $length = strlen($value->id);

                            if ($length == 1) {
                                $package_unique_id = '#MD00000' . $value->id;
                            } elseif ($length == 2) {
                                $package_unique_id = '#MD0000' . $value->id;
                            } elseif ($length == 3) {
                                $package_unique_id = '#MD000' . $value->id;
                            } elseif ($length == 4) {
                                $package_unique_id = '#MD00' . $value->id;
                            } elseif ($length == 5) {
                                $package_unique_id = '#MD0' . $value->id;
                            } else {
                                $package_unique_id = '#MD' . $value->id;
                            }

                            $update_unique_id = Packages::where('id', $value->id)->update(['package_unique_no' => $package_unique_id]);
                        }
                    }

                    if (!empty($AddPackages)) {
                        // if (($request->platform_type=='web')) {
                        //     return redirect('/medical-packages')->with('success','Package created successfully in active packages.');
                        // }
                        return response()->json([
                            'status' => 200,
                            'message' => 'Package created successfully in active packages.',
                        ]);
                    } else {
                        // if (($request->platform_type=='web')) {
                        //     return redirect('/medical-packages')->with('error','Package not created in active packages.');
                        // }
                        return response()->json([
                            'status' => 404,
                            'message' => 'Package not created in active packages.',
                        ]);
                    }
                } else {
                    $package_input = [];
                    $package_input['package_name'] = $request->package_name;
                    $package_input['treatment_category_id'] = $request->treatment_category_id;
                    $package_input['treatment_id'] = $request->treatment_id;
                    $package_input['other_services'] = $request->other_services;
                    $package_input['treatment_period_in_days'] = $request->treatment_period_in_days;
                    $package_input['treatment_price'] = $request->treatment_price;
                    $package_input['hotel_id'] = $request->hotel_id;
                    $package_input['hotel_in_time'] = $request->hotel_in_time;
                    $package_input['hotel_out_time'] = $request->hotel_out_time;
                    $package_input['hotel_acommodition_price'] = $request->hotel_acommodition_price;
                    $package_input['vehicle_id'] = $request->vehicle_id;
                    $package_input['vehicle_in_time'] = $request->vehicle_in_time;
                    $package_input['tour_id'] = $request->tour_id;
                    $package_input['tour_in_time'] = $request->tour_in_time;
                    $package_input['tour_price'] = $request->tour_price;
                    $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                    $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                    $package_input['visa_details'] = $request->visa_details;
                    $package_input['visa_service_price'] = $request->visa_service_price;
                    $package_input['ambulance_service_price'] = $request->ambulance_service_price;
                    $package_input['ticket_price'] = $request->ticket_price;
                    $package_input['package_discount'] = $request->package_discount;
                    $package_input['package_discount'] = $request->package_discount;
                    $package_input['package_price'] = $request->package_price;
                    $package_input['sale_price'] = $request->sale_price;
                    $package_input['platform_type'] = $request->platform_type;
                    $package_input['status'] = $request->button_type;
                    $package_input['created_by'] = Auth::user()->id;
                    $AddPackages = Packages::create($package_input);
                    $Packages = Packages::select('id')->get();
                    if (!empty($Packages)) {
                        foreach ($Packages as $key => $value) {

                            $length = strlen($value->id);

                            if ($length == 1) {
                                $package_unique_id = '#MD00000' . $value->id;
                            } elseif ($length == 2) {
                                $package_unique_id = '#MD0000' . $value->id;
                            } elseif ($length == 3) {
                                $package_unique_id = '#MD000' . $value->id;
                            } elseif ($length == 4) {
                                $package_unique_id = '#MD00' . $value->id;
                            } elseif ($length == 5) {
                                $package_unique_id = '#MD0' . $value->id;
                            } else {
                                $package_unique_id = '#MD' . $value->id;
                            }

                            $update_unique_id = Packages::where('id', $value->id)->update(['package_unique_no' => $package_unique_id]);
                        }
                    }
                    if (!empty($AddPackages)) {
                        // if (($request->platform_type=='web')) {
                        //     return redirect('/medical-packages')->with('success','Package created successfully in de-activate packages.');
                        // }
                        return response()->json([
                            'status' => 200,
                            'message' => 'Package created successfully in de-activate packages.',
                        ]);
                    } else {
                        // if (($request->platform_type=='web')) {
                        //     return redirect('/medical-packages')->with('error','Package not created in de-activate packages.');
                        // }
                        return response()->json([
                            'status' => 404,
                            'message' => 'Package not created in de-activate packages.',
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'please click button type either active or inactive',
                ]);
            }
        } else {
            // if (($request->platform_type == 'web')) {
            //     return redirect('/medical-packages')->with('error', 'package name already exist');
            // }
            return response()->json([
                'status' => 404,
                'message' => 'package name already exist',
            ]);
        }
    }

    public function packages_active_list()
    {
        $packages_active_list = Packages::where('md_packages.status', 'active')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.status',
            )
            ->where('created_by', Auth::user()->id)
            ->get();


        if (!empty($packages_active_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'active package details found.',
                'packages_active_list' => $packages_active_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function packages_deactive_list()
    {
        $packages_deactive_list = Packages::where('md_packages.status', 'inactive')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.status',
            )
            ->where('created_by', Auth::user()->id)
            ->get();

        if (!empty($packages_deactive_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'de-activate package details found.',
                'packages_deactive_list' => $packages_deactive_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function packages_view_active_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $packages_active_list = Packages::where('md_packages.status', '!=', 'delete')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.city_id',
                'md_packages.package_name',
                'md_packages.treatment_category_id',
                'md_packages.treatment_id',
                'md_packages.other_services',
                'md_packages.treatment_period_in_days',
                'md_packages.treatment_price',
                'md_packages.hotel_id',
                'md_packages.hotel_in_time',
                'md_packages.hotel_out_time',
                'md_packages.hotel_acommodition_price',
                'md_packages.vehicle_id',
                'md_packages.vehicle_in_time',
                'md_packages.tour_id',
                'md_packages.tour_price',
                'md_packages.tour_in_time',
                'md_packages.vehicle_out_time',
                'md_packages.transportation_acommodition_price',
                'md_packages.visa_details',
                'md_packages.visa_service_price',
                'md_packages.translation_price',
                'md_packages.ambulance_service_price',
                'md_packages.ticket_price',
                'md_packages.package_discount',
                'md_packages.package_price',
                'md_packages.sale_price',
                'md_packages.platform_type',
                'md_packages.status',
                'md_add_new_acommodition.hotel_name',
                'md_add_transportation_details.vehicle_model_id',
                'md_product_category.product_category_name',
                'md_product_sub_category.product_sub_category_name'
            )
            ->leftjoin('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
            ->leftjoin('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
            ->join('md_product_category', 'md_product_category.id', '=', 'md_packages.treatment_category_id')
            ->join('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->where('md_packages.id', $request->id)
            ->first();


        if (!empty($packages_active_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'view active package details found.',
                'packages_active_list' => $packages_active_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function packages_view_deactive_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $packages_deactive_list = Packages::where('md_packages.status', 'inactive')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.city_id',
                'md_packages.package_name',
                'md_packages.treatment_category_id',
                'md_packages.treatment_id',
                'md_packages.other_services',
                'md_packages.treatment_period_in_days',
                'md_packages.treatment_price',
                'md_packages.hotel_id',
                'md_packages.hotel_in_time',
                'md_packages.hotel_out_time',
                'md_packages.hotel_acommodition_price',
                'md_packages.vehicle_id',
                'md_packages.vehicle_in_time',
                'md_packages.vehicle_out_time',
                'md_packages.tour_id',
                'md_packages.tour_price',
                'md_packages.tour_in_time',
                'md_packages.transportation_acommodition_price',
                'md_packages.visa_details',
                'md_packages.visa_service_price',
                'md_packages.ticket_price',
                'md_packages.package_discount',
                'md_packages.package_price',
                'md_packages.sale_price',
                'md_packages.platform_type',
                'md_packages.status',
                'md_add_new_acommodition.hotel_name',
                'md_add_transportation_details.vehicle_model_id',
            )
            ->join('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
            ->join('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
            ->where('md_packages.id', $request->id)
            ->first();

        if (!empty($packages_deactive_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'view de-activate package details found.',
                'packages_deactive_list' => $packages_deactive_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. details not found.',
            ]);
        }
    }


    public function edit_packages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        // if (empty($package_exist_or_not)) {
        if (!empty($request->button_type)) {
            if ($request->button_type == 'active') {
                $package_input = [];
                $package_input['package_name'] = $request->package_name;
                $package_input['treatment_category_id'] = $request->treatment_category_id;
                $package_input['treatment_id'] = $request->treatment_id;
                $package_input['other_services'] = $request->other_services;
                $package_input['treatment_period_in_days'] = $request->treatment_period_in_days;
                $package_input['treatment_price'] = $request->treatment_price;
                $package_input['hotel_id'] = $request->hotel_id;
                $package_input['hotel_in_time'] = $request->hotel_in_time;
                $package_input['hotel_out_time'] = $request->hotel_out_time;
                $package_input['hotel_acommodition_price'] = $request->hotel_acommodition_price;
                $package_input['vehicle_id'] = $request->vehicle_id;
                $package_input['vehicle_in_time'] = $request->vehicle_in_time;
                $package_input['tour_id'] = $request->tour_id;
                $package_input['tour_in_time'] = $request->tour_in_time;
                $package_input['tour_price'] = $request->tour_price;
                $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                $package_input['visa_details'] = $request->visa_details;
                $package_input['visa_service_price'] = $request->visa_service_price;
                $package_input['ambulance_service_price'] = $request->ambulance_service_price;
                $package_input['ticket_price'] = $request->ticket_price;
                $package_input['package_discount'] = $request->package_discount;
                $package_input['package_discount'] = $request->package_discount;
                $package_input['package_price'] = $request->package_price;
                $package_input['sale_price'] = $request->sale_price;
                $package_input['status'] = 'active';
                $package_input['platform_type'] = $request->platform_type;
                $package_input['created_by'] = Auth::user()->id;
                $edit_packages = Packages::where('id', $request->id)->update($package_input);
                if (!empty($edit_packages)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Package updated successfully.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Package not updated.something went wrong',
                    ]);
                }
            } else {
                $package_input = [];
                $package_input['package_name'] = $request->package_name;
                $package_input['treatment_category_id'] = $request->treatment_category_id;
                $package_input['treatment_id'] = $request->treatment_id;
                $package_input['other_services'] = $request->other_services;
                $package_input['treatment_period_in_days'] = $request->treatment_period_in_days;
                $package_input['treatment_price'] = $request->treatment_price;
                $package_input['hotel_id'] = $request->hotel_id;
                $package_input['hotel_in_time'] = $request->hotel_in_time;
                $package_input['hotel_out_time'] = $request->hotel_out_time;
                $package_input['hotel_acommodition_price'] = $request->hotel_acommodition_price;
                $package_input['vehicle_id'] = $request->vehicle_id;
                $package_input['vehicle_in_time'] = $request->vehicle_in_time;
                $package_input['tour_id'] = $request->tour_id;
                $package_input['tour_in_time'] = $request->tour_in_time;
                $package_input['tour_price'] = $request->tour_price;
                $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                $package_input['visa_details'] = $request->visa_details;
                $package_input['visa_service_price'] = $request->visa_service_price;
                $package_input['ambulance_service_price'] = $request->ambulance_service_price;
                $package_input['ticket_price'] = $request->ticket_price;
                $package_input['package_discount'] = $request->package_discount;
                $package_input['package_discount'] = $request->package_discount;
                $package_input['package_price'] = $request->package_price;
                $package_input['sale_price'] = $request->sale_price;
                $package_input['platform_type'] = $request->platform_type;
                $package_input['status'] = 'inactive';
                $package_input['created_by'] = Auth::user()->id;
                $edit_packages = Packages::where('id', $request->id)->update($package_input);
                if (!empty($edit_packages)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Package updated successfully.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Package not updated.something went wrong',
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'please click button type either active or inactive',
            ]);
        }
        // } else {
        //     return response()->json([
        //         'status' => 404,
        //         'message' => 'package name already exist',
        //     ]);
        // }
    }

    public function activate_to_deactivate_packages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $status_update['status'] = 'inactive';
        $status_update['modified_by'] = Auth::user()->id;
        $status_update['modified_ip_address'] = $request->ip();

        $activate_to_deactive_packages = Packages::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'package is added in deactive list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. package not added.',
            ]);
        }
    }


    public function deactivate_to_activate_packages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $status_update['status'] = 'active';
        $status_update['modified_by'] = Auth::user()->id;
        $status_update['modified_ip_address'] = $request->ip();

        $activate_to_deactive_packages = Packages::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'package is added in active list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. package not added.',
            ]);
        }
    }


    public function get_acommodition_price(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $hotel_price = AddNewAcommodition::where('status', 'active')
            ->select('id', 'hotel_per_night_price')
            ->where('id', $request->id)
            ->first();

        if (!empty($hotel_price)) {
            return response()->json([
                'status' => 200,
                'price' => $hotel_price,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function get_transportation_price(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $hotel_price = TransportationDetails::where('status', 'active')
            ->select('id', 'vehicle_per_day_price')
            ->where('id', $request->id)
            ->first();

        if (!empty($hotel_price)) {
            return response()->json([
                'status' => 200,
                'price' => $hotel_price,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function get_tour_price(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $tour_price = ToursDetails::where('status', 'active')
            ->select('id', 'tour_price')
            ->where('id', $request->id)
            ->first();

        if (!empty($tour_price)) {
            return response()->json([
                'status' => 200,
                'price' => $tour_price,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function packages_active_list_search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $packages_active_list_search = Packages::where('md_packages.status', 'active')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.status',
            )
            ->where('md_packages.package_name', 'like', '%' . $request->package_name . '%')
            // ->where('created_by', Auth::user()->id)
            ->get();

        if (!empty($packages_active_list_search)) {
            return response()->json([
                'status' => 200,
                'message' => 'package list found.',
                'packages_deactive_list' => $packages_active_list_search,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. list not found.',
            ]);
        }
    }


    public function packages_inactive_list_search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $packages_inactive_list_search = Packages::where('md_packages.status', 'inactive')
            ->select(
                'md_packages.id',
                'md_packages.package_unique_no',
                'md_packages.package_name',
                'md_packages.status',
            )
            ->where('md_packages.package_name', 'like', '%' . $request->package_name . '%')
            // ->where('created_by', Auth::user()->id)
            ->get();

        if (!empty($packages_inactive_list_search)) {
            return response()->json([
                'status' => 200,
                'message' => 'package list found.',
                'packages_deactive_list' => $packages_inactive_list_search,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. list not found.',
            ]);
        }
    }
}
