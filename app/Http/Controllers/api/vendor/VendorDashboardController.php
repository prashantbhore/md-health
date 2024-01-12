<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorProductPayment;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    //
    public function monthlyOrders()
    {
        $monthlyOrders = VendorProductPayment::where('vendor_id', Auth::user()->id)
            ->whereMonth('created_at', now()->month)
            ->count();


        return response()->json(['monthly_orders' => $monthlyOrders]);
    }


    public function monthlySales()
    {

        $monthlySales = VendorProductPayment::where('vendor_id', Auth::user()->id)
            ->whereMonth('created_at', now()->month)
            ->sum('amount');

        return response()->json(['monthly_sales' => $monthlySales]);
    }




    public function latestOrders()
    {

        $latestOrders =
        DB::table('md_vendor_product_payment')
        ->select(
            'md_customer_registration.full_name',
            'md_vendor_product_payment.amount',
            'md_vendor_product.product_name',
            'md_vendor_register.company_name',
            'vendor_logo.company_logo_image_path',
            'vendor_logo.company_logo_image_name'
        )
        ->leftJoin('md_customer_registration', 'md_vendor_product_payment.customer_id', '=', 'md_customer_registration.id')
        ->leftJoin('md_vendor_register', 'md_vendor_register.id', '=', 'md_vendor_product_payment.vendor_id')
        ->leftJoin('md_vendor_product', 'md_vendor_product.id', '=', 'md_vendor_product_payment.product_id')
        ->leftJoin('vendor_logo', 'vendor_logo.vendor_id', '=', 'md_vendor_register.id')
        ->where('md_vendor_product_payment.order_status', '=', 'pending')
        ->where('md_vendor_register.id', '=', Auth::user()->id)
        ->where('vendor_logo.status', '=', 'active')
        ->where('md_customer_registration.status', '=', 'active')
        ->where('md_vendor_register.status', '=', 'active')
        ->orderBy('md_vendor_product_payment.created_at', 'desc') // Assuming 'created_at' is your order creation time column
        ->limit(5)
        ->get();


        if ($latestOrders->isNotEmpty()) {
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
