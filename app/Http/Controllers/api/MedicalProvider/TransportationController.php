<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use App\Models\TransportationDetails;
use App\Models\VehicleBrand;
use App\Models\ComfortLevels;
use Auth;


class TransportationController extends BaseController
{
    // master_brands
    public function master_brands()
    {
        $brands = VehicleBrand::where('status', 'active')
            ->orderBy('brand_name', 'asc')
            ->select('id', 'brand_name', 'status')
            ->get();

        if (!empty($brands)) {
            return response()->json([
                'status' => 200,
                'message' => 'brands list found.',
                'data' => $brands,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'brands list is empty.',
            ]);
        }
    }

    //master comfort levels
    public function comfort_levels_master()
    {
        $ComfortLevels = ComfortLevels::where('status', 'active')
            ->orderBy('vehicle_level_name', 'asc')
            ->select('id', 'vehicle_level_name', 'status')
            ->get();

        if (!empty($ComfortLevels)) {
            return response()->json([
                'status' => 200,
                'message' => 'Comfort Levels list found.',
                'data' => $ComfortLevels,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Comfort Levels list is empty.',
            ]);
        }
    }

    public function transportation_list()
    {
        $TransportationDetails = TransportationDetails::where('md_add_transportation_details.status', '!=', 'delete')
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
            ->where('md_add_transportation_details.created_by',Auth::user()->id) // Assuming user_id is the column containing the user's ID
            ->get();

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

    //add_transportation_details
    public function add_transportation_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_brand_id' => 'required',
            'vehicle_model_name' => 'required',
            'comfort_level_id' => 'required',
            'vehicle_per_day_price' => 'required',
            'other_services' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if ($request->button_type == 'active') {
            $vehicle_input = [];
            $vehicle_input['vehicle_brand_id'] = $request->vehicle_brand_id;
            $vehicle_input['vehicle_model_id'] = $request->vehicle_model_name;
            $vehicle_input['comfort_level_id'] = $request->comfort_level_id;
            $vehicle_input['status'] = 'active';
            $vehicle_input['vehicle_per_day_price'] = $request->vehicle_per_day_price;
            $vehicle_input['other_services'] = $request->other_services;
            $vehicle_input['created_by'] = 1;
            $TransportationDetails = TransportationDetails::create($vehicle_input);
            if (!empty($TransportationDetails)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Transportation Details created successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Transportation Details not created.',
                ]);
            }
        } else {
            $vehicle_input = [];
            $vehicle_input['vehicle_brand_id'] = $request->vehicle_brand_id;
            $vehicle_input['vehicle_model_id'] = $request->vehicle_model_name;
            $vehicle_input['comfort_level_id'] = $request->comfort_level_id;
            $vehicle_input['vehicle_per_day_price'] = $request->vehicle_per_day_price;
            $vehicle_input['other_services'] = $request->other_services;
            $vehicle_input['status'] = 'inactive';
            $vehicle_input['created_by'] = 1;
            $TransportationDetails = TransportationDetails::create($vehicle_input);
            if (!empty($TransportationDetails)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Transportation Details created successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Transportation Details not created.',
                ]);
            }
        }
    }


    public function edit_transportation_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transportation_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if ($request->button_type == 'active') {
            $vehicle_input = [];
            $vehicle_input['vehicle_brand_id'] = $request->vehicle_brand_id;
            $vehicle_input['vehicle_model_id'] = $request->vehicle_model_name;
            $vehicle_input['comfort_level_id'] = $request->comfort_level_id;
            $vehicle_input['status'] = 'active';
            $vehicle_input['vehicle_per_day_price'] = $request->vehicle_per_day_price;
            $vehicle_input['other_services'] = $request->other_services;
            $vehicle_input['created_by'] = 1;
            $TransportationDetails = TransportationDetails::where('id', $request->transportation_id)->update($vehicle_input);

            if (!empty($TransportationDetails)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Transportation Details updated successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong. Details not updated.',
                ]);
            }
        } else {
            $vehicle_input = [];
            $vehicle_input['vehicle_brand_id'] = $request->vehicle_brand_id;
            $vehicle_input['vehicle_model_id'] = $request->vehicle_model_name;
            $vehicle_input['comfort_level_id'] = $request->comfort_level_id;
            $vehicle_input['status'] = 'inactive';
            $vehicle_input['vehicle_per_day_price'] = $request->vehicle_per_day_price;
            $vehicle_input['other_services'] = $request->other_services;
            $vehicle_input['created_by'] = 1;
            $TransportationDetails = TransportationDetails::where('id', $request->transportation_id)->update($vehicle_input);

            if (!empty($TransportationDetails)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Transportation Details updated successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong. Details not updated.',
                ]);
            }
        }
    }

    public function delete_transportation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transportation_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $status_update['status'] = 'delete';
        $status_update['modified_by'] = 1;
        $status_update['modified_ip_address'] = $request->ip();

        $delete_transportation = TransportationDetails::where('id', $request->transportation_id)->update($status_update);
        if (!empty($delete_transportation)) {
            return response()->json([
                'status' => 200,
                'message' => 'Transportation Details deleted successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not deleted.',
            ]);
        }
    }
}
