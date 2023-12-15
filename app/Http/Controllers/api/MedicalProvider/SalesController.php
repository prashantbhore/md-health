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

class SalesController extends Controller
{


    public function active_treatment_list()
    {
         $active_treatment_list =CustomerPurchaseDetails::whereIn('purchase_type', ['pending', 'inprogress'])
         ->with(['customer'])
         ->get();


        if (!empty($active_treatment_list)){
            return response()->json([
                'status' => 200,
                'message' => 'active treatment list found.',
                'packages_active_list' =>$active_treatment_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. active treatment list not found.',
            ]);
        }
    }
    
}
