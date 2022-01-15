@extends('layouts._master_layout') 

@section('main_content')
    <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar ">
                    <div class="page-logo background-color-light orange-bottom-border">                        
                        <img src="{{ asset('img/logo-v5.jpeg') }}" alt="Smart CTPA Analyzer" aria-roledescription="logo" style="width:48px;height:40px;margin-left:-15px;">
                        <span class="page-logo-text mr-1 text-uppercase logo-text">Smart CTPA Analyzer</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>                       
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-orange btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="{{ asset('img/logo-v5.jpeg') }}" class="profile-image rounded-circle" alt="Smart CTPA Analyzer Logo" style="margin-left: -20px;">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-lg d-inline-block">
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-lg"> {{ Auth::user()->email }}</span>
                            </div>
                            <img src="{{asset('img/card-background.jpg')}}" class="cover" alt="cover">
                           <!--  <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a> -->
                        </div>
                        <!-- 
                        TIP: The menu items are not auto translated. You must have a residing lang file associated with the menu saved inside dist/media/data with reference to each 'data-i18n' attribute.
                        -->
                        <ul id="js-nav-menu" class="nav-menu">
                            <li class="active">
                                <a href="{{url('scan_analysis')}}" title="Scan Analysis">
                                    <i class="far fa-lungs"></i>
                                    <span class="nav-link-text">Scan Analysis</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="{{url('patient_records')}}" title="Patient Records">
                                    <i class="far fa-clipboard-list"></i>
                                    <span class="nav-link-text">Patient Records</span>
                                </a>
                            </li>
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    <div class="nav-footer shadow-top background-color-light">
                        <!-- <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a> -->
                        <ul class="list-table m-auto nav-footer-buttons text-white">
                            <li>
                                <span> <?php echo date('Y');?> &copy; Smart CTPAA Team</span>
                            </li>
                        </ul>
                    </div> <!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header background-color-light orange-bottom-border" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <img src="{{ asset('img/logo-v5.jpeg') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">Smart CTPA Analyzer</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>                         
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>

                        <div class="ml-auto d-flex">
                            <div>
                                <a href="#" data-toggle="dropdown" title="Print Page" class="header-icon d-flex align-items-center justify-content-center ml-2" data-action="app-print">
                                    <i class="fas fa-print"></i>
                                </a>
                            </div>

                            <div>
                                <a href="#" data-toggle="dropdown" title="View Fullscreen" class="header-icon d-flex align-items-center justify-content-center ml-2" data-action="app-fullscreen">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </div>

                            <div style="margin-top:15px;">
                                <a class="nav-link btn btn-orange fw-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="far fa-arrow-alt-to-right p-1 fw-700"></i> {{ __('LOGOUT') }} </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>  
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        @yield('content')
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer auth-page-footer text-center" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-white" style="margin-left:350px!important;">
                            <span class="hidden-md-down fw-400">"<u class="orange-underline">Faster</u>, <u class="orange-underline">Better</u> and <u class="orange-underline">Simpler</u> means to help you diagnose <span class="custom-orange">Pulmonary Embolism</span>."</span>
                        </div>
                        
                    </footer>
                    <!-- END Page Footer -->
                </div>
            </div>
        </div>

@endsection