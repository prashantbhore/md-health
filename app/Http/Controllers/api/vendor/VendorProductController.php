<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
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
        dd($request);
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'product_category_id' => 'required|integer',
            'product_subcategory_id' => 'required|integer',
            'product_price' => 'required|string',
            'shipping_fee' => 'required|string',
            'discount_price' => 'required|string',
            'sale_price' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $vendor_id = Auth::user()->id;
        // dd($vendor_id);
        //  $vendor_id = 1; // Assuming a fixed vendor ID for now

        $productData = [
            'vendor_id' => $vendor_id,
            'product_name' => $request->product_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'shipping_fee' => $request->shipping_fee,
            'free_shipping' => !empty($request->free_shipping) ? 'yes' : 'no',
            'discount_price' => $request->discount_price,
            'sale_price' => $request->sale_price,
            'featured' => !empty($request->featured) ? 'yes' : 'no',
            'created_by' => 1, // Assuming a fixed user ID for now
        ];

        $storeProduct = null;

        if ($request->has('id')) {
            // Update the existing product
            $existingProduct = VendorProduct::find($request->id);

            if ($existingProduct) {

                $storeProduct = $existingProduct->update($productData);


                if ($request->has('vendor_product_image_path')) {
                    if ($files = $request->file('vendor_product_image_path')) {
                        // $files=[];
                        foreach ($files as $file) {
                            $accout_images = new VendorProductGallery;
                            $accout_images['vendor_product_id'] = $storeProduct->id;

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
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found.',
                ]);
            }
        } else {
            // Add a new product
            $storeProduct = VendorProduct::create($productData);

            if (!empty($storeProduct)) {
                $unique_id = "MDH" . sprintf('%04d', $storeProduct->id);
                $storeProduct->update(['product_unique_id' => $unique_id]);
            }


            if ($request->has('vendor_product_image_path')) {
                if ($files = $request->file('vendor_product_image_path')) {
                    // $files=[];
                    foreach ($files as $file) {
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
        }


        if (!empty($storeProduct)) {
            return response()->json([
                'status' => 200,
                'message' => $request->has('id') ? 'Product Updated Successfully.' : 'Product Added Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Vendor product can be added.',
            ]);
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
            $productImage = VendorProductGallery::where('status', 'active')
                ->where('vendor_product_id', $product->id)
                ->select('vendor_product_image_path')
                ->first();

            $selected_data[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
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
            $productImage = VendorProductGallery::where('status', 'active')
                ->where('vendor_product_id', $product->id)
                ->select('vendor_product_image_path')
                ->first();

            $selected_data[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
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


        $vendor_id = Auth::user()->id();
        // $vendor_id = 1;

        $searchQuery = $request->input('search_query');

        $query = VendorProduct::where('vendor_id', $vendor_id)
            ->where('status', '!=', 'delete')
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
            $productImage = VendorProductGallery::where('status', 'active')
                ->where('vendor_product_id', $product->id)
                ->select('vendor_product_image_path')
                ->first();

            $search_results[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
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


        $vendor_id = Auth::user()->id();
        // $vendor_id = 1;

        $searchQuery = $request->input('search_query');

        $query = VendorProduct::where('vendor_id', $vendor_id)
            ->where('status', '!=', 'delete')
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
            $productImage = VendorProductGallery::where('status', 'active')
                ->where('vendor_product_id', $product->id)
                ->select('vendor_product_image_path')
                ->first();

            $search_results[] = [
                'id' => !empty($product->id) ? $product->id : '',
                'product_unique_id' => !empty($product->product_unique_id) ? $product->product_unique_id : '',
                'product_name' => !empty($product->product_name) ? $product->product_name : '',
                'product_image' => !empty($productImage->vendor_product_image_path) ? url(Storage::url($productImage->vendor_product_image_path)) : '',
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
            $gallery = VendorProductGallery::where('vendor_product_id', $proudct_data->id)->get();
        }

        $product_gallery = [];

        if (!empty($gallery)) {

            foreach ($gallery as $val) {
                $product_gallery[] = !empty($val->vendor_product_image_path) ? url(Storage::url($val->vendor_product_image_path)) : '';
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

}



