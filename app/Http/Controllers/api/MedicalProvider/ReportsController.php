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
use App\Models\CustomerRegistration;
use Storage;

class ReportsController extends Controller
{

    use MediaTrait;

    public function add_new_report(Request $request)
    {
      

        $validator = Validator::make($request->all(), [
            'report_title' => 'required',
            'patient_id' => 'required',
            'report_path' => 'required|mimes:pdf,png,jpeg,tiff',
        ]);
        
        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

      

        $report_input = [];
        $report_input['report_title'] = $request->report_title;
        $report_input['patient_id'] = $request->patient_id;
        $report_input['report_path'] = $request->report_path;

      
        if ($request->has('report_path')){

            $report_input['report_path'] = $this->verifyAndUpload($request, 'report_path', 'providerreports');
            $original_name = $request->file('report_path')->getClientOriginalName();
            $report_input['report_name'] = $original_name;
        }

       
        // $report_input['medical_provider_id'] =  Auth::user()->id;
        // $report_input['created_by'] = Auth::user()->id;

        $report_input['medical_provider_id'] =  1;
        $report_input['created_by'] = 1;

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



    
    public function patient_list()
    {
        $patientList = CustomerRegistration::where('status', 'active')
        ->get();

          

        if (!empty($patientList)){
            return response()->json([
                'status' => 200,
                'message' => 'Patient list found.',
                'patient_list' => $patientList,
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. Patient list not found.',
            ]);
        }
    }







}
