<?php
namespace App\Http\Controllers\Front\MdShop;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;
use Session;
use App\Traits\MediaTrait;

class MdShoppingController extends Controller
{
    use MediaTrait;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function mdshop_home()
    {
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];


        return view('front.mdShop.index', compact('product_categories'));
    }
    public function product_view(Request $request)
    {
        // dd($request);
        $decryptedID = Crypt::decrypt($request->id);
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];

        // $token = Session::get( 'login_token' );
        // $token = Session::get( 'login_token' );
        // $package_name = $request->package_name;
        $apiUrl2 = url('/api/customer-product-view');
        $method2 = 'post';
        $body2 = ['id' => $decryptedID];

        $responseData2 = $this->apiService->getData($token, $apiUrl2, $body2, $method2);
        // dd($responseData2);
        $product_data = $responseData2['product_data'];
        $product_gallery = $responseData2['product_gallery'];
        $other_products = $responseData2['other_products'];
        // dd($other_products);

        $html = '';
        foreach ($other_products as $filtered_product) {
            $html .= '<div class="col-3">
        <a href="' . url('product/' . Crypt::encrypt($filtered_product['id'])) . '" class="mt-4 card-link">
            <div class="card" >
                <img src="' . $filtered_product['vendor_product_image_path'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="mb-1">' . $filtered_product['product_name'] . '</h5>
                    <p class="mb-5 camptonBook">' . $filtered_product['product_descrition'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="camptonBold fs-4 text-green mb-0">' . $filtered_product['sale_price'] . ' ₺</p>
                        <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>';
        }
        if ($html == '') {
            $html = "<div class='no-data'>No Data Available !</div>";
        }




        return view('front.mdShop.product', compact('product_data', 'product_gallery', 'html', 'product_categories'));
    }

    public function featured_product(Request $request)
    {
        // dd($request);
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/featured-product');
        $body = null;
        $method = 'get';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $filtered_products = $responseData['featured_products'];

        // dd($filtered_products);
        $html = '';

        foreach ($filtered_products as $filtered_product) {
            $html .= '<div class="col-3">
        <a href="' . url('product/' . Crypt::encrypt($filtered_product['id'])) . '" class="mt-4 card-link">
            <div class="card" >
                <img src="' . $filtered_product['product_image'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="mb-1">' . $filtered_product['product_name'] . '</h5>
                    <p class="mb-5 camptonBook">' . $filtered_product['product_description'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="camptonBold fs-4 text-green mb-0">' . $filtered_product['sale_price'] . ' ₺</p>
                        <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>';
        }
        if ($html == '') {
            $html = "<div class='no-data'>No Data Available !</div>";
        }

        return $html;
    }
    public function get_product(Request $request)
    {
        // dd($request);
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/filter-product-list');
        $body = ['subcategory_id' => $request->subcategory_id];
        $method = 'POST';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $filtered_products = $responseData['filtered_products'];

        // dd($filtered_products);
        $html = '';

        foreach ($filtered_products as $filtered_product) {
            $html .= '<div class="col-3">
                            <a href="' . url('product/' . Crypt::encrypt($filtered_product['id'])) . '" class="mt-4 card-link">
                                <div class="card" >
                                    <img src="' . $filtered_product['product_image'] . '" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="mb-1">' . $filtered_product['product_name'] . '</h5>
                                        <p class="mb-5 camptonBook">' . $filtered_product['product_description'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="camptonBold fs-4 text-green mb-0">' . $filtered_product['sale_price'] . ' ₺</p>
                                            <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
        }
        if ($html == '') {
            $html = "<div class='no-data'>No Data Available !</div>";
        }
        $url = '/view-products';

        return ['html' => $html, 'url' => $url];
    }
    public function view_all_products(Request $request)
    {

     
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];

        $decryptedID = Crypt::decrypt($request->id);

       

        
        $token = null;
        $apiUrl1 = url('/api/vendor-product-lists');
        $body = ['id' => $decryptedID];
        $method = 'POST';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        dd($responseData);
        $filtered_products = $responseData['vendor_products'];
        $product_data = $responseData['product_data'];
        $vendor = $responseData['vendor'];

        // dd($filtered_products);
        $html = '';

        foreach ($filtered_products as $filtered_product) {
            // dd($filtered_product['vendor_product_image_path']);
            $html .= '<div class="col-3">
        <a href="' . url('product/' . Crypt::encrypt($filtered_product['id'])) . '" class="mt-4 card-link">
            <div class="card" >
                <img src=' . $filtered_product['vendor_product_image_path'] . ' class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="mb-1">' . $filtered_product['product_name'] . '</h5>
                    <p class="mb-5 camptonBook">' . $filtered_product['product_descrition'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="camptonBold fs-4 text-green mb-0">' . $filtered_product['sale_price'] . ' ₺</p>
                        <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>';
        }
        if ($html == '') {
            $html = "<div class='no-data'>No Data Available !</div>";
        }

        // return $html;
        return view('front.mdShop.allProducts', compact('product_categories', 'html', 'product_data', 'vendor'));
    }

    public function cart(Request $request)
    {
        // dd($request);
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];

        //     $decryptedID=Crypt::decrypt($request->id);
        //     $token = null;
        //     $apiUrl1 = url('/api/vendor-product-lists');
        //     $body = ['id' => $decryptedID];
        //     $method = 'POST';

        //     $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        //     // dd($responseData);
        //     $filtered_products = $responseData['vendor_products'];
        //     $product_data = $responseData['product_data'];
        //     $vendor = $responseData['vendor'];

        //     // dd($filtered_products);
        //     $html = '';

        //     foreach ($filtered_products as $filtered_product) {
        //         // dd($filtered_product['vendor_product_image_path']);
        //         $html .= '<div class="col-3">
        //     <a href="' . url('product/' . Crypt::encrypt( $filtered_product[ 'id' ] ) ) . '" class="mt-4 card-link">
        //         <div class="card" >
        //             <img src=' .$filtered_product['vendor_product_image_path']. ' class="card-img-top" alt="...">
        //             <div class="card-body">
        //                 <h5 class="mb-1">' .$filtered_product['product_name']. '</h5>
        //                 <p class="mb-5 camptonBook">' .$filtered_product['product_descrition']. '</p>
        //                 <div class="d-flex justify-content-between align-items-center">
        //                     <p class="camptonBold fs-4 text-green mb-0">' .$filtered_product['sale_price']. ' ₺</p>
        //                     <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
        //                 </div>
        //             </div>
        //         </div>
        //     </a>
        // </div>';
        //     }
        //     if ($html == '') {
        //         $html = "<div class='no-data'>No Data Available !</div>";
        //     },'html','product_data','vendor'

        // return $html;
        return view('front.mdShop.cart', compact('product_categories'));
    }

    public function catgorywisefilter(Request $request)
    {
        // dd($request);
        $token = Session::get( 'login_token' )?Session::get( 'login_token' ):null;
        $apiUrl1 = url('/api/product-category');
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
        // dd($responseData);
        $product_categories = $responseData['product_category'];

    //     $token = null;
    //     $apiUrl1 = url('/api/filter-product-list');
    //     $body = ['subcategory_id' => $request->subcategory_id];
    //     $method = 'POST';

    //     $responseData = $this->apiService->getData($token, $apiUrl1, $body, $method);
    //     dd($responseData);
    //     $filtered_products = $responseData['filtered_products'];

    //     // dd($filtered_products);
    //     $html = '';

    //     foreach ($filtered_products as $filtered_product) {
    //         $html .= '<div class="col-3">
    //     <a href="' . url('product/' . Crypt::encrypt($filtered_product['id'])) . '" class="mt-4 card-link">
    //         <div class="card" >
    //             <img src="' . $filtered_product['product_image'] . '" class="card-img-top" alt="...">
    //             <div class="card-body">
    //                 <h5 class="mb-1">' . $filtered_product['product_name'] . '</h5>
    //                 <p class="mb-5 camptonBook">' . $filtered_product['product_description'] . '</p>
    //                 <div class="d-flex justify-content-between align-items-center">
    //                     <p class="camptonBold fs-4 text-green mb-0">' . $filtered_product['sale_price'] . ' ₺</p>
    //                     <img src="' . asset('front/assets/img/ArrowRight.svg') . '" alt="">
    //                 </div>
    //             </div>
    //         </div>
    //     </a>
    // </div>';
    //     }
    //     if ($html == '') {
    //         $html = "<div class='no-data'>No Data Available !</div>";
    //     }


        // return $html;
        return view('front.mdShop.categorisedProduct', compact('product_categories'));
    }

}
