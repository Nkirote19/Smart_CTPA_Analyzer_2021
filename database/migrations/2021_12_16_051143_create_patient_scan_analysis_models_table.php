<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientScanAnalysisModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_scan_analysis_models', function (Blueprint $table) {
            $table->id();
            $table->string('patient_surname');
            $table->string('patient_fname');
            $table->string('patient_oname');
            $table->boolean('patient_gender');//boolean for gender
            $table->integer('patient_age');//number for age
            $table->float('patient_weight');//number for weight
            $table->longText('patient_chiefComplaints');//its a text area
            $table->longText('patient_hpi');//its a text area
            $table->longText('patient_pastMedicalHistory');//its a text area
            $table->longText('patient_familyMedicalHistory');//its a text area

            //$table->binary('photo');The binary method creates a BLOB equivalent column:
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_scan_analysis_models');
    }
}
