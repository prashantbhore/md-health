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
    use MediaTrait;

    //
    public function add_food_packages(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     // 'package_name' => 'required',
        //     // 'food_type_id' => 'required',
        //     // 'calories' => 'required',
        //     // 'food_description' => 'required',
        //     'button_type' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

         if(empty($request->package_id))
         {
                    $package_input = [];
                    $package_input['package_name'] = $request->package_name;
                    $package_input['food_type_id'] = $request->food_type_id;
                    $package_input['calories'] = $request->calories;
                    $package_input['food_description'] = $request->food_description;
                    $package_input['created_by'] = Auth::user()->id;

                    $FoodPackages = FoodPackages::create($package_input);

                    $Packages = FoodPackages::select('id')->get();
                    if (!empty($Packages)) {
                        foreach ($Packages as $key => $value) {

                            $length = strlen($value->id);

                            if ($length == 1) {
                                $package_unique_id = '#MDF00D' . $value->id;
                            } elseif ($length == 2) {
                                $package_unique_id = '#MDF00D' . $value->id;
                            } elseif ($length == 3) {
                                $package_unique_id = '#MDF00D' . $value->id;
                            } elseif ($length == 4) {
                                $package_unique_id = '#MDF00D' . $value->id;
                            } elseif ($length == 5) {
                                $package_unique_id = '#MDF00D' . $value->id;
                            } else {
                                $package_unique_id = '#MD' . $value->id;
                            }

                            $update_unique_id = FoodPackages::where('id', $value->id)->update(['unique_id' => $package_unique_id]);
                        }
                    }
                    if ($request->has('food_image_path')) {
                        if ($files = $request->file('food_image_path')) {
                            // $files=[];
                            foreach ($files as $file) {
                                $accout_images = new PackagesMultipleImages;
                                $accout_images['package_id'] = $FoodPackages->id;
                                $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                $original_name = $file->getClientOriginalName();
                                $filePath = $file->storeAs('public/foodpackage', $filename);
                                $accout_images['food_image_path'] = $filePath;
                                $accout_images['food_image_name'] = $original_name;
                                $accout_images['modified_by'] = Auth::user()->id;
                                $accout_images['modified_ip_address'] = $request->ip();
                                $accout_images->save();
                            }
                        }
                    }

                    if (!empty($FoodPackages)) {
                        $food_menus = [];
                        $food_menus['package_id'] = $FoodPackages->id;
                        $food_menus['days'] = $request->days;
                        $food_menus['calories'] = $request->calories;
                        $food_menus['meal_type'] = $request->meal_type;

                        if ($request->file('menu_image_path')) {
                            $food_menus['menu_image_path'] = $this->verifyAndUpload($request, 'menu_image_path', 'menu_images');
                            $original_name = $request->file('menu_image_path')->getClientOriginalName();
                            $food_menus['menu_image_name'] = $original_name;
                        }
                        $food_menus['menu'] = $request->menu;
                        $food_menus['created_by'] = Auth::user()->id;

                        $FoodMenus = FoodMenus::create($food_menus);

                        if (!empty($FoodMenus)) {
                            return response()->json([
                                'status' => 200,
                                'message' => 'menu created successfully in active list.',
                                'id' => $FoodPackages->id,
                                'data' => $FoodPackages,
                            ]);
                        } else {
                            return response()->json([
                                'status' => 404,
                                'message' => 'Something went wrong.',
                            ]);
                        }
                    }
                }else{
                    $food_menus['package_id'] = $request->package_id;

                    $food_menus['days'] = $request->days;
                    $food_menus['calories'] = $request->calories;
                    $food_menus['meal_type'] = $request->meal_type;

                    if ($request->file('menu_image_path')) {
                        $food_menus['menu_image_path'] = $this->verifyAndUpload($request, 'menu_image_path', 'menu_images');
                        $original_name = $request->file('menu_image_path')->getClientOriginalName();
                        $food_menus['menu_image_name'] = $original_name;
                    }
                    $food_menus['menu'] = $request->menu;
                    $food_menus['created_by'] = Auth::user()->id;

                    $FoodMenus = FoodMenus::create($food_menus);
                    if (!empty($FoodMenus)) {
                        return response()->json([
                            'status' => 200,
                            'message' => 'Menu created successfully in active list..',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 404,
                            'message' => 'Something went wrong.',
                        ]);
                    }
                }
    }


    public function add_food_packages_with_price(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'button_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if(!empty($request->button_type))
        {
             if($request->button_type=='active')
             {
                $package_input = [];
                $package_input['breakfast_price'] = $request->breakfast_price;
                $package_input['lunch_price'] = $request->lunch_price;
                $package_input['dinner_price'] = $request->dinner_price;
                $package_input['package_price'] = $request->package_price;
                $package_input['sales_price'] = $request->sales_price;
                // $package_input['featured_request'] = $request->featured_request;
                $FoodPackages=FoodPackages::where('id',$request->package_id)->update($package_input);
                if (!empty($FoodPackages)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Package created successfully in active list..',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Something went wrong.',
                    ]);
                }
             }
             else
             {
                $package_input = [];
                $package_input['breakfast_price'] = $request->breakfast_price;
                $package_input['lunch_price'] = $request->lunch_price;
                $package_input['dinner_price'] = $request->dinner_price;
                $package_input['package_price'] = $request->package_price;
                $package_input['sales_price'] = $request->sales_price;
                // $package_input['featured_request'] = $request->featured_request;
                $package_input['status'] = 'inactive';
                $FoodPackages=FoodPackages::where('id', $request->package_id)->update($package_input);
                if (!empty($FoodPackages)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Package created successfully in active list..',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Something went wrong.',
                    ]);
                }
             }
        }
    }

    public function food_packages_menu_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $FoodMenus=FoodMenus::where('status','active')
        ->select(
            'id',
            'package_id',
            'days',
            'calories',
            'meal_type',
            // 'menu_image_path',
            // 'menu_image_name',
            'menu')
        // ->where('created_by',Auth::user()->id)
        ->where('package_id',$request->package_id)
        ->get();


        if (!empty($FoodMenus)) 
        {
            return response()->json([
                'status' => 200,
                'message' => 'Menu details found.',
                'food_menus' => $FoodMenus,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }

    }


    public function food_edit_menu_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $FoodMenus = FoodMenus::where('status', 'active')
        ->select(
            'id',
            'package_id',
            'days',
            'calories',
            'meal_type',
            // 'menu_image_path',
            // 'menu_image_name',
            'menu'
        )
            // ->where('created_by',Auth::user()->id)
        ->where('id', $request->id)
        ->where('package_id', $request->package_id)
        ->first();

        if (!empty($FoodMenus)) {
            return response()->json([
                'status' => 200,
                'message' => 'Menu details found.',
                'food_menus' => $FoodMenus,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Details not found.',
            ]);
        }
    }

    public function food_edit_menu(Request $request)
    {

        $food_menus = [];
        $food_menus['days'] = $request->days;
        $food_menus['calories'] = $request->calories;
        $food_menus['meal_type'] = $request->meal_type;

        if ($request->file('menu_image_path')) {
            $food_menus['menu_image_path'] = $this->verifyAndUpload($request, 'menu_image_path', 'menu_images');
            $original_name = $request->file('menu_image_path')->getClientOriginalName();
            $food_menus['menu_image_name'] = $original_name;
        }

        $food_menus['menu'] = $request->menu;
        $food_menus['created_by'] = Auth::user()->id;

        $FoodMenus =FoodMenus::where('id', $request->id)->update($food_menus);
        if (!empty($FoodMenus)) {
            return response()->json([
                'status' => 200,
                'message' => 'Menu updated successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function food_delete_menu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $food_menus = [];
        $food_menus['status'] = 'inactive';
        $FoodMenus = FoodMenus::where('id', $request->id)->update($food_menus);
        
        if (!empty($FoodMenus)) {
            return response()->json([
                'status' => 200,
                'message' => 'Menu deleted successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function food_active_list()
    {
        $FoodPackages=FoodPackages::where('status','active')
        ->select('unique_id','package_name')
        ->where('created_by',Auth::user()->id)
        ->get();

        if (!empty($FoodPackages)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your active list.',
                'data'=> $FoodPackages
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function food_deactive_list()
    {
        $FoodPackages = FoodPackages::where('status', 'inactive')
        ->select('unique_id', 'package_name')
        ->where('created_by', Auth::user()->id)
        ->get();

        if (!empty($FoodPackages)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your active list.',
                'data' => $FoodPackages
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function active_list_to_deactive(Request $request)
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

        $activate_to_deactive_packages = FoodPackages::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'food is added in in-active list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong..',
            ]);
        }
    }

    public function deactive_list_to_active(Request $request)
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

        $activate_to_deactive_packages = FoodPackages::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'food is added in active list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong..',
            ]);
        }
    }
}
