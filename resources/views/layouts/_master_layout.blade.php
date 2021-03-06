<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('pageTitle') - Smart CTPA Analyzer</title> 

        <!-- Script, fonts and styles that came with the laravel bootstrap -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

        <meta name="description" content="System's Master Layout View">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css')}}">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css')}}">
        <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
        <link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/skins/skin-master.css')}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-v5.jpeg')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo-v5.jpeg')}}">
        <link rel="mask-icon" href="{{ asset('img/logo-v5.jpeg')}}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/fa-brands.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/fa-solid.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/fa-regular.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/page-invoice.css')}}">
        
        <link media="screen, print" rel= "stylesheet" type= "text/css" href= "{{ asset('css/custom.css') }}">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
      @livewireStyles

    </head>
    <!-- BEGIN Body -->
    <!-- Possible Classes

        * 'header-function-fixed'         - header is in a fixed at all times
        * 'nav-function-fixed'            - left panel is fixed
        * 'nav-function-minify'           - skew nav to maximize space
        * 'nav-function-hidden'           - roll mouse on edge to reveal
        * 'nav-function-top'              - relocate left pane to top
        * 'mod-main-boxed'                - encapsulates to a container
        * 'nav-mobile-push'               - content pushed on menu reveal
        * 'nav-mobile-no-overlay'         - removes mesh on menu reveal
        * 'nav-mobile-slide-out'          - content overlaps menu
        * 'mod-bigger-font'               - content fonts are bigger for readability
        * 'mod-high-contrast'             - 4.5:1 text contrast ratio
        * 'mod-color-blind'               - color vision deficiency
        * 'mod-pace-custom'               - preloader will be inside content
        * 'mod-clean-page-bg'             - adds more whitespace
        * 'mod-hide-nav-icons'            - invisible navigation icons
        * 'mod-disable-animation'         - disables css based animations
        * 'mod-hide-info-card'            - hides info card from left panel
        * 'mod-lean-subheader'            - distinguished page header
        * 'mod-nav-link'                  - clear breakdown of nav links

        >>> more settings are described inside documentation page >>>
    -->
    <body>
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *  This script should be placed right after the body tag for fast execution 
             *  Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c??? Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("%c??? Heads up! Theme settings is empty or does not exist, loading default settings...", "color: #ed1c24");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);

            }
            else if (themeSettings.themeURL && document.getElementById('mytheme'))
            {
                document.getElementById('mytheme').href = themeSettings.themeURL;
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|footer|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        @yield('main_content')
        <!-- BEGIN Color profile -->
        <!-- this area is hidden and will not be seen on screens or screen readers -->
        <!-- we use this only for CSS color refernce for JS stuff -->
        <p id="js-color-profile" class="d-none">
            <span class="color-primary-50"></span>
            <span class="color-primary-100"></span>
            <span class="color-primary-200"></span>
            <span class="color-primary-300"></span>
            <span class="color-primary-400"></span>
            <span class="color-primary-500"></span>
            <span class="color-primary-600"></span>
            <span class="color-primary-700"></span>
            <span class="color-primary-800"></span>
            <span class="color-primary-900"></span>
            <span class="color-info-50"></span>
            <span class="color-info-100"></span>
            <span class="color-info-200"></span>
            <span class="color-info-300"></span>
            <span class="color-info-400"></span>
            <span class="color-info-500"></span>
            <span class="color-info-600"></span>
            <span class="color-info-700"></span>
            <span class="color-info-800"></span>
            <span class="color-info-900"></span>
            <span class="color-danger-50"></span>
            <span class="color-danger-100"></span>
            <span class="color-danger-200"></span>
            <span class="color-danger-300"></span>
            <span class="color-danger-400"></span>
            <span class="color-danger-500"></span>
            <span class="color-danger-600"></span>
            <span class="color-danger-700"></span>
            <span class="color-danger-800"></span>
            <span class="color-danger-900"></span>
            <span class="color-warning-50"></span>
            <span class="color-warning-100"></span>
            <span class="color-warning-200"></span>
            <span class="color-warning-300"></span>
            <span class="color-warning-400"></span>
            <span class="color-warning-500"></span>
            <span class="color-warning-600"></span>
            <span class="color-warning-700"></span>
            <span class="color-warning-800"></span>
            <span class="color-warning-900"></span>
            <span class="color-success-50"></span>
            <span class="color-success-100"></span>
            <span class="color-success-200"></span>
            <span class="color-success-300"></span>
            <span class="color-success-400"></span>
            <span class="color-success-500"></span>
            <span class="color-success-600"></span>
            <span class="color-success-700"></span>
            <span class="color-success-800"></span>
            <span class="color-success-900"></span>
            <span class="color-fusion-50"></span>
            <span class="color-fusion-100"></span>
            <span class="color-fusion-200"></span>
            <span class="color-fusion-300"></span>
            <span class="color-fusion-400"></span>
            <span class="color-fusion-500"></span>
            <span class="color-fusion-600"></span>
            <span class="color-fusion-700"></span>
            <span class="color-fusion-800"></span>
            <span class="color-fusion-900"></span>
        </p>
        <!-- END Color profile -->
        <!-- base vendor bundle: 
             DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
                        + pace.js (recommended)
                        + jquery.js (core)
                        + jquery-ui-cust.js (core)
                        + popper.js (core)
                        + bootstrap.js (core)
                        + slimscroll.js (extension)
                        + app.navigation.js (core)
                        + ba-throttle-debounce.js (core)
                        + waves.js (extension)
                        + smartpanels.js (extension)
                        + src/../jquery-snippets.js (core) -->
        <script src="{{ asset('js/vendors.bundle.js')}}"></script>
        <script src="{{ asset('js/app.bundle.js')}}"></script>
        <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>
       <!--  <script type="text/javascript">
             $(document).ready(function()
            {
                $('#patient_records_table').dataTable(
                {
                    responsive: true
                });
            });
        </script> -->
         @livewireScripts
        <script type="text/javascript">
            $('#patientDetailsForm').submit(function(e) {
               e.preventDefault();
               let formData = new FormData(this);
               $('#image-input-error').text('');

               $.ajax({
                  type:'POST',
                  url: "{{route('patient.add')}}",
                   data: formData,
                   contentType: false,
                   processData: false,
                   success: (response) => {
                     if (response) {
                       // this.reset();
                       console.log(response);
                       $('#scanImage').attr('src', response.image_url);
                       Livewire.emit('showAnalysis', response.prediction);
                       // alert('Image has been uploaded successfully');
                     }
                   },
                   error: function(response){
                      console.log(response);
                        $('#image-input-error').text();
                   }
               });
            });
        </script>

        <script defer>
  $(document).ready(function() {

        let patientRecordsTable = $('#patient_records_table').DataTable({
            "ajax": {
                "url": '{{url('/patientRecordsList')}}', "type": "GET"
            },
            responsive: true,
            columns: [
                { data: 'patient_id' },
                { data: 'patient_surname' },
                { data: 'patient_fname' },
                { data: 'patient_oname' },
                { data: 'patient_gender' },
                { data: 'patient_age' },
                { data: 'patient_weight' },
        
            ],
            columnDefs: [
                { "targets": [1, 2], "className": '' },
                { "targets": [0,4,5,6], "className": 'text-center' },
                {
                    targets: 7,
                    data: null,
                    orderable: false,
                    render: function(data, type, full) {
                        return ` <div style="text-align:center!important;"><td style="width:190px ;text-align: center!important;">
                            <button type="button" title="View Details" id="edit" class="btn btn-xs edit-btn text-white btn-orange details-button text-uppercase" onclick="window.location='{{ route('patient_record_details', '') }}/${data.patient_id}'">
                                <i class="fas fa-user-edit"></i> <span class="hidden-mobile hidden-tablet">VIEW DETAILS</span>
                            </button>              
                        </td></div>`
                    },
            }]
        });
    })
</script>
    </body>
    <!-- END Body -->
</html>
