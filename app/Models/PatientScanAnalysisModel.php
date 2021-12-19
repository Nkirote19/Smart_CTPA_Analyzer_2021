<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientScanAnalysisModel extends Model
{
    use HasFactory;

    protected $table = 'patient_scan_analysis_models';
    protected $fillable = [
        'patient_surname',
        'patient_fname', 
        'patient_oname',
        'patient_gender',
        'patient_age', 
        'patient_weight',
        'patient_chiefComplaints',
        'patient_hpi',
        'patient_pastMedicalHistory',
        'patient_familyMedicalHistory'
    ];
}
