@extends('layouts._master_layout') 

@section('main_content')
<div id="app" class="main-img"> 
    <nav class="navbar navbar-expand-md auth-page-header shadow-sm">
        <div class="container">
            <a class="page-logo-link press-scale-down d-flex align-items-center" href="{{ url('/') }}">
                <img src= "{{ asset('img/logo-v5.jpeg') }}" alt="Smart CTPA Analayzer" aria-roledescription="logo" style="width: 70px; height: 60px;">
                <span class="page-logo-text mr-1 logo-text">Smart CTPA Analyzer</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <!-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif -->

                        @if (Route::has('register'))
                            <li class="nav-item">                                  
                                <a class="nav-link btn btn-orange" href="{{ route('register') }}"> <i class="far fa-user-plus"></i> {{ __('CREATE AN ACCOUNT') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> -->
                    </li>

                    <li class="nav-item">                                  
                        <a class="nav-link btn btn-orange" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('LOGOUT') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row">
                @yield('content')
                <div class="col-8 hidden-sm-down">
                    <image src="{{asset('img/logo-v5.jpeg')}}" class="auth-page-logo-img" alt="Smart CTPA Analayzer Logo"> 
                    <blockquote class="blockquote text-right div-centered-items">
                        <h2 class="fs-xxl fw-500 mt-4 custom-blue"> "<u class="orange-underline">Faster</u>, <u class="orange-underline">Better</u> and <u class="orange-underline">Simpler</u> means to help you diagnose <span class="custom-orange">Pulmonary Embolism</span>."</h2>     
                    </blockquote>
                </div>
            </div>
        </div>
    </main>
</div>

<div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white auth-page-footer">       
     <?php echo date('Y');?> &copy; Smart CTPA Analyzer 
</div>
@endsection