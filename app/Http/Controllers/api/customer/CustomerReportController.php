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

class CustomerReportController extends Controller
{

    
    public function customer_all_reports_list()
    {
        $provider_report_list = MedicalProviderReports::with(['customerPackagePurchase', 'customer', 'provider', 'provider_logo'])
            ->where('custome_id', 1)
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
                        'logo_path' => isset($providerLogo) ? $providerLogo->company_logo_image_path : null,
                    ],
                    'customer_data' => [
                        'name' => $customerData->first_name . ' ' . $customerData->last_name,
                    ],
                    'report_count' => 0, // Initialize report count
                    'reports' => [],
                ];
            }
    
            $formatted_data[$providerId]['reports'][] = [
                'id' => $report->id,
                'report_title' => $report->report_title,
                'report_path' => $report->report_path,
                'report_name' => $report->report_name,
                'created_at' => $report->created_at,
            ];
    
            // Increment report count for each report
            $formatted_data[$providerId]['report_count']++;
        }
    
        if (!empty($formatted_data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Customer report list found.',
                'provider_report_list' => array_values($formatted_data), // Reindex the array keys
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Customer report list not found.',
            ]);
        }
    }
    



   
}
