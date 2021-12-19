<?php

namespace App\Http\Controllers;

use App\Models\PatientScanAnalysisModel;

use Illuminate\Http\Request;

class PatientScanAnalysisController extends Controller
{
    //
    public function create(){
        return view('scan_analysis');
        }

    public function store(Request $request){
        $patient = new PatientScanAnalysisModel;
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
        return redirect()->back()->with('status','Patient Details Added Successfully');
        }
}
