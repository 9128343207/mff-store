@extends('layouts.vendor-center')
@section('title')
Create Store
@endsection

@section('content')

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3>{{ __('Register') }}</h3>
            <p>Create Your Store!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="row">
                                <div class="form-group col-lg-12">
                                        <label>{{ __('Store Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('storename') is-invalid @enderror" name="storename" value="{{ old('storename') }}" required autocomplete="storename" >

                                        @error('storename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>{{ __('Store description')}}</label>
                                    <textarea rows="6" cols="6" name="desc">
                                    </textarea>
                                </div>

                            <div class="checkbox col-lg-12">
                                <input type="checkbox" class="i-checks" checked> Accept terms & conditions
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success loginbtn">{{ __('Register') }}</button>
                            <a class="btn btn-default" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
