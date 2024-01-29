<?php

namespace App\Http\Controllers\admin\mlm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMlmController extends Controller
{
    public function index()
    {
        return view('admin.multi-level-marketing.earner-details');
    }
}
