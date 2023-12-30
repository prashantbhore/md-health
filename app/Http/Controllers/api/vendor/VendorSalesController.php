<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Hash;
use Storage;
use App\Models\VendorProduct;
use App\Models\VendorProductCategory;
use App\Models\VendorProductSubCategory;
use App\Models\VendorProductGallery;
use App\Models\VendorRegister;
use App\Models\ShoppingCart;
use App\Models\VendorProductPayment;
use App\Models\VendorCustomerFollower;
use App\Models\MdShopFavorite;


class VendorSalesController extends BaseController
{
    use MediaTrait;

    public function activeSales(){

        //$vendorId=Auth::user()->id;
        $vendorId=5;

        $activeOrders=VendorProductPayment::where('vendor_id',$vendorId)->whereIn('order_status', ['active', 'pending'])->with(['customer','product'])->get();

        if (!empty($activeOrders)){
            
            $selectedData = [];

            foreach ($activeOrders as $order){
                $selectedData[] = [
                    'order_id' => $order->id,
                    'order_unique_id' => $order->order_id,
                    'customer_name' => $order->customer->full_name,
                    'product_name' => $order->product->product_name,
                    'order_status' => $order->order_status,
                    'total_price' => $order->amount,
                ];
            }



          return response()->json([
              'status' => 200,
              'message' => 'Active Sales Found',
              'active_orders_lists' => $selectedData,
              
           
                
                ]);
          } else{
                return response()->json([
                'status' => 404,
                'message' => 'No Active Sales Found',
                ]);
          }
    }



    public function completedSales(){

        $vendorId=Auth::user()->id;

        //$vendorId=5;

        $activeOrders=VendorProductPayment::where('vendor_id',$vendorId)->where('order_status','completed')->with(['customer','product'])->get();

        if (!empty($activeOrders)){
            
            $selectedData = [];

            foreach ($activeOrders as $order){
                $selectedData[] = [
                    'order_id' => $order->id,
                    'order_unique_id' => $order->order_id,
                    'customer_name' => $order->customer->full_name,
                    'product_name' => $order->product->product_name,
                    'order_status' => $order->order_status,
                    'total_price' => $order->amount,
                ];
            }



          return response()->json([
              'status' => 200,
              'message' => 'Completed Sales Found',
              'active_orders_lists' => $selectedData,
              
           
                
                ]);
          } else{
                return response()->json([
                'status' => 404,
                'message' => 'No Completed Sales Found',
                ]);
          }
    }



    public function cancelledSales(){

       // $vendorId=Auth::user()->id;

        $vendorId=5;

        $activeOrders=VendorProductPayment::where('vendor_id',$vendorId)->where('order_status','cancelled')->with(['customer','product'])->get();

        if (!empty($activeOrders)){
            
            $selectedData = [];

            foreach ($activeOrders as $order){
                $selectedData[] = [
                    'order_id' => $order->id,
                    'order_unique_id' => $order->order_id,
                    'customer_name' => $order->customer->full_name,
                    'product_name' => $order->product->product_name,
                    'order_status' => $order->order_status,
                    'total_price' => $order->amount,
                ];
            }



          return response()->json([
              'status' => 200,
              'message' => 'Cancelled Sales Found',
              'active_orders_lists' => $selectedData,
            
              ]);
          } else{
                return response()->json([
                'status' => 404,
                'message' => 'No Cancelled Sales Found',
                ]);
          }
    }





    public function salesView(Request $request){

        $validator = Validator::make($request->all(),[
            'order_id' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


       $orderDetails=VendorProductPayment::where('id',$request->order_id)->with(['customer','customer.country','customer.city','product'])->first();
 
         if (!empty($orderDetails)){
             
             $selectedData = [];

             $timestamp = strtotime($orderDetails->created_at);
             $formattedDate = date('Y-m-d', $timestamp);
 
                 $selectedData[] = [
                     'order_id' => $orderDetails->id??'',
                     'order_unique_id' => $orderDetails->order_id??'',
                     'order_quantity' => $orderDetails->quantity??'',
                     'customer_first_name' => $orderDetails->customer->first_name??'',
                     'customer_last_name' => $orderDetails->customer->last_name??'',
                     'customer_phone' => $orderDetails->customer->phone??'',
                     'customer_email' => $orderDetails->customer->email??'',
                     'customer_address' => $orderDetails->customer->address??'',
                     'customer_country' => $orderDetails->customer->country->country_name??'',
                     'customer_city' => $orderDetails->customer->city->city_name??'',
                     'card_number' => $orderDetails->card_number??'',
                     'expiration_date' => $orderDetails->expiration_date??'',
                     'cvv' => $orderDetails->cvv??'',
                     'bank_account_number' => $orderDetails->bank_account_number??'',
                     'bank_name' => $orderDetails->bank_name??'',
                     'wallet_id' => $orderDetails->wallet_id??'',
                     'product_name' => $orderDetails->product->product_name??'',
                     'order_status' => $orderDetails->order_status??'',
                     'total_price' => $orderDetails->amount??'',
                     'payment_date' =>  $formattedDate??'',
                 ];
             
           return response()->json([
               'status' => 200,
               'message' => 'Order Details Found',
               'order_details' => $selectedData,             
               ]);
           } else{
                 return response()->json([
                 'status' => 404,
                 'message' => 'Order Details Not Found',
                ]);
           }

     }
 



public function searchSales(Request $request)
{

    $validator = Validator::make($request->all(),[
        'search_query' => 'required',
    ]);

    if ($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }

  

     $vendorId = Auth::user()->id;

   // $vendorId = 5;

    $query = VendorProductPayment::where('vendor_id', $vendorId);

   
    $searchQuery = $request->input('search_query');
    if ($searchQuery) {
        $query->where(function ($subquery) use ($searchQuery) {
            $subquery->where('order_id', 'like', "%$searchQuery%")
                ->orWhereHas('customer', function ($customerSubquery) use ($searchQuery) {
                    $customerSubquery->where('full_name', 'like', "%$searchQuery%");
                })
                ->orWhereHas('product', function ($productSubquery) use ($searchQuery) {
                    $productSubquery->where('product_name', 'like', "%$searchQuery%");
                });
        });
    }

    $orders = $query->with(['customer', 'product'])->get();

    if ($orders->isNotEmpty()) {
        $selectedData = [];

        foreach ($orders as $order) {
            $selectedData[] = [
                'order_id' => $order->id,
                'order_unique_id' => $order->order_id,
                'customer_name' => $order->customer->full_name,
                'product_name' => $order->product->product_name,
                'order_status' => $order->order_status,
                'total_price' => $order->amount,
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => 'Sales Found',
            'sales_list' => $selectedData,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No Sales Found',
        ]);
    }
}























}
