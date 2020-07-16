@extends('layouts.app-min')
@section('header')
    @include('inc.navbar-min')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <ol class="breadcrumb-page">
        <li><a href="#">Home </a></li>
        <li class="active"><a href="#">Verify</a></li>
    </ol>
</div>
<div class="customer-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h5 class="title-login">{{ __('Verify Your Email Address') }}</h5>
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

            </div>
        </div>
    </div>
</div>
@endsection
