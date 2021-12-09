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
    <div class="alert alert-success" role="alert">
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

<!-- Your main content goes below here: -->
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
                                <input type="text" id="patient_surname" class="form-control" aria-label="Surname" aria-describedby="patient_surname">
                            </div>
                        </div>

                        <div class="col-2 form-group">
                            <label class="form-label" for="patient_fname">First Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="patient_fname" class="form-control" aria-label="First Name" aria-describedby="patient_fname">
                            </div>
                        </div>

                        <div class="col-2 form-group">
                            <label class="form-label" for="patient_oname">Other Names</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="patient_oname" class="form-control" aria-label="Other Names" aria-describedby="patient_oname">
                            </div>
                        </div>

                        <div class="col-2 form-group">
                            <h5 class="frame-heading">Gender</h5>
                            <div class="frame-wrap">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="patient_female" name="patient_gender" checked="">
                                    <label class="custom-control-label" for="patient_female">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="patient_male" name="patient_gender" >
                                    <label class="custom-control-label" for="patient_male">Male</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-2 form-group">
                            <label class="form-label" for="patient_age">Age</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-clock"></i></span>
                                </div>
                                <input type="number" id="patient_age" class="form-control" aria-label="Age" aria-describedby="patient_age">
                            </div>
                        </div>

                        <div class="col-2 form-group">
                            <label class="form-label" for="patient_weight">Weight (Kg)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                </div>
                                <input type="number" id="patient_weight" class="form-control" aria-label="Weight" aria-describedby="patient_weight">
                            </div>
                        </div>

                        <div class="col-12 form-group">
                            <label class="form-label" for="patient_chiefComplaints">Chief Complaints</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                </div>
                                <textarea class="form-control" id="patient_chiefComplaints" aria-label="Chief Complaints"></textarea>
                            </div>
                        </div>

                        <div class="col-12 form-group">
                            <label class="form-label" for="patient_hpi">History of Presenting Illness (HPI)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                </div>
                               <textarea class="form-control" id="patient_hpi" aria-label="History of Presenting Illness"></textarea>
                            </div>
                        </div>

                        <div class="col-12 form-group">
                            <label class="form-label" for="patient_pastMedicalHistory">Past Medical History</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                </div>
                                <textarea class="form-control" id="patient_pastMedicalHistory" aria-label="Past Medical History"></textarea>
                            </div>
                        </div>

                        <div class="col-12 form-group">
                            <label class="form-label" for="patient_familyMedicalHistory">Family's Medical History</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                </div>
                                <textarea class="form-control" id="patient_familyMedicalHistory" aria-label="Family's Medical History"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
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
                   <!--  https://medium.com/@goncalvesjoao/carrierwave-add-remove-individual-images-using-input-file-multiple-fb65f75de06a -->
                    <!-- <div class="center">
                        <div class="form-input">
                     
                            <div class="preview">
                                <img id="file-ip-1-preview">
                            </div>

                            <label for="file-ip-1">Upload Image</label>

                            <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                        </div>
                    </div>  -->

                    <!-- CODE FOR MULTIPLE IMAGES UPLOAD -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <div class="alert alert-primary">
                        <div class="d-flex flex-start w-100">
                            <div class="mr-2 hidden-md-down">
                                <i class="far fa-info-circle"></i>
                            </div>
                            <div class="d-flex flex-fill">
                                <div class="flex-fill">
                                    <p style="margin-bottom: -5px!important; margin-top: -5px!important;" class="fw-500">
                                        Upload multiple images by pressing and holding 'Ctrl' while selecting the images from the file explorer menu that appears upon clicking on 'Choose Files'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field" align="left">               
                      <input type="file" id="files" name="files[]" multiple />
                    </div>
                </div>
                <div class="panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted d-flex">
                    <button class="btn btn-link btn-blue text-white ml-auto mr-2" href=""><i class="fas fa-stethoscope"></i> RUN ANALYSIS</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
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
                    <div id="potentialResultsChart">
                        <canvas style="width:100%; height:300px;"></canvas>
                    </div>

                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th>POTENTIAL CLASS</th>
                                <th>POTENTIAL RATE (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">rv_lv_ratio_gte_1</th>
                                <td> 10</td>
                            </tr>
                            <tr>
                                <th scope="row">leftsided_pe</th>
                                <td> 16</td>
                            </tr>
                            <tr>
                                <th scope="row">acute_and_chronic_pe</th>
                                <td> 7</td>
                            </tr>
                            <tr>
                                <th scope="row">indeterminate</th>
                                <td> 3</td>
                            </tr>
                            <tr>
                                <th scope="row">rv_lv_ratio_lt_1</th>
                                <td> 14</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
