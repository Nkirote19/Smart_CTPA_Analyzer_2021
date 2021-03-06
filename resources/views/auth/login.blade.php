@extends('layouts.auth_layout')

@section('pageTitle', 'Log In')

@section('content')

<div class="col col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Secure login
    </h1>
    <div class="card p-4 rounded-plus bg-faded custom-auth-card">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase">{{ __('Login') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="form-label custom-orange">{{ __('E-Mail Address') }}</label>   


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                           
                </div>

                <div class="form-group row">
                    <label for="password" class="form-label custom-orange">{{ __('Password') }}</label>                           
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                           
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12 offset-md-4 ">
                         @if (Route::has('password.request'))
                            <a class="custom-link" href="{{ route('password.request') }}" style="margin-left:-24px;">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-orange text-white mt-2">
                             <i class="fas fa-user-unlock"></i> {{ __('LOGIN') }}
                        </button>                               
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer orange-border-top custom-auth-card-sections">
            <a class="custom-link" href="{{ route('register') }}">{{ __('I do not have an account') }}</a>
        </div>
    </div>
</div>
@endsection