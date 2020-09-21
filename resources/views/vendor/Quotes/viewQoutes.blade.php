@extends('layouts.vendor')
@section('title')
    Qoutes Request
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
	<div class="product-status mg-b-15">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Qoute Summary</h4>
                    <h5>Product Details</h5>
                    <table>

                        <tr>
                            <td>{{$data['Product']->name}}</td><td>{{$data['Quotes']->qty}}</td>
                        </tr>
                        <tr>
                            <td>{{$data['Quotes']->summary}}</td>
                        </tr>
                    </table>

                    <br><br>
                    <h5>User Details</h5>
                    <table>
                        <tr>
                            <td>{{$data['User']->name}}</td><td>{{$data['User']->email}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection