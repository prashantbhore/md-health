<?php

namespace App\Http\Controllers\Front\Mdhome;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;
use Session;
use App\Traits\MediaTrait;

class MdHomeController extends Controller {
    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function home() {
        return view( 'front.mdHome.index' );
    }
}
