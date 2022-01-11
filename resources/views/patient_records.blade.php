@extends('layouts.dashboard_layout')

@section('pageTitle', 'Dashboard')

@section('content')

<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item custom-orange">Smart CTPA Analyzer</li>
    <li class="breadcrumb-item active">Patient Records</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block custom-blue"><span class="js-get-date"></span></li>
</ol>

<div class="accordion accordion-outline" id="smart_analysis_page_guidelines">
    <div class="card">
        <div class="card-header">
            <a href="" class="card-title collapsed" data-toggle="collapse" data-target="#smart_analysis_guidelines" aria-expanded="false">
                <i class="far fa-clipboard-list fa-2x pr-2"></i>
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
        <div id="smart_analysis_guidelines" class="collapse" data-parent="#smart_analysis_page_guidelines">
            <div class="card-body">
               This page displays a list of all patient records in which analysis has been made.
            </div>
        </div>
    </div>
</div>

<div class="row">  
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Patient <span class="fw-300"><i>Records</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
				   <table id="patient_records_table" class="table table-bordered table-responsive-ms w-100">
				        <thead class="text-uppercase">
				        <tr>
				            <th>No.</th>
				            <th>Surname</th>
				            <th>First Name</th>
				            <th>Other Names</th>
				            <th>Gender</th>
				            <th>Age</th>
				            <th>Weight (kg)</th>
                            <th>ACTIONS</th>
				        </tr>
				        </thead>

				        <tbody>
				            <!-- <tr>
				                <td>1</td>
				                <td>Mutabari</td>
				                <td>Fridah</td>
				                <td>Nkirote</td>
				                <td>Female</td>
				                <td>21</td>
				                <td>56</td>
				            </tr> -->
				        </tbody>
				    </table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection