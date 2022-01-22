@extends('layouts.auth_layout')

@section('pageTitle', 'Reset Password')

@section('content')
<div class="col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <div class="card px-4 custom-auth-card" style="margin-top:90px;">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase">{{ __('Reset Password') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="form-label custom-orange">{{ __('E-Mail Address') }}</label>  
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-orange text-white mt-2 text-uppercase" style="width:180px; margin-left: -50px;">
                            <i class="fas fa-user-lock"></i> {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
