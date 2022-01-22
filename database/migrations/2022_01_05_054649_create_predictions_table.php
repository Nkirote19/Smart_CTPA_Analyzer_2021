<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->bigIncrements('prediction_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('patient_id')->on('patient_details')->nullable();

            $table->float('acute_and_chronic_pe', 8, 6);
            $table->float('central_pe', 8,6); 
            $table->float('chronic_pe', 8, 6);
            $table->float('flow_artifact', 8, 6);
            $table->float('indeterminate', 8, 6);
            $table->float('leftsided_pe', 8, 6);
            $table->float('negative_exam_for_pe', 8, 6);
            $table->float('pe_present_on_image', 8, 6);
            $table->float('qa_contrast', 8, 6);
            $table->float('qa_motion', 8, 6);
            $table->float('rightsided_pe', 8, 6);
            $table->float('rv_lv_ratio_gte_1', 8, 6);
            $table->float('rv_lv_ratio_lt_1', 8, 6);
            $table->float('true_filling_defect_not_pe', 8, 6);

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
        Schema::dropIfExists('predictions');
    }
}
