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


class PackageControllers extends BaseController
{
    //
    public function add_packages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'treatment_category_id' => 'required',
            'treatment_id' => 'required',
            'package_price' => 'required',
            'platform_type' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $package_exist_or_not=Packages::where('status','active')
        ->where('package_name', $request->package_name)
        ->first();
        // return $package_exist_or_not;

       if(empty($package_exist_or_not)){
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
                    $package_input['visa_details'] = $request->visa_details;
                    $package_input['visa_service_price'] = $request->visa_service_price;
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
                        return response()->json([
                            'status' => 200,
                            'message' => 'Package created successfully in active packages.',
                        ]);
                    } else {
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
                    $package_input['vehicle_out_time'] = $request->vehicle_out_time;
                    $package_input['transportation_acommodition_price'] = $request->transportation_acommodition_price;
                    $package_input['visa_details'] = $request->visa_details;
                    $package_input['visa_service_price'] = $request->visa_service_price;
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
                        return response()->json([
                            'status' => 200,
                            'message' => 'Package created successfully in de-activate packages.',
                        ]);
                    } else {
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

       }else{
            return response()->json([
                'status' => 404,
                'message' => 'package name already exist',
            ]);
       }
    }

    public function packages_active_list()
    {
        $packages_active_list=Packages::where('md_packages.status','active')
        ->select(
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
            'md_packages.transportation_acommodition_price',
            'md_packages.visa_details',
            'md_packages.visa_service_price',
            'md_packages.package_discount',
            'md_packages.package_price',
            'md_packages.sale_price',
            'md_packages.platform_type',
            'md_packages.status',
            'md_add_new_acommodition.hotel_name',
            // 'md_add_transportation_details.vehicle_model_id',
        )
        ->join('md_add_new_acommodition', 'md_add_new_acommodition.id', 'md_packages.hotel_id')
        // ->join('md_add_transportation_details', 'md_add_transportation_details.id', 'md_packages.vehicle_id')
        // ->where('created_by',)
        ->toSql();
        return  $packages_active_list;

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
        $packages_deactive_list = Packages::where('status', 'inactive')
        ->select(
            'package_unique_no',
            'city_id',
            'package_name',
            'treatment_category_id',
            'treatment_id',
            'other_services',
            'treatment_period_in_days',
            'treatment_price',
            'hotel_id',
            'hotel_in_time',
            'hotel_out_time',
            'hotel_acommodition_price',
            'vehicle_id',
            'vehicle_in_time',
            'vehicle_out_time',
            'transportation_acommodition_price',
            'visa_details',
            'visa_service_price',
            'package_discount',
            'package_price',
            'sale_price',
            'platform_type',
            'status',
        )
            // ->where('created_by',)
            ->get();

        if (!empty($packages_deactive_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'de-active package details found.',
                'packages_deactive_list' => $packages_deactive_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

}

    