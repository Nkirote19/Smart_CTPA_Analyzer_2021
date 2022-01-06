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
            $table->bigIncrements('patient_id');
            $table->string('patient_surname');
            $table->string('patient_fname');
            $table->string('patient_oname');
            $table->boolean('patient_gender');
            $table->integer('patient_age');
            $table->float('patient_weight');
            $table->longText('patient_chiefComplaints');
            $table->longText('patient_hpi');
            $table->longText('patient_pastMedicalHistory');
            $table->longText('patient_familyMedicalHistory');
            $table->string('patient_image');

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
