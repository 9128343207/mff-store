@extends('layouts.vendor')
@section('title')
        
@endsection
@section('header')
    @include('inc.ad-sidebar')
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
                    <h4>Order Summary - </h4>
                    <!-- <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}"></a>
                    </div> -->
                    <div class="asset-inner">
                         <div>
                        <table class="modaltable"> {{dd($itemSummary)}}
                       
                        </table>
                        </div>
                    </div>
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
