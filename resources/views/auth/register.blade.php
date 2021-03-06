@extends('layouts.auth_layout')

@section('pageTitle', 'Register')

@section('content')
<div class="col col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Secure Registration
    </h1>
    <div class="card p-4 rounded-plus bg-faded custom-auth-card" style="margin-top:-30px;">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase" >{{ __('Create Account') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="form-label custom-orange">{{ __('Name') }}</label>                 
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror          
                </div>

                <div class="form-group row">
                    <label for="email" class="form-label custom-orange">{{ __('E-Mail Address') }}</label>                   
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="password" class="form-label custom-orange">{{ __('Password') }}</label>                  
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror               
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="form-label custom-orange">{{ __('Confirm Password') }}</label>                   
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                  
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3" style="margin-left: 85px;">
                        <button type="submit" class="btn btn-orange text-white text-uppercase">
                            <i class="fas fa-user-plus"></i> {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer orange-border-top custom-auth-card-sections">
             <a class="custom-link" href="{{ route('login') }}">{{ __('I already have an account') }}</a>
        </div>
    </div>
</div>
@endsection
