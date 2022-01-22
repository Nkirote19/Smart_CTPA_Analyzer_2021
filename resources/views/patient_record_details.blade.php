@extends('layouts.dashboard_layout')

@section('pageTitle', "Patient's Details")

@section('content')

<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item custom-orange">Smart CTPA Analyzer</li>
    <li class="breadcrumb-item"><a class="custom-orange" href="{{url('patient_records')}}">Patient Records</a></li>
    <li class="breadcrumb-item active">Patient's Details</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block custom-blue"><span class="js-get-date"></span></li>
</ol>

<div class="accordion accordion-outline" id="patient_records_details_page_guidelines">
    <div class="card">
        <div class="card-header">
            <a href="" class="card-title collapsed" data-toggle="collapse" data-target="#patient_records_details_guidelines" aria-expanded="false">
                <i class="far fa-file-user fa-2x pr-2"></i>
               <h2 class="fw-500" style="padding-top:5px;">Patient Records</h2>
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
        <div id="patient_records_details_guidelines" class="collapse" data-parent="#patient_records_details_page_guidelines">
            <div class="card-body">
               This page displays the list of an individual patient's medical information inclusive of the predicted results. <br>
               <u><b>Class Definitions</b></u>
                   <ul>
                        <li><b>Acute and Chronic PE</b> - exam-level, indicates that the PE present in the study is both acute AND chronic</li>
                        <li><b>Central PE</b> - exam-level, indicates that there is PE present in the center of the images in the study</li>
                        <li><b>Chronic PE</b> - exam-level, indicates that the PE in the study is chronic</li>
                        <li><b>Flow Artifact</b> - informational</li>
                        <li><b>Indeterminate</b> -exam-level, indicates that while the study is not negative for PE, an ultimate set of exam-level labels could not be created, due to QA issues</li>
                        <li><b>Leftsided PE</b> - exam-level, indicates that there is PE present on the left side of the images in the study</li>
                        <li><b>Negative exam for PE</b> - exam-level, whether there are any images in the study that have PE present.</li>
                        <li><b>PE present on Image</b> - image-level, notes whether any form of PE is present on the image.</li>
                        <li><b>QA Contrast</b> - informational, indicates whether radiologists noted an issue with contrast in the study.</li>
                        <li><b>QA Motion</b> - informational, indicates whether radiologists noted an issue with motion in the study.</li>
                        <li><b>Rightsided PE</b> - exam-level, indicates that there is PE present on the right side of the images in the study</li> 
                        <li><b>RV LV Ratio > 1</b> - exam-level, indicates whether the RV/LV ratio present in the study is >= 1</li>
                        <li><b>RV LV Ratio < 1</b> - exam-level, indicates whether the RV/LV ratio present in the study is < 1</li>                                         
                        <li><b>True Filling Defect not PE</b> - informational, indicates a defect that is NOT PE</li>        
                   </ul>
            </div>
        </div>
    </div>
</div>

<div class="container background-color-light mt-4">
    <div data-size="A4">
        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    <img src= "{{ asset('img/logo-v5.jpeg') }}" class="mx-auto d-block" style="width: 120px; height: 110px;" alt="Smart CTPA Analayzer" aria-roledescription="logo"> 

                    <span class="page-logo-text text-center logo-text mt-2">Smart CTPA Analyzer</span>

                    <h2 class="text-center fw-700 custom-orange mt-6"><u>Medical Diagnosis Record</u></h2>
                </div>

                <!-- <div class="d-flex align-items-center mb-5">                   
                    <h3 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                        <u>Patient's Personal Data</u>                    
                    </h3>
                </div> -->

                <div class="row fw-500 fs-xl">
                    <div class="col-2 custom-blue fw-700 mb-2">Name:</div>
                    <div class="col-10">
                        <span id="p-surname">{{ $patSurname ?? 'Name unavailable' }}</span>
                        <span id="p-fname">{{ $patFname ?? 'Name unavailable' }}</span>
                        <span id="p-oname">{{ $patOname ?? 'Name unavailable' }}</span>
                    </div>

                    <div class="col-2 custom-blue fw-700 mb-2">Gender:</div>
                    <div class="col-10"><span id="p-gender">{{ $patGender ?? 'Gender unavailable' }}</span></div>

                    <div class="col-2 custom-blue fw-700 mb-2">Age (Years):</div>
                    <div class="col-10"><span id="p-age">{{ $patAge ?? 'Age unavailable' }}</span></div>

                    <div class="col-2 custom-blue fw-700 mb-2">Weight (Kg):</div>
                    <div class="col-10"><span class="p-weight">{{ $patWeight ?? 'Weight unavailable' }}</span></div>

                    <div class="col-12 mb-2">
                        <span class="custom-blue fw-700">Chief Complaints:</span> <br>
                        <span id="p-chiefComplaints">{{ $patCC ?? 'Chief Complaints unavailable' }}</span>
                    </div>

                    <div class="col-12 mb-2">
                         <span class="custom-blue fw-700">History of Presenting Illness (HPI): </span><br>
                        <span id="p-hpi">{{ $patHPI ?? 'History of Presenting Illness unavailable' }}</span>
                    </div>

                    <div class="col-12 mb-2">
                         <span class="custom-blue fw-700">Past Medical History: </span><br>
                        <span id="p-pmh">{{ $patPMH ?? 'Past Medical History unavailable' }}</span>
                    </div>

                    <div class="col-12 mb-2">
                        <span class="custom-blue fw-700">Family's Medical History: </span><br>
                        <span id="p-fmh">{{ $patFMH ?? 'Family Medical History unavailable' }}</span>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-5">                   
                    <h3 class="keep-print-font fw-500 mb-0 custom-orange mt-3 flex-1 position-relative">
                        <u>Scan Analysis' Prediction</u>                    
                    </h3>
                </div>

                <div class="row">
                    <div class="col-6">
                        <row style = "width: 100% ; display: flex; justify-content: center;">
                            <h3 class="upload-titles"><u>Uploaded Image</u></h3>
                        </row>
                        <row style = "width: 100% ; display: flex; justify-content: center;">
                            <img class="result-img" id="patScanImage" 
                            src="{{ asset($patScanImage) }}"/>
                        </row>
                    </div>

                    <div class="col-6">
                        <row style = "width: 100% ; display: flex; justify-content: center;">
                            <h3 class = "upload-titles mt-1"><u>Model Prediction</u></h3>
                        </row>
                        <row style = "width: 100%; display: flex; justify-content: center;">
                           <table id="uploadedPredictionsTable" class="table table-bordered table-custom" style="width:450px!important;">
                                <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Class</th>
                                    <th>Probability (%)</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                {{--<!-- @forelse ($scanPredictions as $Key => $Value)                               
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="pl-2">{{ $Key }}</td>
                                        <td class="text-center">{{ $Value}}</td>
                                    </tr>                               
                                 @empty
                                    <p>No predictions available</p
                                    >
                                @endforelse  -->--}}
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="pl-2">Acute and Chronic PE</td>
                                    <td class="text-center">{{ $acute_and_chronic_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">2</td>
                                    <td class="pl-2">Central PE</td>
                                    <td class="text-center">{{ $central_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="pl-2">Chronic PE</td>
                                    <td class="text-center">{{ $chronic_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">4</td>
                                    <td class="pl-2">Flow Artifact</td>
                                    <td class="text-center">{{ $flow_artifact*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="pl-2">Indeterminate</td>
                                    <td class="text-center">{{ $indeterminate*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">6</td>
                                    <td class="pl-2">Leftsided PE</td>
                                    <td class="text-center">{{ $leftsided_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="pl-2">Negative exam for PE</td>
                                    <td class="text-center">{{ $negative_exam_for_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">8</td>
                                    <td class="pl-2">PE present on Image</td>
                                    <td class="text-center">{{ $pe_present_on_image*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="pl-2">QA Contrast</td>
                                    <td class="text-center">{{ $qa_contrast*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">10</td>
                                    <td class="pl-2">QA Motion</td>
                                    <td class="text-center">{{ $qa_motion*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">11</td>
                                    <td class="pl-2">Rightsided PE</td>
                                    <td class="text-center">{{ $rightsided_pe*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">12</td>
                                    <td class="pl-2">RV LV Ratio > 1</td>
                                    <td class="text-center">{{ $rv_lv_ratio_gte_1*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">13</td>
                                    <td class="pl-2">RV LV Ratio < 1</td>
                                    <td class="text-center">{{ $rv_lv_ratio_lt_1*100 ?? 'Unavailable' }}</td>
                                </tr> 
                                 <tr>
                                    <td class="text-center">14</td>
                                    <td class="pl-2">True Filling Defect not Pe </td>
                                    <td class="text-center">{{ $true_filling_defect_not_pe *100 ?? 'Unavailable' }}</td>
                                </tr> 
                                </tbody>
                            </table>
                        </row>
                    </div>
                </div>

                <h4 class="custom-orange keep-print-font mt-3">
                    <span class="fw-700 custom-blue">Report by:</span> Dr. <span id="doctor_name">{{ Auth::user()->name }}</span>
                </h4>
                <div >
                    <img style="width:130px; height: 120px;" src="https://static.cdn.wisestamp.com/wp-content/uploads/2020/08/Oprah-Winfrey-Signature-1.png">
                </div>
            </div>
        </div>

    </div>
</div>

@endsection