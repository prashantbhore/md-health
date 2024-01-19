<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchaseDetails;
use Illuminate\Support\Facades\Auth;


class MedicalProviderDashboradController extends Controller
{

    public function monthlyOrders()
    {
        $monthlyOrders = CustomerPurchaseDetails::where('provider_id', Auth::user()->id)
            ->whereMonth('created_at', now()->month)
            ->count();

        
       return response()->json(['monthly_orders' => $monthlyOrders]);
    }


    public function monthlySales()
    {
        
        $monthlySales = CustomerPurchaseDetails::where('provider_id', Auth::user()->id)
            ->whereMonth('created_at', now()->month)
            ->sum('paid_amount');

        return response()->json(['monthly_sales' => $monthlySales]);
    }



    
    public function latestOrders()
    {
       
        $latestOrders = CustomerPurchaseDetails::where('provider_id', Auth::user()->id)->where('purchase_type','pending')
            ->with(['customer', 'package.provider', 'package.provider.provider_logo'])
            ->orderBy('created_at', 'desc') 
            ->get();


        
            if ($latestOrders->isNotEmpty()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Latest Order List Found.',
                    'latest_orders' => $latestOrders,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Latest Order List Not found.',
                ]);
            }
    }








}
