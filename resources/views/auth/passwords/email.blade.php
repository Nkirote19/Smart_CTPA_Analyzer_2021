@extends('layouts.auth_layout')

@section('pageTitle', 'Forgot Password')

@section('content')
<div class="col col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Secure login
    </h1>
    <div class="card p-4 rounded-plus bg-faded custom-auth-card" style="margin-top:60px!important;">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase">{{ __('PASSWORD RESET REQUEST') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-orange text-white text-uppercase mt-2" style="width:240px; margin-left: -80px;">
                           <i class="fas fa-paper-plane"></i> {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer orange-border-top custom-auth-card-sections">
            <a class="custom-link" href="{{ route('login') }}">{{ __('I remembered my password') }}</a>
        </div>
    </div>
</div>
@endsection
