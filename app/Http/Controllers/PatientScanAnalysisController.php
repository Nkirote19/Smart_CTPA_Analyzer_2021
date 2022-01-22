<?php

namespace App\Http\Controllers;

use App\Models\PatientScanAnalysisModel;
use App\Models\Prediction;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Client\Response;

class PatientScanAnalysisController extends Controller
{
    //
    public function create(){
        return view('scan_analysis');
        }

    public function store(Request $request){
        $patient = new PatientScanAnalysisModel;

        $path = $request->file("image")->store("images");
        $patient->patient_image = $path;

        $patient->patient_surname = $request->input('patient_surname');
        $patient->patient_fname = $request->input('patient_fname');
        $patient->patient_oname = $request->input('patient_oname');
        $patient->patient_gender = $request->input('patient_gender');
        $patient->patient_age = $request->input('patient_age');
        $patient->patient_weight = $request->input('patient_weight');
        $patient->patient_chiefComplaints = $request->input('patient_chiefComplaints');
        $patient->patient_hpi = $request->input('patient_hpi');
        $patient->patient_pastMedicalHistory = $request->input('patient_pastMedicalHistory');
        $patient->patient_familyMedicalHistory = $request->input('patient_familyMedicalHistory');
        $patient->save();
        
        $analyses = Http::post("http://127.0.0.1:5000/analysis",["file" => base64_encode(Storage::get($path))]);
        $predictions  = json_decode($analyses->body())->predictions;
        $prediction = Prediction::create(['acute_and_chronic_pe' => $predictions->acute_and_chronic_pe,'central_pe'=>$predictions->central_pe,'chronic_pe'=>$predictions->chronic_pe,'flow_artifact'=>$predictions->flow_artifact,'indeterminate'=>$predictions->indeterminate,'leftsided_pe'=>$predictions->leftsided_pe,'negative_exam_for_pe'=>$predictions->negative_exam_for_pe,'pe_present_on_image'=>$predictions->pe_present_on_image,'qa_contrast'=>$predictions->qa_contrast,'qa_motion'=>$predictions->qa_motion,'rightsided_pe'=>$predictions->rightsided_pe,'rv_lv_ratio_gte_1'=>$predictions->rv_lv_ratio_gte_1,'rv_lv_ratio_lt_1'=>$predictions->rv_lv_ratio_lt_1,'true_filling_defect_not_pe'=>$predictions->true_filling_defect_not_pe,'patient_id'=>$patient->patient_id]);


        return response()->json(["image_url" => url($path), "prediction" => $prediction->prediction_id], 200);
        }

    public function retrieveAllRecords(){
       $records = PatientScanAnalysisModel::all()->toArray();
        return response()
            ->json(["data" => $records ? $records : []]);
    }

     public function retrieveIndividualRecordDetails($id){
        $patient = PatientScanAnalysisModel::findOrFail($id);

        $patSurname = $patient->patient_surname;
        $patFname = $patient->patient_fname;
        $patOname = $patient->patient_oname;
        $patGender  = $patient->patient_gender;
        $patAge  = $patient->patient_age;
        $patWeight = $patient->patient_weight;

        $patCC = $patient->patient_chiefComplaints;
        $patHPI  = $patient->patient_hpi;
        $patPMH  = $patient->patient_pastMedicalHistory;
        $patFMH = $patient->patient_familyMedicalHistory;

        $patScanImage = $patient->patient_image;

        $Predictions = Prediction::findOrFail($id);
        $acute_and_chronic_pe = $Predictions->acute_and_chronic_pe;
        $central_pe = $Predictions->central_pe;
        $chronic_pe = $Predictions->chronic_pe;
        $flow_artifact = $Predictions->flow_artifact;
        $indeterminate = $Predictions->indeterminate;
        $leftsided_pe = $Predictions->leftsided_pe;
        $negative_exam_for_pe = $Predictions->negative_exam_for_pe;
        $pe_present_on_image = $Predictions->pe_present_on_image;
        $qa_contrast = $Predictions->qa_contrast;
        $qa_motion = $Predictions->qa_motion;
        $rightsided_pe = $Predictions->rightsided_pe;
        $rv_lv_ratio_gte_1= $Predictions->rv_lv_ratio_gte_1;
        $rv_lv_ratio_lt_1 = $Predictions->rv_lv_ratio_lt_1;
        $true_filling_defect_not_pe = $Predictions->true_filling_defect_not_pe;

        return view('patient_record_details',['patient_id' => $patient->patient_id,'patSurname' => $patSurname,'patFname' => $patFname,'patOname' => $patOname, 'patGender' => $patGender, 'patAge' => $patAge, 'patWeight' => $patWeight,'patCC' => $patCC,'patHPI' => $patHPI,'patPMH' => $patPMH,'patFMH' => $patFMH, 'patScanImage' => $patScanImage, 'acute_and_chronic_pe' => $acute_and_chronic_pe,'central_pe' => $central_pe,'chronic_pe' => $chronic_pe,'flow_artifact' => $flow_artifact,'indeterminate' => $indeterminate,'leftsided_pe' => $leftsided_pe,'negative_exam_for_pe' => $negative_exam_for_pe,'pe_present_on_image' => $pe_present_on_image,'qa_contrast' => $qa_contrast,'qa_motion' => $qa_motion,'rightsided_pe' => $rightsided_pe ,'rv_lv_ratio_gte_1' => $rv_lv_ratio_gte_1,'rv_lv_ratio_lt_1' => $rv_lv_ratio_lt_1,'true_filling_defect_not_pe' => $true_filling_defect_not_pe]);
    }
}
