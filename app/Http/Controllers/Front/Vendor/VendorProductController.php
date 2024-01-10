<?php

namespace App\Http\Controllers\Front\Vendor;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class VendorProductController extends Controller
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function vendor_dashboard()
    {
        return view('front/mdhealth/vendor/vendor_dashboard');
    }
    public function vendor_products()
    {
        return view('front/mdhealth/vendor/vendor_products');
    }

    public function vendor_add_products()
    {
        $token = Session::get('login_token');
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];


        return view('front/mdhealth/vendor/vendor_add_products', compact('product_categories'));
    }

    public function add_vendor_product(Request $request)
    {
        $token = Session::get('login_token');
        $apiUrl1 = url('/api/add-vendor-product');
        $method = 'POST';
        $body = $request->all();
        
        $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;
        
        if ($request->hasFile('vendor_product_image_path')) {
            $images = $request->file('vendor_product_image_path');
            $imageData = [];
        
            foreach ($images as $key => $image) {
                if ($image->isValid()) {
                    // Process each valid image here
                    $imageData[] = $image; // Store the image object if needed
                }
            }
        
            $responseData['vendor_product_image_path'] = $imageData;
            // $imageData=$responseData['vendor_product_image_path'];
            $responseData = $this->apiService->getData($token, $apiUrl1, $plainArray, $method, $responseData);
        } else {
            $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        }
        
        

        


        // $responseData = $this->apiService->getData( $token, $apiUrl1, $body, $method );
        // dd($responseData);
        if (($responseData['status'] == 200)) {
            return redirect('/vendor-products')->with('success', $responseData['message']);
        } else {
            return redirect('/vendor-products')->with('error', $responseData['message']);
        }

        // return view('front/mdhealth/vendor/vendor_add_products',compact('product_categories'));
    }

    // public function md_packages_active_list_search(Request $request)
    // {
    //     $token = Session::get('login_token');
    //  $package_name=$request->package_name;
    //     $apiUrl = url('/api/md-packages-active-list-search');
    //     $method = 'post';
    //     $body = [ 'package_name' => $package_name ];

    //     // Fetch active packages data
    //     $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
    //     // dd($responseData);
    //     $packages_active_list = $responseData['packages_deactive_list'];

    //     // Generate HTML for active packages
    //     $html1 = '';
    //     foreach ($packages_active_list as $package_active_list) {
    //         $html1 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_active_list['id'] . '">';
    //         $html1 .= '<div class="row card-row align-items-center">';
    //         $html1 .= '<div class="col-md-2 df-center px-0">';
    //         $html1 .= '<img src="' . asset('front/assets/img/Memorial.svg') . '" alt="">';
    //         $html1 .= '</div>';
    //         $html1 .= '<div class="col-md-6 justify-content-start ps-0">';
    //         $html1 .= '<div class="trmt-card-body">';
    //         $html1 .= '<h5 class="dashboard-card-title fw-600">Package No:' . (!empty($package_active_list['package_unique_no']) ? $package_active_list['package_unique_no'] : '') . '<span class="active">Active</span></h5>';
    //         $html1 .= '<h5 class="mb-0 fw-500">' . (!empty($package_active_list['package_name']) ? $package_active_list['package_name'] : '') . '</h5>';
    //         $html1 .= '</div></div>';
    //         $html1 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
    //         $html1 .= '<div class="trmt-card-footer footer-btns">';
    //         $html1 .= '<a href="' . url('edit-package/' . Crypt::encrypt($package_active_list['id'])) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
    //         $html1 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_active_list['id'] . '\', \'active\')" class="close-btn"><i class="fa fa-close"></i> Deactivate</a>';
    //         $html1 .= '</div></div></div></div>';
    //     }


    //     return $html1?$html1:false;
    // }
    public function active_product_list()
    {
        $token = Session::get('login_token');
        $apiUrl = url('/api/active-product-list');
        $method = 'GET';
        $body = null;

        // dd($apiUrl);
        // Fetch active packages data
        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        // dd($responseData);
        $packages_active_list = $responseData['active_products'];

        // Generate HTML for active packages
        $html1 = '';
        foreach ($packages_active_list as $package_active_list) {
            $html1 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_active_list['id'] . '">';
            $html1 .= '<div class="row card-row align-items-center">';
            $html1 .= '<div class="col-md-2 df-center px-0">';
            $html1 .= '<img src="' . asset('front/assets/img/Memorial.svg') . '" alt="">';
            $html1 .= '</div>';
            $html1 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html1 .= '<div class="trmt-card-body">';
            $html1 .= '<h5 class="dashboard-card-title fw-600">Package No:' . (!empty($package_active_list['product_unique_id']) ? $package_active_list['product_unique_id'] : '') . '<span class="active">Active</span></h5>';
            $html1 .= '<h5 class="mb-0 fw-500">' . (!empty($package_active_list['product_name']) ? $package_active_list['product_name'] : '') . '</h5>';
            $html1 .= '</div></div>';
            $html1 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html1 .= '<div class="trmt-card-footer footer-btns">';
            $html1 .= '<a href="' . url('edit-product/' . Crypt::encrypt($package_active_list['id'])) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html1 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_active_list['id'] . '\', \'active\')" class="close-btn"><i class="fa fa-close"></i> Deactivate</a>';
            $html1 .= '</div></div></div></div>';
        }
        if ($html1 == '') {
            $html1 = "<div class='no-data'>No Data Available</div>";
        }

        return $html1;
    }
    // public function md_packages_inactive_list_search(Request $request)
    // {
    //     $token = Session::get('login_token');
    //     $package_name=$request->package_name;
    //     $apiUrl2 = url('/api/md-packages-inactive-list-search');
    //     $method = 'post';
    //     $body = [ 'package_name' => $package_name ];


    //     // Fetch inactive packages data
    //     $responseData2 = $this->apiService->getData($token, $apiUrl2, $body, $method);
    //     $packages_deactive_list = $responseData2['packages_deactive_list'];

    //     // Generate HTML for inactive packages
    //     $html2 = '';
    //     foreach ($packages_deactive_list as $package_deactive_list) {
    //         $html2 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_deactive_list['id'] . '">';
    //         $html2 .= '<div class="row card-row align-items-center">';
    //         $html2 .= '<div class="col-md-2 df-center px-0">';
    //         $html2 .= '<img src="' . asset('front/assets/img/Memorial.svg') . '" alt="">';
    //         $html2 .= '</div>';
    //         $html2 .= '<div class="col-md-6 justify-content-start ps-0">';
    //         $html2 .= '<div class="trmt-card-body">';
    //         $html2 .= '<h5 class="dashboard-card-title fw-600">Package No:' . (!empty($package_deactive_list['package_unique_no']) ? $package_deactive_list['package_unique_no'] : '') . '<span class="cancel">Deactive</span></h5>';
    //         $html2 .= '<h5 class="mb-0 fw-500">' . (!empty($package_deactive_list['package_name']) ? $package_deactive_list['package_name'] : '') . '</h5>';
    //         $html2 .= '</div></div>';
    //         $html2 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
    //         $html2 .= '<div class="trmt-card-footer footer-btns">';
    //         $html2 .= '<a href="' . url('edit-package/' . Crypt::encrypt($package_deactive_list['id'])) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
    //         $html2 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_deactive_list['id'] . '\', \'deactive\')" class="close-btn"><i class="fa fa-close"></i> Activate</a>';
    //         $html2 .= '</div></div></div></div>';
    //     }

    //     return $html2?$html2:false;
    // }
    public function deactive_product_list()
    {
        $token = Session::get('login_token');

        $apiUrl2 = url('/api/inactive-product-list');
        $method = 'GET';
        $body = null;

        // Fetch inactive packages data
        $responseData2 = $this->apiService->getData($token, $apiUrl2, $body, $method);
        // dd($responseData2);
        $packages_deactive_list = $responseData2['inactive_products'];

        // Generate HTML for inactive packages
        $html2 = '';
        foreach ($packages_deactive_list as $package_deactive_list) {
            $html2 .= '<div class="treatment-card df-start w-100 mb-3" id="div_' . $package_deactive_list['id'] . '">';
            $html2 .= '<div class="row card-row align-items-center">';
            $html2 .= '<div class="col-md-2 df-center px-0">';
            $html2 .= '<img src="' . asset('front/assets/img/Memorial.svg') . '" alt="">';
            $html2 .= '</div>';
            $html2 .= '<div class="col-md-6 justify-content-start ps-0">';
            $html2 .= '<div class="trmt-card-body">';
            $html2 .= '<h5 class="dashboard-card-title fw-600">Package No:' . (!empty($package_deactive_list['product_unique_id']) ? $package_deactive_list['product_unique_id'] : '') . '<span class="cancel">Deactive</span></h5>';
            $html2 .= '<h5 class="mb-0 fw-500">' . (!empty($package_deactive_list['product_name']) ? $package_deactive_list['product_name'] : '') . '</h5>';
            $html2 .= '</div></div>';
            $html2 .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
            $html2 .= '<div class="trmt-card-footer footer-btns">';
            $html2 .= '<a href="' . url('edit-product/' . Crypt::encrypt($package_deactive_list['id'])) . '" class="view-btn"><i class="fa fa-eye"></i> View</a>';
            $html2 .= '<a href="javascript:void(0);" onclick="change_status(\'' . $package_deactive_list['id'] . '\', \'deactive\')" class="close-btn"><i class="fa fa-close"></i> Activate</a>';
            $html2 .= '</div></div></div></div>';
        }

        if ($html2 == '') {
            $html2 = "<div class='no-data'>No Data Available</div>";
        }

        return $html2;
    }

    public function edit_product(Request $request)
    {
        $token = Session::get('login_token');

        $apiUrl = url('/api/vendor-product-view');
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt($encryptedId);
        $body = ['id' => $decryptedId];
        $method = 'POST';

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
        $product_list = $responseData['product_data'];
        $product_gallery_list = $responseData['product_gallery'];
        // dd( $responseData );

        $token = Session::get('login_token');
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];
        return view('front/mdhealth/vendor/vendor_add_products', compact('product_list', 'product_categories','product_gallery_list'));
    }

}
