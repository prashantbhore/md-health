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
}
