<?php

namespace App\Http\Controllers\api\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Storage;
use App\Models\FoodMenus;
use App\Models\FoodPackages;
use App\Models\PackagesMultipleImages;


class FoodPackageController extends BaseController
{
    //
    public function add_food_packages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'food_type_id' => 'required',
            'calories' => 'required',
            'food_description' => 'required',
            // 'package_price' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (!empty($request->button_type)) {
            if ($request->button_type == 'active') {
                $package_input = [];
                $package_input['package_name'] = $request->package_name;
                $package_input['food_type_id'] = $request->food_type_id;
                $package_input['calories'] = $request->calories;
                $package_input['food_description'] = $request->food_description;
                $package_input['package_name'] = $request->package_name;
                $FoodPackages=FoodPackages::create($package_input);
                $package_images = [];

                if ($request->file('food_image_path')) {
                    $package_images['food_image_path'] = $this->verifyAndUpload($request, 'food_image_path', 'hotel_images');
                    $original_name = $request->file('food_image_path')->getClientOriginalName();
                    $package_images['food_image_name'] = $original_name;
                }
                $PackagesMultipleImages = PackagesMultipleImages::create($package_images);
                if(!empty($FoodPackages))
                {   
                    
                    FoodMenus::create();
                }
            }else{

            }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'please click button type either active or inactive',
            ]);
        }

    }
}
