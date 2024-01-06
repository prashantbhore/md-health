<?php

namespace App\Http\Controllers\api\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\VendorRegister;
use App\Models\Country;
use App\Models\Cities;
use App\Models\VendorProductGallery;
use App\Models\VendorLogo;
use App\Models\VendorLicense;
use Storage;

class UpdateVendorProfileController extends Controller
{
    //
}
