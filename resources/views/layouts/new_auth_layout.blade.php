@extends('layouts._master_layout') 

@section('main_content')

<div class="page-wrapper auth">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
                        <a href="" class="page-logo-link press-scale-down d-flex align-items-center">
                             <img src= "{{ asset('img/logo-v5.jpeg') }}" alt="Smart CTPA Analayzer" aria-roledescription="logo" style="width: 70px; height: 60px;">
                            <span class="page-logo-text mr-1">Smart CTPA Analyzer</span>
                        </a>
                    </div>
                    
                    @guest
                        <!-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif -->

                        @if (Route::has('register'))                                 
                            <a class="btn btn-link btn-orange text-white ml-auto" href="{{ route('register') }}"> <i class="far fa-user-plus"></i> {{ __('CREATE AN ACCOUNT') }}</a>
                        @endif
                    @else
                        <!-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> -->
                            <span>{{ Auth::user()->name }}</span>
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
                      <!--   </li> -->

                                                        
                        <a class="nav-link btn btn-orange" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('LOGOUT') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>                        
                    @endguest
                </div>
            </div>

            <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        
                          @yield('content')

                        <div class="col-md-6 col-lg-7 hidden-sm-down ml-auto">                                  
                            <image src="{{asset('img/logo-v5.jpeg')}}" class="auth-page-logo-img" alt="Smart CTPA Analayzer Logo"> 
                            <blockquote class="blockquote text-right">
                                <h2 class="fs-xxl fw-500 mt-4 custom-blue"> "<u class="orange-underline">Faster</u>, <u class="orange-underline">Better</u> and <u class="orange-underline">Simpler</u> means to help you diagnose <span class="custom-orange">Pulmonary Embolism</span>."</h2>     
                            </blockquote>
                        </div>
                    </div>

                    <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white auth-page-footer">
                        <?php echo date('Y');?> &copy; Smart CTPA Analyzer 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

