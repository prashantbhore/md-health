<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use App\Models\MedicalProviderReports;
use App\Models\CustomerPurchaseDetails;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderLogo;
use Storage;

class ReportsController extends BaseController
{

    use MediaTrait;

    public function add_new_report(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'report_title' => 'required',
            'customer_package_purchage_id' => 'required',
            'report_path' => 'required|mimes:pdf,png,jpeg,tiff',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $dataString = $request->customer_package_purchage_id;
        $idArray = explode(',', trim($dataString, "\""));

        $report_input = [];
        $report_input['report_title'] = $request->report_title;
        $report_input['customer_package_purchage_id'] = $idArray[0];
        $report_input['custome_id'] = $idArray[1];
        $report_input['package_id'] = $idArray[0];

        //$report_input['report_path'] = $request->report_path;


        if ($request->has('report_path')) {

            $report_input['report_path'] = $this->verifyAndUpload($request, 'report_path', 'providerreports');
            $original_name = $request->file('report_path')->getClientOriginalName();
            $report_input['report_name'] = $original_name;
        }

        $report_input['medical_provider_id'] = Auth::user()->id;
        $report_input['created_by'] = Auth::user()->id;

        $AddNewReports = MedicalProviderReports::create($report_input);

        if (!empty($AddNewReports)) {
            return response()->json([
                'status' => 200,
                'message' => 'Report added successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Report not added.',
            ]);
        }
    }



  public function patient_package_purchage_list()
{
    $patientList = CustomerPurchaseDetails::where('provider_id', Auth::user()->id)
        ->with(['customer', 'package'])
        ->where('status', 'active')
        ->get();

    if (!empty($patientList)) {
        $formattedList = [];

        foreach ($patientList as $purchase) {
            // Check if customer and package exist before accessing their properties
            if ($purchase->customer && $purchase->package) {
                $customerPurchaseId = $purchase->id;
                $customerId = $purchase->customer->id;
                $packageId = $purchase->package->id;
                $patientName = $purchase->customer->full_name;
                $packageName = $purchase->package->package_name;

                $id = implode(',', [$customerPurchaseId, $customerId, $packageId]);
                $name = $patientName . ' - ' . $packageName;

                $formattedList[] = [
                    'id' => $id,
                    'name' => $name,
                ];
            }
        }

        if (!empty($formattedList)) {
            return response()->json([
                'status' => 200,
                'message' => 'Patient package Purchase list found.',
                'customer_package_purchase_list' => $formattedList,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No valid customer or package found in the Patient package Purchase list.',
            ]);
        }
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Something went wrong. Patient package Purchase list not found.',
        ]);
    }
}


public function provider_all_reports_list()
{
   
    $provider_report_list = MedicalProviderReports::with(['customerPackagePurchase', 'customer', 'provider', 'provider_logo'])
    ->where('medical_provider_id', Auth::user()->id)
    ->where('status', 'active')
    ->latest('created_at')
    ->get();


      $logo=MedicalProviderLogo::where('medical_provider_id',Auth::user()->id)->where('status','active')->first();

    $formatted_data = [];

    foreach ($provider_report_list as $report) {
        $customerPurchasePackage = $report->customerPackagePurchase;
        $providerData = $report->provider;
        $providerLogo = $report->provider_logo;

        if ($customerPurchasePackage !== null && $providerData !== null) {
            $customerData = $customerPurchasePackage->customer;

            $packageIndex = null;

            foreach ($formatted_data as $index => $formattedItem) {
                if ($formattedItem['customer_purchased_package']['order_id'] == $customerPurchasePackage->order_id) {
                    $packageIndex = $index;
                    break;
                }
            }

            if ($packageIndex !== null) {
                $formatted_data[$packageIndex]['reports'][] = [
                    'id' => $report->id,
                    'report_title' => $report->report_title,
                    'report_path' => isset($report->report_path) ? url(Storage::url($report->report_path)) : null,
                    'report_name' => $report->report_name,
                    'created_at' => $report->created_at,
                ];

                $formatted_data[$packageIndex]['report_count']++;
            } else {
                $formatted_data[] = [
                    'customer_purchased_package' => [
                        'order_id' => $customerPurchasePackage->order_id,
                    ],
                    'provider_data' => [
                        'logo_path' => isset($providerLogo) ? url(Storage::url($providerLogo->company_logo_image_path)) : null,
                    ],
                    'customer_data' => [
                        'name' => $customerData !== null ? $customerData->first_name . ' ' . $customerData->last_name : null,
                    ],
                    'reports' => [
                        [
                            'id' => $report->id,
                            'report_title' => $report->report_title,
                            'report_path' => isset($report->report_path) ? url(Storage::url($report->report_path)) : null,
                            'report_name' => $report->report_name,
                            'created_at' => $report->created_at,
                        ],
                    ],
                    'report_count' => 1,
                ];
            }
        }
    }

    if (!empty($formatted_data)){
        return response()->json([
            'status' => 200,
            'message' => 'Provider report list found.',
            'provider_report_list' => $formatted_data,
            'logo'=>$logo,
        ]);
    } else{
        return response()->json([
            'status' => 404,
            'message' => 'Something went wrong. Provider report list not found.',
        ]);
    }
}



    public function provider_reports_search(Request $request)
    {

    $validator = Validator::make($request->all(), [
        'search_query' => 'required|string',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }


    $searchQuery = $request->input('search_query');

    $logo=MedicalProviderLogo::where('medical_provider_id',Auth::user()->id)->where('status','active')->first();


    $searchResults = MedicalProviderReports::where(function ($query) use ($searchQuery) {
        $query->where('report_title', 'like', '%' . $searchQuery . '%')
            ->orWhere('report_name', 'like', '%' . $searchQuery . '%');
    })
    ->orWhereHas('customerPackagePurchase.customer', function ($query) use ($searchQuery) {
        $query->where(function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('last_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('full_name', 'like', '%' . $searchQuery . '%');
        });
    })
    ->orWhereHas('customerPackagePurchase.package', function ($query) use ($searchQuery) {
        $query->where('package_name', 'like', '%' . $searchQuery . '%');
    })
    ->orWhereHas('provider', function ($query) use ($searchQuery) {
        $query->where('company_name', 'like', '%' . $searchQuery . '%');
    })
    ->whereHas('provider', function ($query) {
        $query->where('medical_provider_id', Auth::user()->id);
    })
    ->where('status', 'active')
    ->get();


    $formattedResults = [];

    foreach ($searchResults as $result) {
        $customerPurchasePackage = $result->customerPackagePurchase;
        $providerData = $result->provider;
        $providerLogo = $result->provider_logo;
        $customerData = $customerPurchasePackage->customer;

        $packageIndex = null;

        foreach ($formattedResults as $index => $formattedItem) {
            if ($formattedItem['customer_purchased_package']['order_id'] == $customerPurchasePackage->order_id) {
                $packageIndex = $index;
                break;
            }
        }

        if ($packageIndex !== null) {
            $formattedResults[$packageIndex]['reports'][] = [
                'id' => $result->id,
                'report_title' => $result->report_title,
                'report_path' => isset($report->report_path) ? url(Storage::url($report->report_path)) : null,
                'report_name' => $result->report_name,
                'created_at' => $result->created_at,
            ];

            $formattedResults[$packageIndex]['report_count']++;
        } else {
            $formattedResults[] = [
                'customer_purchased_package' => [
                    'order_id' => $customerPurchasePackage->order_id,
                ],
                'provider_data' => [
                    'logo_path' => isset($providerLogo) ? url(Storage::url($providerLogo->company_logo_image_path)) : null,
                    'provider_name' => $providerData->provider_name,
                ],
                'customer_data' => [
                    'name' => $customerData->first_name . ' ' . $customerData->last_name,
                ],
                'reports' => [
                    [
                        'id' => $result->id,
                        'report_title' => $result->report_title,
                        'report_path' => isset($result->report_path) ? url(Storage::url($result->report_path)) : null,
                        'report_name' => $result->report_name,
                        'created_at' => $result->created_at,
                    ],
                ],
                'report_count' => 1,
            ];
        }
    }

    if (!empty($formattedResults)) {
        return response()->json([
            'status' => 200,
            'message' => 'Search results found.',
            'provider_report_list' => $formattedResults,
            'logo'=>$logo,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No matching reports found for the given search query.',
        ]);
    }
    }



}
