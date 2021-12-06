@extends('layouts.auth_layout')

@section('pageTitle', 'Email Confirmation')

@section('content')

<div class="col col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Secure login
    </h1>
    <div class="card p-4 rounded-plus bg-faded custom-auth-card">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase">{{ __('Confirm Password') }}</div>

        <div class="card-body">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-orange text-white">
                            <i class="fas fa-key"></i> {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link btn-orange text-white" href="{{ route('password.request') }}">
                                <i class="fas fa-key"></i> {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
