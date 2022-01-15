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
               To print the report, click on the '<i class="far fa-print p-1"></i>' icon at the top of this page.
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

                                 @forelse ($scanPredictions as $scanKey => $scanProbability)
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="pl-2">{{ $scanKey }}</td>
                                        <td class="text-center">{{ $scanProbability}}</td>
                                    </tr>
                                </tbody>
                                 @empty
                                    <p>No predictions available</p>
                                @endforelse

                            </table>
                        </row>
                    </div>
                </div>

                <h4 class="custom-orange keep-print-font mt-3">
                    <span class="fw-700 custom-blue">Compilation Date:</span> <span id="compilation_date">12/3/2021</span>
                </h4>

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