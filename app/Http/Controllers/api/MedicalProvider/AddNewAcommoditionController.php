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
use Storage;

class AddNewAcommoditionController extends BaseController
{
    use MediaTrait;

    //add_new_acommodition
    public function add_new_acommodition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'hotel_stars' => 'required',
            // 'hotel_image_path' => 'required',
            'hotel_per_night_price' => 'required',
            'hotel_other_services' => 'required',
            'button_type' => 'required',
        ]);



        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->button_type == 'active') {
            $hotel_input = [];
            $hotel_input['hotel_name'] = $request->hotel_name;
            $hotel_input['hotel_address'] = $request->hotel_address;
            $hotel_input['hotel_stars'] = $request->hotel_stars;
            if ($request->has('hotel_image_path')) {
                $hotel_input['hotel_image_path'] = $this->verifyAndUpload($request, 'hotel_image_path', 'hotel_images');
                $original_name = $request->file('hotel_image_path')->getClientOriginalName();
                $hotel_input['hotel_image_name'] = $original_name;
            }
            $hotel_input['hotel_per_night_price'] = $request->hotel_per_night_price;
            $hotel_input['hotel_other_services'] = $request->hotel_other_services;
            $hotel_input['status'] = 'active';
            $hotel_input['service_provider_id'] =  1;
            $hotel_input['created_by'] = 1;
            $AddNewAcommodition = AddNewAcommodition::create($hotel_input);
            if (!empty($AddNewAcommodition)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Hotel Acommodition created successfully.',
                    'AddNewAcommodition' => $AddNewAcommodition,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Acommodition not created.',
                ]);
            }
        } else {

            $hotel_input = [];
            $hotel_input['hotel_name'] = $request->hotel_name;
            $hotel_input['hotel_address'] = $request->hotel_address;
            $hotel_input['hotel_stars'] = $request->hotel_stars;
            if ($request->has('hotel_image_path')) {
                $hotel_input['hotel_image_path'] = $this->verifyAndUpload($request, 'hotel_image_path', 'hotel_images');
                $original_name = $request->file('hotel_image_path')->getClientOriginalName();
                $hotel_input['hotel_image_name'] = $original_name;
            }
            $hotel_input['hotel_per_night_price'] = $request->hotel_per_night_price;
            $hotel_input['hotel_other_services'] = $request->hotel_other_services;
            $hotel_input['status'] = 'inactive';
            $hotel_input['service_provider_id'] =  1;
            $hotel_input['created_by'] = 1;
            $AddNewAcommodition = AddNewAcommodition::create($hotel_input);
            if (!empty($AddNewAcommodition)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Hotel Acommodition created successfully.',
                    'AddNewAcommodition' => $AddNewAcommodition,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Acommodition not created.',
                ]);
            }
        }
    }


    public function hotel_list()
    {
        $AcommoditionHotelList = AddNewAcommodition::where('status', '!=', 'delete')
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
                'status',
            )
            ->get();
        if (!empty($AcommoditionHotelList)) {
            foreach ($AcommoditionHotelList as $key => $value) {
                $AcommoditionHotelList[$key]['hotel_name'] = ($value->hotel_name);
                $AcommoditionHotelList[$key]['hotel_address'] = ($value->hotel_address);
                $AcommoditionHotelList[$key]['hotel_stars'] = ($value->hotel_stars);
                $AcommoditionHotelList[$key]['hotel_image_path'] = url('/') . Storage::url($value->hotel_image_path);
                $AcommoditionHotelList[$key]['hotel_per_night_price'] = ($value->hotel_per_night_price);
                $AcommoditionHotelList[$key]['hotel_other_services'] = ($value->hotel_other_services);
            }
        }


        if (!empty($AcommoditionHotelList)) {
            return response()->json([
                'status' => 200,
                'message' => 'Hotel details found.',
                'hotel_details' => $AcommoditionHotelList,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function edit_hotel_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (empty($request->hotel_id)) {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not updated.',
            ]);
        }
        if ($request->button_type == 'active') {
            $hotel_input = [];
            $hotel_input['hotel_name'] = $request->hotel_name;
            $hotel_input['hotel_address'] = $request->hotel_address;
            $hotel_input['hotel_stars'] = $request->hotel_stars;
            if ($request->has('hotel_image_path')) {
                $hotel_input['hotel_image_path'] = $this->verifyAndUpload($request, 'hotel_image_path', 'hotel_images');
                $original_name = $request->file('hotel_image_path')->getClientOriginalName();
                $hotel_input['hotel_image_name'] = $original_name;
            }
            $hotel_input['hotel_per_night_price'] = $request->hotel_per_night_price;
            $hotel_input['hotel_other_services'] = $request->hotel_other_services;
            $hotel_input['status'] = 'active';
            $hotel_input['service_provider_id'] = 1;
            $hotel_input['created_by'] = 1;

            $edit_hotel = AddNewAcommodition::where('id', $request->hotel_id)->update($hotel_input);

            if (!empty($edit_hotel)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Hotel details updated successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong. Details not updated.',
                ]);
            }
        } else {
            $hotel_input = [];
            $hotel_input['hotel_name'] = $request->hotel_name;
            $hotel_input['hotel_address'] = $request->hotel_address;
            $hotel_input['hotel_stars'] = $request->hotel_stars;
            if ($request->has('hotel_image_path')) {
                $hotel_input['hotel_image_path'] = $this->verifyAndUpload($request, 'hotel_image_path', 'hotel_images');
                $original_name = $request->file('hotel_image_path')->getClientOriginalName();
                $hotel_input['hotel_image_name'] = $original_name;
            }
            $hotel_input['hotel_per_night_price'] = $request->hotel_per_night_price;
            $hotel_input['hotel_other_services'] = $request->hotel_other_services;
            $hotel_input['status'] = 'inactive';
            $hotel_input['service_provider_id'] = 1;
            $hotel_input['created_by'] = 1;

            $edit_hotel = AddNewAcommodition::where('id', $request->hotel_id)->update($hotel_input);

            if (!empty($edit_hotel)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Hotel details updated successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Something went wrong. Details not updated.',
                ]);
            }
        }
    }

    public function delete_hotel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $status_update['status'] = 'delete';
        $status_update['modified_by'] = 1;
        $status_update['modified_ip_address'] = $request->ip();

        $delete_hotel = AddNewAcommodition::where('id', $request->hotel_id)->update($status_update);
        if (!empty($delete_hotel)) {
            return response()->json([
                'status' => 200,
                'message' => 'Hotel details deleted successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not deleted.',
            ]);
        }
    }
}
