<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
use App\Models\VendorProductImagesVideos;
use Illuminate\Http\Request;
use App\Models\VendorRegister;
use App\Models\VendorLogo;
use App\Models\VendorLicense;
use App\Models\VendorProduct;
use App\Models\VendorProductCategory;
use App\Models\VendorProductSubCategory;
use App\Models\VendorProductGallery;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Hash;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;


class VendorProductController extends BaseController
{
    use MediaTrait;

    public function vendor_product_category()
    {

        $product_category = VendorProductCategory::where('status', 'active')->select('id', 'category_name')->get();

        if (!empty($product_category)) {
            return response()->json([
                'status' => 200,
                'message' => 'Vendor Product Category Found',
                'product_category' => $product_category,

            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Vendor Product Category Not Found.',
            ]);
        }
    }

    public function vendor_product_sub_category(Request $request)
    {
        $product_sub_category = VendorProductSubCategory::where('status', 'active')->where('category_id', $request->category_id)->select('id', 'sub_category_name')->get();

        if (!empty($product_sub_category)) {
            return response()->json([
                'status' => 200,
                'message' => 'Vendor Product Sub Category Found',
                'product_category' => $product_sub_category,

            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Vendor Product Sub Category Not Found.',
            ]);
        }
    }
   
    //Add and update Product started

    public function addProduct(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_price' => 'required',
            // 'shipping_fee' => 'required',
            'discount_price' => 'required',
            'sale_price' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if(!empty($request->button_type)){
            if($request->button_type=='active'){

                $vendor_id = Auth::user()->id;
                // dd($vendor_id);
                //  $vendor_id = 1; // Assuming a fixed vendor ID for now
        
                $productData = [
                    'vendor_id' => $vendor_id??'',
                    'product_name' => $request->product_name??'',
                    'product_category_id' => $request->product_category_id??'',
                    'product_subcategory_id' => $request->product_subcategory_id??'',
                    'product_description' => $request->product_description??'',
                    'product_price' => $request->product_price??'',
                    'shipping_fee' => $request->shipping_fee??'',
                    'free_shipping' => !empty($request->free_shipping) ? 'yes' : 'no',
                    'discount_price' => $request->discount_price??'',
                    'sale_price' => $request->sale_price??'',
                    'featured' => !empty($request->featured) ? 'yes' : 'no',
                    'status' => 'active',

                    'created_by' => 1, // Assuming a fixed user ID for now
                ];

            //   dd($productData);
                $storeProduct = null;
        
                if (isset($request->id) && !empty($request->id)) {
                   
                    // Update the existing product
                    $existingProduct = VendorProduct::find($request->id);

        
                    if ($existingProduct) {
                        // dd($existingProduct);
 
                        $storeProduct =VendorProduct::where('id',$request->id)->update($productData);
        // dd($storeProduct);
        
                        if ($request->has('vendor_product_image_path')) {
                            // dd('11111');
                            if ($files = $request->file('vendor_product_image_path')) {
                                // $files=[];
                                foreach ($files as $file) {
                                    // dd($request);
                                    $accout_images = new VendorProductGallery;
                                    $accout_images['vendor_product_id'] = $request->id;
        
                                    $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                    $original_name = $file->getClientOriginalName();
                                    $filePath = $file->storeAs('public/vendorProductImages', $filename);
                                    $accout_images['vendor_product_image_path'] = $filePath;
                                    $accout_images['vendor_product_image_name'] = $original_name;
                                    // $accout_images['modified_by'] = 1;
                                    $accout_images['modified_by'] = Auth::user()->id;
                                    $accout_images['modified_ip_address'] = $request->ip();
                                    $accout_images->save();
                                }
                            }
                        }
        
                    } else {
                        // dd('22222');
                        return response()->json([
                            'status' => 404,
                            'message' => 'Product not found.',
                        ]);
                    }
                } else {
                    // dd($request);
                    // dd('33333');
                    // Add a new product
                    $storeProduct = VendorProduct::create($productData);
        
                    if (!empty($storeProduct)) {
                        $unique_id = "MDH" . sprintf('%04d', $storeProduct->id);
                        $storeProduct->update(['product_unique_id' => $unique_id]);
                    }
                    // dd($request);
                    if ($request->has('vendor_product_image_path')) {
                        if ($files = $request->file('vendor_product_image_path')) {
                            // dd('4');
                            // $files=[];
                            foreach ($files as $file) {
                                // dd($file);
                                $accout_images = new VendorProductGallery;
                                $accout_images['vendor_product_id'] = $storeProduct->id;
                                
                                $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                $original_name = $file->getClientOriginalName();
                                $filePath = $file->storeAs('public/vendorProductImages', $filename);
                                $accout_images['vendor_product_image_path'] = $filePath;
                                $accout_images['vendor_product_image_name'] = $original_name;
                                //  $accout_images['modified_by'] = 1;
                                $accout_images['modified_by'] = Auth::user()->id;
                                $accout_images['modified_ip_address'] = $request->ip();
                                $accout_images->save();
                            }
                        }
                    }
                    // dd('41');
        
                }
        
        
                if (!empty($storeProduct)) {
                    return response()->json([
                        'status' => 200,
                        'message' =>  (isset($request->id) && !empty($request->id)) ? 'Product Updated Successfully in active list.' : 'Product Added Successfully in active list.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Something went wrong. Vendor product cannot be added in active list.',
                    ]);
                }
        
            }else{
                $vendor_id = Auth::user()->id;
                // dd($vendor_id);
                //  $vendor_id = 1; // Assuming a fixed vendor ID for now
        
                $productData = [
                    'vendor_id' => $vendor_id??'',
                    'product_name' => $request->product_name??'',
                    'product_category_id' => $request->product_category_id??'',
                    'product_subcategory_id' => $request->product_subcategory_id??'',
                    'product_description' => $request->product_description??'',
                    'product_price' => $request->product_price??'',
                    'shipping_fee' => $request->shipping_fee??'',
                    'free_shipping' => !empty($request->free_shipping) ? 'yes' : 'no',
                    'discount_price' => $request->discount_price??'',
                    'sale_price' => $request->sale_price??'',
                    'featured' => !empty($request->featured) ? 'yes' : 'no',
                    'status' => 'inactive',

                    'created_by' => 1, // Assuming a fixed user ID for now
                ];
              
                $storeProduct = null;
        
                if (isset($request->id) && !empty($request->id)) {
                   
                    // Update the existing product
                    $existingProduct = VendorProduct::find($request->id);
        
                    if ($existingProduct) {
        
                        $storeProduct = $existingProduct->update($productData);
        
        
                        if ($request->has('vendor_product_image_path')) {
                            // dd('11111');
                            if ($files = $request->file('vendor_product_image_path')) {
                                // $files=[];
                                // dd($request);
                                foreach ($files as $file) {
                                    $accout_images = new VendorProductGallery;
                                    $accout_images['vendor_product_id'] = $request->id;
        
                                    $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                    $original_name = $file->getClientOriginalName();
                                    $filePath = $file->storeAs('public/vendorProductImages', $filename);
                                    $accout_images['vendor_product_image_path'] = $filePath;
                                    $accout_images['vendor_product_image_name'] = $original_name;
                                    // $accout_images['modified_by'] = 1;
                                    $accout_images['modified_by'] = Auth::user()->id;
                                    $accout_images['modified_ip_address'] = $request->ip();
                                    $accout_images->save();
                                }
                            }
                        }
        
                    } else {
                        // dd('22222');
                        return response()->json([
                            'status' => 404,
                            'message' => 'Product not found.',
                        ]);
                    }
                } else {
                    // dd($request);
                    // dd('33333');
                    // Add a new product
                    $storeProduct = VendorProduct::create($productData);
        
                    if (!empty($storeProduct)) {
                        $unique_id = "MDH" . sprintf('%04d', $storeProduct->id);
                        $storeProduct->update(['product_unique_id' => $unique_id]);
                    }
                    // dd($request);
                    if ($request->has('vendor_product_image_path')) {
                        if ($files = $request->file('vendor_product_image_path')) {
                            // dd('4');
                            // $files=[];
                            foreach ($files as $file) {
                                // dd($file);
                                $accout_images = new VendorProductGallery;
                                $accout_images['vendor_product_id'] = $storeProduct->id;
                                
                                $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                $original_name = $file->getClientOriginalName();
                                $filePath = $file->storeAs('public/vendorProductImages', $filename);
                                $accout_images['vendor_product_image_path'] = $filePath;
                                $accout_images['vendor_product_image_name'] = $original_name;
                                //  $accout_images['modified_by'] = 1;
                                $accout_images['modified_by'] = Auth::user()->id;
                                $accout_images['modified_ip_address'] = $request->ip();
                                $accout_images->save();
                            }
                        }
                    }
                    // dd('41');
        
                }
        
        
                if (!empty($storeProduct)) {
                    return response()->json([
                        'status' => 200,
                        'message' =>  (isset($request->id) && !empty($request->id)) ? 'Product Updated Successfully.' : 'Product Added Successfully in Inactive List.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Something went wrong. Vendor product cannot be added in inactive list.',
                    ]);
                }
                
            }
        }
       

        


    }

    //Add and update Product Ended

    public function active_product_count(Request $request)
    {

        $vendor_id = Auth::user()->id;
        //$vendor_id=1;
        $activeProductCount = VendorProduct::where('status', 'active')->where('vendor_id', $vendor_id)->count();

        if (!empty($activeProductCount)) {
            return response()->json([
                'status' => 200,
                'message' => 'Active Product Count Found.',
                'active_product_count' => $activeProductCount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.Active Product Count Not Found',
            ]);
        }
    }
    public function deactive_product_count(Request $request)
    {

        $vendor_id = Auth::user()->id;
        //$vendor_id=1;
        $activeProductCount = VendorProduct::where('status', 'inactive')->where('vendor_id', $vendor_id)->count();

        if (!empty($activeProductCount)) {
            return response()->json([
                'status' => 200,
                'message' => 'Active Product Count Found.',
                'inactive_product_count' => $activeProductCount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.Active Product Count Not Found',
            ]);
        }
    }

    public function active_product_list(Request $request)
    {
        // dd('jhhghj');
        $vendor_id = Auth::user()->id;
        // dd(Auth::user()->id);
        //$vendor_id = 1;

        $activeProductList = VendorProduct::where('status', 'active')
            ->where('vendor_id', $vendor_id)
            ->select('id', 'product_unique_id', 'product_name', 'status')
            ->get();

        $selected_data = [];

        foreach ($activeProductList as $key => $product) {
            $productImage = VendorLogo::where('status', 'active')
                ->where('vendor_id', $vendor_id)
                ->select('company_logo_image_path','company_logo_image_name')
                ->first();

            $selected_data[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->company_logo_image_path) ? url(Storage::url($productImage->company_logo_image_path)) : '',
                'status' => !empty($product->status) ? $product->status : '',
            ];
        }

        if (!empty($selected_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Active Product List Found.',
                'active_product_count' => count($selected_data),
                'active_products' => $selected_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Active Product List Not Found',
            ]);
        }
    }

    public function inactive_product_list(Request $request)
    {
        $vendor_id = Auth::user()->id;
        //$vendor_id = 1;
// dd($selected_data);
        $inactiveProductList = VendorProduct::where('status', 'inactive')
            ->where('vendor_id', $vendor_id)
            ->select('id', 'product_unique_id', 'product_name', 'status')
            ->get();

        $selected_data = [];

        foreach ($inactiveProductList as $key => $product) {
            $productImage = VendorLogo::where('status', 'active')
                ->where('vendor_id', $vendor_id)
                ->select('company_logo_image_path','company_logo_image_name')
                ->first();


            $selected_data[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->company_logo_image_path) ? url(Storage::url($productImage->company_logo_image_path)) : '',
                'status' => !empty($product->status) ? $product->status : '',
            ];
        }
        // dd($selected_data);
        if (!empty($selected_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Inactive Product List Found.',
                'inactive_product_count' => count($selected_data),
                'inactive_products' => $selected_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Inactive Product List Not Found',
            ]);
        }
    }

    public function active_vendor_search_products(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'search_query' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $vendor_id = Auth::user()->id;
        // dd($vendor_id);
        // $vendor_id = 1;
        
        $searchQuery = $request->search_query;

        $query = VendorProduct::where('vendor_id', $vendor_id)
            ->where('status', '=', 'active')
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where(function ($query) use ($searchQuery) {
                    $query->where('product_name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('product_unique_id', $searchQuery)
                        ->orWhere('status', $searchQuery);
                });
            })
            ->select('id', 'product_unique_id', 'product_name', 'status')
            ->get();

        $search_results = [];

        foreach ($query as $product) {
            $productImage = VendorLogo::where('status', 'active')
            ->where('vendor_id', $vendor_id)
            ->select('company_logo_image_path','company_logo_image_name')
            ->first();

            $search_results[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->company_logo_image_path) ? url(Storage::url($productImage->company_logo_image_path)) : '',
                'status' => !empty($product->status) ? $product->status : '',
            ];
        }

        if (!empty($search_results)) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Search Results Found.',
                'search_results' => $search_results,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No products found for the search query.',
            ]);
        }
    }
    public function inactive_vendor_search_products(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'search_query' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $vendor_id = Auth::user()->id;
        // $vendor_id = 1;

        $searchQuery = $request->input('search_query');

        $query = VendorProduct::where('vendor_id', $vendor_id)
            ->where('status', '=', 'inactive')
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where(function ($query) use ($searchQuery) {
                    $query->where('product_name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('product_unique_id', $searchQuery)
                        ->orWhere('status', $searchQuery);
                });
            })
            ->select('id', 'product_unique_id', 'product_name', 'status')
            ->get();

        $search_results = [];

        foreach ($query as $product) {
            $productImage = VendorLogo::where('status', 'active')
            ->where('vendor_id', $vendor_id)
            ->select('company_logo_image_path','company_logo_image_name')
            ->first();

            $search_results[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->company_logo_image_path) ? url(Storage::url($productImage->company_logo_image_path)) : '',
                'status' => !empty($product->status) ? $product->status : '',
            ];
        }

        if (!empty($search_results)) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Search Results Found.',
                'search_results' => $search_results,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No products found for the search query.',
            ]);
        }
    }

    public function vendor_product_view(Request $request)
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
            $gallery = VendorProductGallery::where('vendor_product_id', $proudct_data->id)->where('status', '=', 'active')->get();
        }

        $product_gallery = [];

        if (!empty($gallery)) {

            foreach ($gallery as $key=>$val) {
                $product_gallery[$key]['id'] = !empty($val->id) ? ($val->id) : '';
                $product_gallery[$key]['image'] = !empty($val->vendor_product_image_path) ? url(Storage::url($val->vendor_product_image_path)) : '';
            }
        }

        $data = [];



        $data = [
            'id' => !empty($proudct_data->id) ? $proudct_data->id : '',
            'product_name' => !empty($proudct_data->product_name) ? $proudct_data->product_name : '',
            'product_category_id' => !empty($proudct_data->product_category_id) ? $proudct_data->product_category_id : '',
            'product_category_name' => !empty($product_category->category_name) ? $product_category->category_name : '',
            'product_sub_category_id' => !empty($proudct_data->product_subcategory_id) ? $proudct_data->product_subcategory_id : '',
            'product_sub_category_name' => !empty($product_sub_category->sub_category_name) ? $product_sub_category->sub_category_name : '',
            'product_description' => !empty($proudct_data->product_description) ? $proudct_data->product_description : '',
            'product_price' => !empty($proudct_data->product_price) ? $proudct_data->product_price : '',
            'shipping_fee' => !empty($proudct_data->shipping_fee) ? $proudct_data->shipping_fee : '',
            'free_shipping' => !empty($proudct_data->free_shipping) ? $proudct_data->free_shipping : '',
            'discount_price' => !empty($proudct_data->discount_price) ? $proudct_data->discount_price : '',
            'sale_price' => !empty($proudct_data->sale_price) ? $proudct_data->sale_price : '',
            'featured' => !empty($proudct_data->featured) ? $proudct_data->featured : '',
        ];

// dd($product_gallery);
        if (!empty($data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Data Found.',
                'product_data' => $data,
                'product_gallery' => $product_gallery,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Product Data Found',
            ]);
        }
    }

    public function addProductsBulk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'products_file' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $file = $request->file('products_file');
        $import = new ProductImport;
        Excel::import($import, $file);

        return response()->json([
            'status' => 200,
            'message' => 'Products Added Successfully.',
        ]);
    }


    public function product_active_to_deactive(Request $request)
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

        $activate_to_deactive_packages = VendorProduct::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'product is added in deactive list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    //code by mplus01
    public function product_deactive_to_active(Request $request)
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

        $activate_to_deactive_packages = VendorProduct::where('id', $request->id)->update($status_update);
        if (!empty($activate_to_deactive_packages)) {
            return response()->json([
                'status' => 200,
                'message' => 'product is added in active list.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function delete_provider_images_videos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        $validation_message = '';

        // if ($request->provider_id == '') {
        //     $validation_message .= 'Provider Id field';
        // }

        if ($validator->fails()) {
            return $this->sendError($validation_message . ' is required.');
        }

        $delete_id = [];
        $delete_id['status'] = 'delete';
        $delete_id['modified_by'] = Auth::user()->id;
        $delete_id['modified_ip_address'] = $request->ip();

        $delete_ProviderImagesVideos = VendorProductGallery::where('id', $request->id)
            ->update($delete_id);

        if (!empty($delete_ProviderImagesVideos)) {
            return response()->json([
                'status' => 200,
                'message' => 'data deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'we are unable to delete your data at this time'

            ]);
        }
    }

    public function delete_vendor_images_videos(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'provider_id' => 'required',
        // ]);

        // $validation_message = '';

        // if ($request->provider_id == '') {
        //     $validation_message .= 'Provider Id field';
        // }

        // if ($validator->fails()) {
        //     return $this->sendError($validation_message . ' is required.');
        // }
// dd($request);
        $delete_id = [];
        $delete_id['status'] = 'delete';
        $delete_id['modified_by'] = Auth::user()->id;
        $delete_id['modified_ip_address'] = $request->ip();

        $delete_ProviderImagesVideos = VendorProductGallery::where('id', $request->id)
            ->update($delete_id);

        if (!empty($delete_ProviderImagesVideos)) {
            return response()->json([
                'status' => 200,
                'message' => 'data deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'we are unable to delete your data at this time'

            ]);
        }
    }
}



