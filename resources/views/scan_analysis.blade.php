@extends('layouts.dashboard_layout')

@section('pageTitle', 'Dashboard')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

@if (session('status'))
    <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>
        {{ session('status') }}
    </div>
@endif

<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item custom-orange">Smart CTPA Analyzer</li>
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block custom-blue"><span class="js-get-date"></span></li>
</ol>

<div class="accordion accordion-outline" id="smart_analysis_page_guidelines">
    <div class="card">
        <div class="card-header">
            <a href="" class="card-title collapsed" data-toggle="collapse" data-target="#smart_analysis_guidelines" aria-expanded="false">
                <i class="far fa-lungs  fa-2x pr-2"></i>
               <h2 class="fw-500" style="padding-top:5px;">Scan Analysis</h2>
                <span class="ml-auto custom-orange fw-700">
                    <span class="collapsed-reveal">
                        <i class="far fa-info-circle pr-1"></i> CLICK HERE FOR GUIDELINES <i class="far fa-angle-up fs-xl pl-2"></i>
                    </span>
                    <span class="collapsed-hidden">
                       <i class="far fa-info-circle pr-1"></i> CLICK HERE FOR GUIDELINES <i class="far fa-angle-down fs-xl pl-2"></i>
                    </span>
                </span>
            </a>
        </div>
        <div id="smart_analysis_guidelines" class="collapse" data-parent="#smart_analysis_page_guidelines">
            <div class="card-body">
               From this page, you will be able to upload images and run inference on the images so as to get possible predictions.<br>
               <u><b>GUIDELINES</b></u>
               <ol>
                   <li>Fill in the patient's details in the form provided.</li>
                   <li>Upload the image(s) to analyse and click on 'RUN ANALYSIS' to perform the analysis that will produce potential results.</li>
                   <li>Click on 'SAVE' at the bottom of the page to save all the information on the page.</li>
               </ol>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
  Thank you for getting in touch! 
</div>
<!-- Your main content goes below here: -->
<!-- <form method="POST" enctype="multipart/form-data" name="patientDetailsForm" id="patientDetailsForm"> -->
<form method="POST"  id="patientDetailsForm" enctype="multipart/form-data">
          @csrf
    <div class="row">  
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Patient <span class="fw-300"><i>Details</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-2 form-group">
                                <label class="form-label" for="patient_surname">Surname</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="patient_surname" name="patient_surname" class="form-control" aria-label="Surname" aria-describedby="patient_surname">
                                </div>
                            </div>

                            <div class="col-2 form-group">
                                <label class="form-label" for="patient_fname">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="patient_fname" name="patient_fname" class="form-control" aria-label="First Name" aria-describedby="patient_fname">
                                </div>
                            </div>

                            <div class="col-2 form-group">
                                <label class="form-label" for="patient_oname">Other Names</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="patient_oname" name="patient_oname" class="form-control" aria-label="Other Names" aria-describedby="patient_oname">
                                </div>
                            </div>

                            <!-- <div class="col-2 form-group">
                                <h5 class="frame-heading">Gender</h5>
                                <div class="frame-wrap">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="patient_female" name="patient_gender" value="1" >
                                        <label class="custom-control-label" for="patient_female">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="patient_male" name="patient_gender" value="0" >
                                        <label class="custom-control-label" for="patient_male">Male</label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="author col-2 form-group" style=" margin-bottom: 1rem;">
                                <h5><strong>Gender</strong></h5>                            
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="patient_gender" type="radio" value="1" id="patient_female" style="top: 0.1rem; width: 1.00rem; height: 1.00rem;">
                                    <h5 class="form-check-label" for="patient_gender">Female</h5>
                                </div>

                                <div class="form-check-inline">
                                    <input class="form-check-input" name="patient_gender" type="radio" value="0" id="patient_male" style="top: 0.1rem; width: 1.00rem; height: 1.00rem;">
                                    <h5 class="form-check-label" for="patient_gender">Male</h5>
                                </div>
                            </div>

                            <div class="col-2 form-group">
                                <label class="form-label" for="patient_age">Age</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-clock"></i></span>
                                    </div>
                                    <input type="number" id="patient_age" name="patient_age" class="form-control" aria-label="Age" aria-describedby="patient_age">
                                </div>
                            </div>

                            <div class="col-2 form-group">
                                <label class="form-label" for="patient_weight">Weight (Kg)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                    </div>
                                    <input type="number" id="patient_weight" name="patient_weight" class="form-control" aria-label="Weight" aria-describedby="patient_weight">
                                </div>
                            </div>

                            <div class="col-12 form-group">
                                <label class="form-label" for="patient_chiefComplaints">Chief Complaints</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    </div>
                                    <textarea class="form-control" id="patient_chiefComplaints" name="patient_chiefComplaints" aria-label="Chief Complaints"></textarea>
                                </div>
                            </div>

                            <div class="col-12 form-group">
                                <label class="form-label" for="patient_hpi">History of Presenting Illness (HPI)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    </div>
                                   <textarea class="form-control" id="patient_hpi" name="patient_hpi" aria-label="History of Presenting Illness"></textarea>
                                </div>
                            </div>

                            <div class="col-12 form-group">
                                <label class="form-label" for="patient_pastMedicalHistory">Past Medical History</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    </div>
                                    <textarea class="form-control" id="patient_pastMedicalHistory" name="patient_pastMedicalHistory" aria-label="Past Medical History"></textarea>
                                </div>
                            </div>

                            <div class="col-12 form-group">
                                <label class="form-label" for="patient_familyMedicalHistory">Family's Medical History</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    </div>
                                    <textarea class="form-control" id="patient_familyMedicalHistory" name="patient_familyMedicalHistory" aria-label="Family's Medical History"></textarea>
                                </div>
                            </div>

                            <div class="col-12 form-group upload-section">
                                <label class="form-label" for="pImage">Upload Image for Analysis</label>
                                <div class="upload-file">
                                    <input class="file-form-input" type="file" , name = "image" id="Pimage" /><br><br>
                                        <button class="btn btn-blue text-white ml-auto mr-2" type = "submit"><i class="far fa-stethoscope p-1"></i>ANALYZE</button> 
                                </div>

                                <span class="text-danger" id="image-input-error"></span>

                                <div class = "upload-error-div">
                                    {{--<h4 class="fw-700 mt-3 text-center">{{error}}</h4>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
       <div class="col-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Image(s) <span class="fw-300"><i>Upload</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="alert alert-primary">
                            <div class="d-flex flex-start w-100">
                                <div class="mr-2 hidden-md-down">
                                    <i class="far fa-info-circle"></i>
                                </div>
                                <div class="d-flex flex-fill">
                                    <div class="flex-fill">
                                        <p style="margin-bottom: -5px!important; margin-top: -5px!important;" class="fw-500">
                                            Upload an image by clicking on 'Choose File' and selecting your desired image from your file directory. Click on 'ANALYZE' to run inference.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="upload-section">
                            <div class="upload-file">
                                <input class="file-form-input" type="file" , name = "image"/><br><br>
                                    <button class="btn btn-blue text-white ml-auto mr-2"><i class="far fa-stethoscope p-1"></i>ANALYZE</button> 
                            </div>

                            <div class = "upload-error-div">
                                {{--<h4 class="fw-700 mt-3 text-center">{{error}}</h4>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</form>
    <div class="row">
        <div class="col-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Scan <span class="fw-300"><i>Results</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="accordion accordion-outline" id="class_definitions_details">
                            <div class="card">
                                <div class="card-header">
                                    <a href="" class="card-title collapsed" data-toggle="collapse" data-target="#class_definitions_details_card" aria-expanded="false">
                                        <i class="far fa-list pr-2"></i>
                                       <h5 class="fw-500" style="padding-top:5px;">Class Definitions</h5>
                                        <span class="ml-auto custom-orange fw-700">
                                            <span class="collapsed-reveal">
                                                <i class="far fa-info-circle pr-1"></i> CLICK HERE FOR DETAILS <i class="far fa-angle-up fs-xl pl-2"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                               <i class="far fa-info-circle pr-1"></i> CLICK HERE FOR DETAILS <i class="far fa-angle-down fs-xl pl-2"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="class_definitions_details_card" class="collapse" data-parent="#class_definitions_details">
                                    <div class="card-body">
                                       Below are the definitions of the classes returned after running inference on the scan:<br>
                                       <u><b>Definitions</b></u>
                                       <ul>
                                            <li><b>acute_and_chronic_pe</b> - exam-level, indicates that the PE present in the study is both acute AND chronic</li>
                                            <li><b>central_pe</b> - exam-level, indicates that there is PE present in the center of the images in the study</li>
                                            <li><b>chronic_pe</b> - exam-level, indicates that the PE in the study is chronic</li>
                                            <li><b>flow_artifact</b> - informational</li>
                                            <li><b>indeterminate</b> -exam-level, indicates that while the study is not negative for PE, an ultimate set of exam-level labels could not be created, due to QA issues</li>
                                            <li><b>leftsided_pe</b> - exam-level, indicates that there is PE present on the left side of the images in the study</li>
                                            <li><b>negative_exam_for_pe</b> - exam-level, whether there are any images in the study that have PE present.</li>
                                            <li><b>pe_present_on_image</b> - image-level, notes whether any form of PE is present on the image.</li>
                                            <li><b>qa_contrast</b> - informational, indicates whether radiologists noted an issue with contrast in the study.</li>
                                            <li><b>qa_motion</b> - informational, indicates whether radiologists noted an issue with motion in the study.</li>
                                            <li><b>rightsided_pe</b> - exam-level, indicates that there is PE present on the right side of the images in the study</li> 
                                            <li><b>rv_lv_ratio_gte_1</b> - exam-level, indicates whether the RV/LV ratio present in the study is >= 1</li>
                                            <li><b>rv_lv_ratio_lt_1</b> - exam-level, indicates whether the RV/LV ratio present in the study is < 1</li>                                         
                                            <li><b>true_filling_defect_not_pe</b> - informational, indicates a defect that is NOT PE</li>        
                                       </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class = "col-6">
                                <row style = "width: 100% ; display: flex; justify-content: center;">
                                    <h3 class="upload-titles"><u>Uploaded Image</u></h3>
                                </row>
                                <row style = "width: 100% ; display: flex; justify-content: center;">
                                    <img class="result-img" id="scanImage">
                                </row>
                            </div>

                            <div class = "col-6">            
                                <row style = "width: 100% ; display: flex; justify-content: center;">
                                    <h3 class = "upload-titles mt-1"><u>Model Prediction</u></h3>
                                </row>
                                <row style = "width: 100%; display: flex; justify-content: center;">
                                   @livewire('display-result')
                                </row>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-xl-12">
         <div id="panel-8" class="panel">
            <div class="panel-hdr">
                <h2>Are you done classifying the images?</h2>

                <div class="panel-toolbar">
                    <button class="btn btn-default mt-3 mb-3 fw-500 mr-2"> <i class="fas fa-times-circle"></i> CANCEL</button>
                </div>
                <div class="panel-toolbar ml-2">
                    <button class="btn btn-orange fw-500"><i class="fas fa-save"></i> SAVE</button>
                </div>
            </div>
        </div>
    </div>
  
</div>
<!-- </form> -->
 
@endsection