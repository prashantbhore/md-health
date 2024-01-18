<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Storage;
use App\Models\VendorProduct;
use App\Models\VendorProductGallery;
use App\Models\VendorProductCategory;
use App\Models\VendorProductSubCategory;
use App\Models\VendorRegister;
use App\Models\ShoppingCart;
use App\Models\VendorProductPayment;
use App\Models\VendorCustomerFollower;
use App\Models\MdShopFavorite;


class CustomerShopController extends BaseController
{
    use MediaTrait;



    public function featured_product_list()
    {

        $activeProductList = VendorProduct::where('status', 'active')->where('featured', 'yes')
        ->select('id', 'product_unique_id', 'product_name', 'product_description', 'sale_price', 'status')
        ->get();

        $selected_data = [];

        foreach ($activeProductList as $key => $product) {
            $productImage = VendorProductGallery::where('status', 'active')
            ->where('vendor_product_id', $product->id)
                ->select('vendor_product_image_path')
                ->first();

            $selected_data[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
                'sale_price' => !empty($product->sale_price) ? $product->sale_price : '',
                'product_description' => !empty($product->product_description) ? $product->product_description : '',
                'status' => !empty($product->status) ? $product->status : '',
            ];
        }

        if (!empty($selected_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Featured Product List Found.',
                'featured_products' => $selected_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Featured Product List Not Found',
            ]);
        }
    }


    public function product_view(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $proudct_data = VendorProduct::where('status', '!=', 'delete')->where('id', $request->id)->first();

        $product_category = null;
        if (!empty($proudct_data->product_category_id)) {
            $product_category = VendorProductCategory::where('id', $proudct_data->product_category_id)->first();
        }

        $product_sub_category = null;
        if (!empty($proudct_data->product_subcategory_id)) {
            $product_sub_category = VendorProductSubCategory::where('id', $proudct_data->product_subcategory_id)->first();
        }

        $gallery = null;
        if (!empty($proudct_data->id)) {
            $gallery = VendorProductGallery::where('vendor_product_id', $proudct_data->id)->get();
        }

        $vendor = null;
        if (!empty($proudct_data->vendor_id)) {
            $vendor = VendorRegister::where('id', $proudct_data->vendor_id)->first();
        }

        if(!empty($request->auth_id)){
            $ShoppingCart = ShoppingCart::where('status', 'active')
                ->where('product_id', $request->id)
                ->where('customer_id', ($request->auth_id))
                ->first();

            if (!empty($ShoppingCart)) {
                $ShoppingCartexist = 'yes';
            } else {
                $ShoppingCartexist = 'no';
            }
        }else{
            $ShoppingCartexist = 'no';

        }

        if(!empty($request->auth_id))
        {
            $VendorProduct = VendorProduct::where('status', 'active')
                ->select('vendor_id')
                ->where('id', $request->id)
                ->first();


            $VendorCustomerFollower = VendorCustomerFollower::where('status', 'active')
                ->select('vendor_id')
                ->where('customer_id', $request->auth_id)
                ->first();

            if ($VendorProduct && $VendorCustomerFollower && $VendorProduct->vendor_id == $VendorCustomerFollower->vendor_id) {
                // vendor_id is the same, send 'yes'
                $following_status = 'yes';
            } else {
                // vendor_id is different or one of the variables is null, send 'no'
                $following_status = 'no';
            }
        }else{
            $following_status = 'no';
        }


        if (!empty($request->auth_id)) {
        $MdShopFavorite=MdShopFavorite::where('status','active')
        ->where('customer_id', $request->auth_id)
        ->first();

        if(!empty($MdShopFavorite)){
                $favourite_status = 'yes';
        }else{
                $favourite_status = 'no';
        }
        }else{
            $favourite_status = 'no';
        }
        
        

        $product_gallery = [];

        if (!empty($gallery)) {

            foreach ($gallery as $val) {
                $product_gallery[] = !empty($val->vendor_product_image_path) ? url(Storage::url($val->vendor_product_image_path)) : '';
            }
        }

        $otherProducts = [];

        if ($proudct_data) {
            $randomProducts = VendorProduct::where('status', '!=', 'delete')
            ->where('id', '!=', $request->id)
                ->inRandomOrder()
                ->limit(4)
                ->get();

            foreach ($randomProducts as $val) {
                // Use firstOrNew to ensure a default empty object if no image is found
                $product_image = VendorProductGallery::where('vendor_product_id', $val->id)
                    ->select('vendor_product_image_path')
                    ->firstOrNew();

                $product = [
                    'id' => $val->id ? $val->id : 0,
                    'product_name' => $val->product_name ? $val->product_name : '',
                    'product_descrition' => $val->product_description ? $val->product_description : '',
                    'product_price' => $val->product_price ? $val->product_price : '',
                    'shipping_fee' => $val->shipping_fee ? $val->shipping_fee : '',
                    'free_shipping' => $val->free_shipping ? $val->free_shipping : '',
                    'discount' => $val->discount_price ? $val->discount_price : '',
                    'sale_price' => $val->sale_price ? $val->sale_price : '',
                    'featured' => $val->featured ? $val->featured : '',
                    // 'vendor_product_image_path' => $product_image->vendor_product_image_path ?? '',
                    'vendor_product_image_path' => !empty($product_image->vendor_product_image_path) ? url(Storage::url($product_image->vendor_product_image_path)) : '',
                ];

                $otherProducts[] = $product;
            }
        }



        //   $data = [];



        $data = [
            'id' => !empty($proudct_data->id) ?  $proudct_data->id : 0,
            'product_name' => !empty($proudct_data->product_name) ?  $proudct_data->product_name : '',
            'product_category_id' => !empty($proudct_data->product_category_id) ?  $proudct_data->product_category_id : '',
            'product_category_name' => !empty($product_category->category_name) ? $product_category->category_name : '',
            'product_sub_category_id' => !empty($proudct_data->product_subcategory_id) ?  $proudct_data->product_subcategory_id : '',
            'product_sub_category_name' => !empty($product_sub_category->sub_category_name) ? $product_sub_category->sub_category_name : '',
            'product_descrition' => !empty($proudct_data->product_description) ?  $proudct_data->product_description : '',
            'product_price' => !empty($proudct_data->product_price) ?  $proudct_data->product_price : '',
            'shipping_fee' => !empty($proudct_data->shipping_fee) ?  $proudct_data->shipping_fee : '',
            'free_shipping' => !empty($proudct_data->free_shipping) ?  $proudct_data->free_shipping : '',
            'discount' => !empty($proudct_data->discount_price) ?  $proudct_data->discount_price : '',
            'sale_price' => !empty($proudct_data->sale_price) ?  $proudct_data->sale_price : '',
            'featured' => !empty($proudct_data->featured) ?  $proudct_data->featured : '',
            'vendor_id' => !empty($vendor->id) ? $vendor->id : '',
            'vendor_name' => !empty($vendor->company_name) ? $vendor->company_name : '',
            'product_exist' => !empty($ShoppingCartexist) ? $ShoppingCartexist : '',
            'following_status' => !empty($following_status) ? $following_status : '',
            'favourite_status' => !empty($favourite_status) ? $favourite_status : '',
        ];


        if (!empty($data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Data Found.',
                'product_data' =>  $data,
                'product_gallery' =>  $product_gallery,
                'other_products' =>  $otherProducts,
                'product_exist' =>  $ShoppingCartexist,
                'following_status' =>  $following_status,
                'favourite_status' =>  $favourite_status,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Product Data Found',
            ]);
        }
    }




public function vendor_product_list(Request $request)
{

      $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $vendor= VendorRegister::where('id',$request->id)->with('logo')->first();

    
       $proudct_data= VendorProduct::where('status','active')->where('vendor_id',$request->id)->get();

   

        $vendorProductsList = [];

        if ($proudct_data){
        
            foreach ($proudct_data as $val){
                // Use firstOrNew to ensure a default empty object if no image is found
                $product_image = VendorProductGallery::where('vendor_product_id', $val->id)
                    ->select('vendor_product_image_path')
                    ->firstOrNew();
        
                $product = [
                    'id' => $val->id ? $val->id : '',
                    'product_name' => $val->product_name ? $val->product_name : '',
                    'product_descrition' => $val->product_description ? $val->product_description : '',
                    'product_price' => $val->product_price ? $val->product_price : '',
                    'shipping_fee' => $val->shipping_fee ? $val->shipping_fee : '',
                    'free_shipping' => $val->free_shipping ? $val->free_shipping : '',
                    'discount' => $val->discount_price ? $val->discount_price : '',
                    'sale_price' => $val->sale_price ? $val->sale_price : '',
                    'featured' => $val->featured ? $val->featured : '',
                    // 'vendor_product_image_path' => $product_image->vendor_product_image_path ?? '',
                    'vendor_product_image_path' => !empty($product_image->vendor_product_image_path) ? url(Storage::url($product_image->vendor_product_image_path)) : '',
                ];
        
                $vendorProductsList[] = $product;
            }
        }
        
        

       $data = [];

    

        $data[] = [
          
            'vendor_id' => !empty($vendor->id) ? $vendor->id: '',
            'vendor_unique_id' => !empty($vendor->vendor_unique_no) ? $vendor->vendor_unique_no:'',
            'vendor_name' => !empty($vendor->company_name) ? $vendor->company_name: '',
            'vendor_about' => !empty($vendor->company_overview) ? $vendor->company_overview: '',
            'vendor_logo' => !empty($vendor->logo->company_logo_image_path) ? url(Storage::url($vendor->logo->company_logo_image_path)): '',
        ];
    

    if (!empty($data)){
        return response()->json([
            'status' => 200,
            'message' => 'vendor deatils and vendor product list found.',
            'product_data' =>  $data,
            'vendor_products' => $vendorProductsList,
            'vendor' => $vendor,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'vendor deatils and vendor product list found.',
        ]);
    }
}

public function addToCart(Request $request)
{
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $customerId = Auth::user()->id; 


        $cartItem = ShoppingCart::where('customer_id',$customerId)
            ->where('product_id', $request->input('product_id'))
            ->first();


        $productAddedToCart=null;
        if ($cartItem) {
           $productAddedToCart= $cartItem->update(['quantity' => $cartItem->quantity + $request->input('quantity')]);
        } else {
            $productAddedToCart=ShoppingCart::create([
                'customer_id' =>  $customerId,
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity'),
            ]);
        }


        
    if (!empty($productAddedToCart)){
        return response()->json([
            'status' => 200,
            'message' => 'Product Added To Cart.',
        ]);
    } else{
        return response()->json([
            'status' => 404,
            'message' => 'Product Is Not Added To Cart.',
        ]);
    }

}




public function viewCart()
{
        
       $customerId = Auth::user()->id; 

        //$customerId = 1; 
        
        $cartItemId =ShoppingCart::where('status','active')->where('customer_id',$customerId)->select('product_id')->get()->toArray();


        $products = VendorProduct::where('status','active')->whereIn('id', $cartItemId)->get();


            $cartProductsList=[];
            $cartTotalPrice=0;
            if ($products){
        
                foreach ($products as $val){
                    // Use firstOrNew to ensure a default empty object if no image is found
                    $product_image = VendorProductGallery::where('vendor_product_id', $val->id)
                        ->select('vendor_product_image_path')
                        ->firstOrNew();


                    
                    $vendor=VendorRegister::where('id',$val->vendor_id)->with('logo')->first();    

                    $cartTotalPrice += (!empty($val->sale_price) ? floatval($val->sale_price) : 0)
                    + (!empty($val->shipping_fee) ? floatval($val->shipping_fee) : 0);
                

                    $prduct_quantity_cart=ShoppingCart::where('product_id',$val->id)->select('quantity')->first();
            
                    $product = [
                        'id' => $val->id ? $val->id : '',
                        'product_name' => $val->product_name ? $val->product_name : '',
                        'product_descrition' => $val->product_description ? $val->product_description : '',
                        'product_price' => $val->product_price ? $val->product_price : '',
                        'shipping_fee' => $val->shipping_fee ? $val->shipping_fee : '',
                        'free_shipping' => $val->free_shipping ? $val->free_shipping : '',
                        'discount' => $val->discount_price ? $val->discount_price : '',
                        'sale_price' => $val->sale_price ? $val->sale_price : '',
                        'product_image_path' => url(Storage::url($product_image->vendor_product_image_path))?? '',
                        'vendor'=>$vendor->company_name??'',
                        'quantity'=> $prduct_quantity_cart->quantity??'',

                    ];
            
                    $cartProductsList[] = $product;
                }
            }    


        
        if(!empty($cartProductsList)){
            return response()->json([
                'status' => 200,
                'message' => 'Cart Item Found.',
                'cart_item'=> $cartProductsList,
                'cart_total_price'=>  $cartTotalPrice,
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'No Cart Item Found.',
            ]);
        }
}




public function deleteCartItem(Request $request)
{

    $validator = Validator::make($request->all(),[
        'cartItemId' => 'required',
    ]);

    if ($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }

    // Get the authenticated user's ID

    $customerId = Auth::user()->id;

    //$customerId = 1;

    // Update the status to "deleted" for the cart item
    $updatedCartItem = ShoppingCart::where('status', 'active')
        ->where('customer_id', $customerId)
        ->where('id', $request->cartItemId)
        ->update(['status' => 'delete']);

    if ($updatedCartItem) {
        return response()->json([
            'status' => 200,
            'message' => 'Cart Item  deleted successfully.',
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Cart Item Not Found or unable to delete.',
        ]);
    }
}




public function clearCart()
{
    // Get the authenticated user's ID
    // $customerId = Auth::user()->id;

    $customerId = 1;

    // Update the status to "deleted" for all cart items for the user
    $updatedCartItems = ShoppingCart::where('status', 'active')
        ->where('customer_id', $customerId)
        ->update(['status' => 'delete']);

    if ($updatedCartItems) {
        return response()->json([
            'status' => 200,
            'message' => 'All Cart Items deleted successfully.',
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No Cart Items found or unable to delete.',
        ]);
    }
}





public function filteredProductList(Request $request)
{

    $validator = Validator::make($request->all(),[
        // 'category_id' => 'required',
        'subcategory_id' => 'required',
    ]);

    if ($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }


    $category = $request->category_id;
    $subcategory = $request->subcategory_id;

    
    $query = VendorProduct::where('status', 'active');

    // if ($category) {
    //     $query->where('product_category_id',$category);
    // }

    if ($subcategory) {
        $query->where('product_subcategory_id',$subcategory);
    }

   
    $filteredProducts = $query->select('id', 'product_unique_id', 'product_name', 'product_description','sale_price')->get();

    $selected_data = [];

    foreach ($filteredProducts as $key => $product) {
        $productImage = VendorProductGallery::where('status', 'active')
            ->where('vendor_product_id', $product->id)
            ->select('vendor_product_image_path')
            ->first();

        $selected_data[] = [
            'id' => !empty($product->id) ? $product->id : '',
            'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
            'product_name' => !empty($product->product_name) ? $product->product_name : '',
            'sale_price' => !empty($product->sale_price) ? $product->sale_price : '',
            'product_description' => !empty($product->product_description) ? $product->product_description : '',
            'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
        ];
    }

    if (!empty($selected_data)) {
        return response()->json([
            'status' => 200,
            'message' => 'Filtered Product List Found.',
            'filtered_products' => $selected_data,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No Products found for the given filters.',
        ]);
    }
}





public function processPayment(Request $request)
{
        
        $validator = Validator::make($request->all(),[
            'cart_id' => 'required',
            'amount' => 'required',
            'payment_mod' => 'required',
        ]);
        

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $cartData=ShoppingCart::where('id',$request->cart_id)->first();
        
       
        $product_details=null;

        if(!empty($cartData)){
            $product_details=VendorProduct::where('id',$cartData->product_id)->first();
        }


        $input['customer_id'] = Auth::user()->id;
        //$input['customer_id'] = 1;
        $input['vendor_id'] = $product_details->vendor_id;
        $input['product_id'] = $cartData->product_id;
        $input['quantity'] = $cartData->quantity;
        $input['cart_id'] = $cartData->id;
        $input['amount'] = $request->amount;
        $input['payment_status'] = 'completed';

        if($request->payment_mod=='card'){
             $input['card_number'] = $cartData->card_number;
            $input['expiration_date'] = $cartData->expiration_date;
            $input['cvv'] = $request->cvv;
        }


        if($request->payment_mod=='bank'){
            $input['bank_account_number'] = $cartData->bank_account_number;
            $input['bank_name'] = $cartData->bank_name;
        }

        if($request->payment_mod=='wallet'){
            $input['wallet_id'] = $cartData->wallet_id;
        }

        $input['order_status'] = 'pending';

        $input['platform_type'] = $request->platform_type;

        $input['created_by'] = Auth::user()->id;

       // $input['created_by']= 1;

        $payment = VendorProductPayment::create($input);

        


        if (!empty($payment)) {
            return response()->json([
                'status' => 200,
                'message' => 'Payment Details Stored Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Payment Details Not Stored.',
            ]);
        }
       
}





    public function followVendor(Request $request)
    {
       

        $validator = Validator::make($request->all(),[
            'vendor_id' => 'required',
        ]);
        

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customerId = Auth::user()->id; 

       // $customerId = 1; 

        $customerVendorFollower = VendorCustomerFollower::create([
            'customer_id' => $customerId,
            'vendor_id' => $request->input('vendor_id'),
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Vendor followed successfully.',
            'data' => $customerVendorFollower,
        ]);
    }




    public function unfollowVendor(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'vendor_id' => 'required',
        ]);
        

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customerId = Auth::user()->id;

        //$customerId = 1;


        VendorCustomerFollower::where('customer_id', $customerId)
            ->where('vendor_id', $request->input('vendor_id'))
            ->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Vendor unfollowed successfully.',
        ]);
    }





    public function addToFavorites(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
        ]);
        

        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


       // $customerId = Auth::user()->id; 

        $customerId = 1; 

         $existingFavorite = MdShopFavorite::where('customer_id',$customerId)
         ->where('product_id', $request->input('product_id'))
         ->first();

     if ($existingFavorite) {
         $existingFavorite->delete();
         $message = 'Product removed from favorites successfully';
     } else {
         MdShopFavorite::create([
             'customer_id' => $customerId,
             'product_id' => $request->input('product_id'),
         ]);
         $message = 'Product added to favorites successfully';
     }


        return response()->json([
            'status' => 404,
            'message' =>  $message,
        ]);

    }

















    

}
