@extends('layouts.auth_layout')

@section('pageTitle', 'Email Verification')

@section('content')
<div class="col col-sm-12 col-md-6 col-lg-5 col-xl-4">
    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
        Secure Email Address Verification
    </h1>
    <div class="card p-4 rounded-plus bg-faded custom-auth-card">
        <div class="card-header custom-auth-card-sections fw-900 text-uppercase">{{ __('Verify your email Address') }}</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-orange text-white p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
