<?php

namespace App\Http\Controllers\admin\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Packages;
use App\Models\MDFoodRegisters;
use App\Models\MedicalProviderRegistrater;
use App\Models\VendorRegister;

use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class ManageVendorController extends Controller
{

    public function pending_vendors()
    {

        $medical_pending = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $medical_approved = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $medical_rejected = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $food_pending = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $food_approved = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $food_rejected = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $shop_pending = VendorRegister::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $shop_approved = VendorRegister::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $shop_rejected = VendorRegister::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $all_pending_vendors = collect([]);

        if (!$medical_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($medical_pending);
        }

        if (!$food_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($food_pending);
        }

        if (!$shop_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($shop_pending);
        }

        $all_approved_vendors = collect([]);

        if (!$medical_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($medical_approved);
        }

        if (!$food_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($food_approved);
        }

        if (!$shop_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($shop_approved);
        }

        $all_rejected_vendors = collect([]);

        if (!$medical_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($medical_rejected);
        }

        if (!$food_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($food_rejected);
        }

        if (!$shop_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($shop_rejected);
        }

        $sorted_pending_vendors = $all_pending_vendors->sortBy('created_by');
        $sorted_approved_vendors = $all_approved_vendors->sortBy('created_by');
        $sorted_rejected_vendors = $all_rejected_vendors->sortBy('created_by');

        $total_pending_count = $sorted_pending_vendors->count();
        $total_approved_count = $sorted_approved_vendors->count();
        $total_rejected_count = $sorted_rejected_vendors->count();

        return view('admin.vendors.pending-vendors', compact('total_pending_count', 'total_approved_count', 'total_rejected_count'));
    }






    public function pending_vendor_data_table(Request $request)
    {

        $medical_vendor = [];
        $food_vendor = [];
        $shop_vendor = [];

        if ($request->vendor_type == 'all') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();

            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();

            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'medical_service_provider') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'food_vendor') {
            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'shop_vendor') {
            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'pending')
                ->with('city')
                ->get();
        }

        $all_vendors = collect([]);

        $all_vendors = $all_vendors->merge($medical_vendor);
        $all_vendors = $all_vendors->merge($food_vendor);
        $all_vendors = $all_vendors->merge($shop_vendor);

        $sorted_vendors = $all_vendors->sortBy('created_by');







        if ($request->ajax()) {
            return DataTables::of($sorted_vendors)
                ->addIndexColumn()

                ->addColumn('reg_date', function ($row) {
                    if (!empty($row->created_at)) {
                        return ucfirst($row->created_at);
                    }
                })

                ->addColumn('vendor_id', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst($row->provider_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst($row->food_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst($row->vendor_unique_no);
                        }
                    }
                })





                ->addColumn('vendor_type', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst('Medical Service Provider');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst('Food Vendor');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst('Shop Vendor');
                        }
                    }
                })





                ->addColumn('company_name', function ($row) {
                    if (!empty($row->company_name)) {
                        return ucfirst($row->company_name);
                    }
                })


                ->addColumn('city', function ($row) {
                    if (!empty($row->city->city_name)) {
                        return ucfirst($row->city->city_name);
                    }
                })


                ->addColumn('contact_no', function ($row) {
                    if (!empty($row->mobile_no)) {
                        return ucfirst($row->mobile_no);
                    }
                })





                ->addColumn('action', function ($row) {
                    $actionBtn = '
            <div class="text-end d-flex align-items-center justify-content-end gap-3">
            <a href="' . route('medical_tourism.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
            <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
           </a>
        
            <a href="javascript:void(0)" data-id="' . $row->id . '"  data-table="' . $row->vendor_type . '" data-flash="Vendor Deleted Successfully!" class="btn btn-danger vendor-delete btn-xs" title="Delete">
                <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
            </a>
            </div>';

                    return $actionBtn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
    }







    public function approved_vendors()
    {

        $medical_pending = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $medical_approved = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $medical_rejected = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $food_pending = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $food_approved = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $food_rejected = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $shop_pending = VendorRegister::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $shop_approved = VendorRegister::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $shop_rejected = VendorRegister::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $all_pending_vendors = collect([]);

        if (!$medical_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($medical_pending);
        }

        if (!$food_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($food_pending);
        }

        if (!$shop_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($shop_pending);
        }

        $all_approved_vendors = collect([]);

        if (!$medical_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($medical_approved);
        }

        if (!$food_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($food_approved);
        }

        if (!$shop_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($shop_approved);
        }

        $all_rejected_vendors = collect([]);

        if (!$medical_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($medical_rejected);
        }

        if (!$food_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($food_rejected);
        }

        if (!$shop_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($shop_rejected);
        }

        $sorted_pending_vendors = $all_pending_vendors->sortBy('created_by');
        $sorted_approved_vendors = $all_approved_vendors->sortBy('created_by');
        $sorted_rejected_vendors = $all_rejected_vendors->sortBy('created_by');

        $total_pending_count = $sorted_pending_vendors->count();
        $total_approved_count = $sorted_approved_vendors->count();
        $total_rejected_count = $sorted_rejected_vendors->count();


        return view('admin.vendors.approved-vendors', compact('total_pending_count', 'total_approved_count', 'total_rejected_count'));
    }




    public function approved_vendor_data_table(Request $request)
    {
        $medical_vendor = [];
        $food_vendor = [];
        $shop_vendor = [];

        if ($request->vendor_type == 'all') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();

            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();

            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'medical_service_provider') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'food_vendor') {
            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'shop_vendor') {
            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'approved') // Updated to 'approved'
                ->with('city')
                ->get();
        }

        $all_vendors = collect([]);

        $all_vendors = $all_vendors->merge($medical_vendor);
        $all_vendors = $all_vendors->merge($food_vendor);
        $all_vendors = $all_vendors->merge($shop_vendor);

        $sorted_vendors = $all_vendors->sortBy('created_by');






        if ($request->ajax()) {
            return DataTables::of($sorted_vendors)
                ->addIndexColumn()

                ->addColumn('reg_date', function ($row) {
                    if (!empty($row->created_at)) {
                        return ucfirst($row->created_at);
                    }
                })

                ->addColumn('vendor_id', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst($row->provider_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst($row->food_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst($row->vendor_unique_no);
                        }
                    }
                })





                ->addColumn('vendor_type', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst('Medical Service Provider');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst('Food Vendor');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst('Shop Vendor');
                        }
                    }
                })





                ->addColumn('company_name', function ($row) {
                    if (!empty($row->company_name)) {
                        return ucfirst($row->company_name);
                    }
                })


                ->addColumn('city', function ($row) {
                    if (!empty($row->city->city_name)) {
                        return ucfirst($row->city->city_name);
                    }
                })


                ->addColumn('contact_no', function ($row) {
                    if (!empty($row->mobile_no)) {
                        return ucfirst($row->mobile_no);
                    }
                })





                ->addColumn('action', function ($row) {
                    $actionBtn = '
        <div class="text-end d-flex align-items-center justify-content-end gap-3">
        <a href="' . route('medical_tourism.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
        <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
       </a>
    
        <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Medical Tourism Deleted Successfully!" class="btn btn-danger medical-tourism-delete btn-xs" title="Delete">
            <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
        </a>
        </div>';

                    return $actionBtn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
    }









    public function rejected_vendors()
    {


        $medical_pending = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $medical_approved = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $medical_rejected = MedicalProviderRegistrater::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $food_pending = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $food_approved = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $food_rejected = MDFoodRegisters::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $shop_pending = VendorRegister::where('status', 'active')->where('vendor_status', 'pending')->with('city')->get();
        $shop_approved = VendorRegister::where('status', 'active')->where('vendor_status', 'approved')->with('city')->get();
        $shop_rejected = VendorRegister::where('status', 'active')->where('vendor_status', 'rejected')->with('city')->get();

        $all_pending_vendors = collect([]);

        if (!$medical_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($medical_pending);
        }

        if (!$food_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($food_pending);
        }

        if (!$shop_pending->isEmpty()) {
            $all_pending_vendors = $all_pending_vendors->merge($shop_pending);
        }

        $all_approved_vendors = collect([]);

        if (!$medical_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($medical_approved);
        }

        if (!$food_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($food_approved);
        }

        if (!$shop_approved->isEmpty()) {
            $all_approved_vendors = $all_approved_vendors->merge($shop_approved);
        }

        $all_rejected_vendors = collect([]);

        if (!$medical_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($medical_rejected);
        }

        if (!$food_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($food_rejected);
        }

        if (!$shop_rejected->isEmpty()) {
            $all_rejected_vendors = $all_rejected_vendors->merge($shop_rejected);
        }

        $sorted_pending_vendors = $all_pending_vendors->sortBy('created_by');
        $sorted_approved_vendors = $all_approved_vendors->sortBy('created_by');
        $sorted_rejected_vendors = $all_rejected_vendors->sortBy('created_by');

        $total_pending_count = $sorted_pending_vendors->count();
        $total_approved_count = $sorted_approved_vendors->count();
        $total_rejected_count = $sorted_rejected_vendors->count();

        return view('admin.vendors.rejected-vendors', compact('total_pending_count', 'total_approved_count', 'total_rejected_count'));
    }




    public function rejected_vendor_data_table(Request $request)
    {
        $medical_vendor = [];
        $food_vendor = [];
        $shop_vendor = [];

        if ($request->vendor_type == 'all') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();

            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();

            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'medical_service_provider') {
            $medical_vendor = MedicalProviderRegistrater::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'food_vendor') {
            $food_vendor = MDFoodRegisters::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();
        } elseif ($request->vendor_type == 'shop_vendor') {
            $shop_vendor = VendorRegister::where('status', 'active')
                ->where('vendor_status', 'rejected') // Updated to 'rejected'
                ->with('city')
                ->get();
        }

        $all_vendors = collect([]);

        $all_vendors = $all_vendors->merge($medical_vendor);
        $all_vendors = $all_vendors->merge($food_vendor);
        $all_vendors = $all_vendors->merge($shop_vendor);

        $sorted_vendors = $all_vendors->sortBy('created_by');

        if ($request->ajax()) {
            return DataTables::of($sorted_vendors)
                ->addIndexColumn()

                ->addColumn('reg_date', function ($row) {
                    if (!empty($row->created_at)) {
                        return ucfirst($row->created_at);
                    }
                })

                ->addColumn('vendor_id', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst($row->provider_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst($row->food_unique_no);
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst($row->vendor_unique_no);
                        }
                    }
                })





                ->addColumn('vendor_type', function ($row) {

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'medical_service_provider')) {
                        if (!empty($row->provider_unique_no)) {
                            return ucfirst('Medical Service Provider');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'food_vendor')) {
                        if (!empty($row->food_unique_no)) {
                            return ucfirst('Food Vendor');
                        }
                    }

                    if (!empty($row->vendor_type) && ($row->vendor_type == 'shop_vendor')) {
                        if (!empty($row->vendor_unique_no)) {
                            return ucfirst('Shop Vendor');
                        }
                    }
                })





                ->addColumn('company_name', function ($row) {
                    if (!empty($row->company_name)) {
                        return ucfirst($row->company_name);
                    }
                })


                ->addColumn('city', function ($row) {
                    if (!empty($row->city->city_name)) {
                        return ucfirst($row->city->city_name);
                    }
                })


                ->addColumn('contact_no', function ($row) {
                    if (!empty($row->mobile_no)) {
                        return ucfirst($row->mobile_no);
                    }
                })





                ->addColumn('action', function ($row) {
                    $actionBtn = '
        <div class="text-end d-flex align-items-center justify-content-end gap-3">
        <a href="' . route('medical_tourism.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
        <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
       </a>
    
        <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Medical Tourism Deleted Successfully!" class="btn btn-danger medical-tourism-delete btn-xs" title="Delete">
            <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
        </a>
        </div>';

                    return $actionBtn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
    }






public function vendor_delete(Request $request)
{
    $id = !empty($request->id) ? $request->id :'';
    $vendor_type = !empty($request->vendor_type) ? $request->vendor_type:'';

  


    if($vendor_type=='medical_service_provider'){
    $old_data = MedicalProviderRegistrater::where('id', $id)->first();
    $new_data = MedicalProviderRegistrater::where('id', $id)->update([
        'status' => 'delete',
        'modified_ip_address' => $_SERVER['REMOTE_ADDR']
    ]);
    }


    
    if($vendor_type=='food_vendor'){
        $old_data = MDFoodRegisters::where('id', $id)->first();
        $new_data = MDFoodRegisters::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    }


    if($vendor_type=='shop_vendor'){
        $old_data = VendorRegister::where('id', $id)->first();
        $new_data = VendorRegister::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    }
    
    


    return response()->json(['message' =>'Vendor Is Deleted', 'status' => 'true']);
}

}
