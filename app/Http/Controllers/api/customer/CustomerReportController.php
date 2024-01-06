<?php

namespace App\Http\Controllers\api\customer;

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
use Storage;

class CustomerReportController extends BaseController
{

    
    public function customer_all_reports_list()
    {
        $provider_report_list = MedicalProviderReports::with(['customerPackagePurchase', 'customer', 'provider', 'provider_logo'])
            ->where('custome_id',Auth::user()->id)
            ->where('status', 'active')
            ->get();


          

    
        $formatted_data = [];
    
        foreach ($provider_report_list as $report) {
            $customerPurchasePackage = $report->customerPackagePurchase;
            $providerData = $report->provider;
            $providerLogo = $report->provider_logo;
            $customerData = $customerPurchasePackage->customer;
    
            $providerId = $providerData->id;
    
            if (!isset($formatted_data[$providerId])) {
                $formatted_data[$providerId] = [
                    'provider_data' => [
                        'company_name' => $providerData->company_name,
                        'logo_path' => isset($providerLogo) ? url(Storage::url($providerLogo->company_logo_image_path)) : null,
                    ],
                    'customer_data' => [
                        'name' => $customerData->first_name . ' ' . $customerData->last_name,
                    ],
                    'report_count' => 0, 
                    'reports' => [],
                ];
            }
    
            $formatted_data[$providerId]['reports'][] = [
                'id' => $report->id,
                'report_title' => $report->report_title,
                'report_path' => isset($report->report_path) ? url(Storage::url($report->report_path)) : null,
                'report_name' => $report->report_name,
                'created_at' => $report->created_at,
            ];
    
            $formatted_data[$providerId]['report_count']++;
        }
    
        if (!empty($formatted_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Customer report list found.',
                'provider_report_list' => array_values($formatted_data),
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Customer report list not found.',
            ]);
        }
    }


    public function customer_reports_search(Request $request)
   {
   
    $validator = Validator::make($request->all(), [
        'search_query' => 'required|string',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }

    $searchQuery = $request->input('search_query');

  
    $customerId = auth()->user()->id; 

    
    //$customerId=1; 

    $searchResults = MedicalProviderReports::where(function ($query) use ($searchQuery) {
        $query->where('report_title', 'like', '%' . $searchQuery . '%')
            ->orWhere('report_name', 'like', '%' . $searchQuery . '%');
    })
        ->orWhereHas('customerPackagePurchase.customer', function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                ->orWhere('last_name', 'like', '%' . $searchQuery . '%')
                ->orWhere('full_name', 'like', '%' . $searchQuery . '%');
        })
        ->orWhereHas('customerPackagePurchase.package', function ($query) use ($searchQuery) {
            $query->where('package_name', 'like', '%' . $searchQuery . '%');
        })
        ->orWhereHas('provider', function ($query) use ($searchQuery) {
            $query->where('company_name', 'like', '%' . $searchQuery . '%');
        })
        ->where('status', 'active')
        ->whereHas('customerPackagePurchase.customer', function ($query) use ($customerId) {
            $query->where('id', $customerId);
        })
        ->get();

    $formattedResults = [];
    
    foreach ($searchResults as $result) {
        $customerPurchasePackage = $result->customerPackagePurchase;
        $providerData = $result->provider;
        $providerLogo = $result->provider_logo;
        $customerData = $customerPurchasePackage->customer;

        $providerId = $providerData->id;

        if (!isset($formattedResults[$providerId])) {
            $formattedResults[$providerId] = [
                'provider_data' => [
                    'logo_path' => isset($providerLogo) ? url(Storage::url($providerLogo->company_logo_image_path)) : null,
                    'provider_name' => $providerData->company_name,
                ],
                'customer_data' => [
                    'name' => $customerData->first_name . ' ' . $customerData->last_name,
                ],
                'report_count' => 0,
                'reports' => [],
            ];
        }

        $formattedResults[$providerId]['reports'][] = [
            'id' => $result->id,
            'report_title' => $result->report_title,
            'report_path' => isset($report->report_path) ? url(Storage::url($report->report_path)) : null,
            'report_name' => $result->report_name,
            'created_at' => $result->created_at,
        ];

        $formattedResults[$providerId]['report_count']++;
    }

    $formattedResults = array_values($formattedResults);

    if (!empty($formattedResults)) {
        return response()->json([
            'status' => 200,
            'message' => 'Search results found.',
            'search_results' => $formattedResults,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No matching reports found for the given search query.',
        ]);
    }
}
    



    
    



   
}
