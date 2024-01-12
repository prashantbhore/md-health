<?php
namespace App\Http\Controllers\Front\MdBooking;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Crypt;
use Session;
use App\Traits\MediaTrait;

class MdBookingController extends Controller {
    use MediaTrait;

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function mdbooking_home() {
        return view( 'front.mdhealth.md-booking.md-booking-home-page' );
    }
}
