<?php

namespace App\Http\Controllers\admin\review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Packages;
use App\Models\CustomerReviews;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class reviewController extends Controller
{

    public function pendingReview(){
        $pendingReviews=CustomerReviews::where('status','active')->with(['product.provider','customer'])->get();

     //dd($pendingReviews);


        return view('admin.reviews.pending-reviews',compact('pendingReviews'));
    }


    public function publishedReview(){

        return view('admin.reviews.published-reviews');
    }
    
}
