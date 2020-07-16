@extends('layouts.vendor')
@section('title')
    {{$user->store->store_name}}
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
                    <h4>Store</h4>
                    <!-- <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}"></a>
                    </div> -->
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <td><strong>Store Name -</strong></td>
                                <td>{{$user->store->store_name}}</td>
                                <td>by -&nbsp;{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$user->store->description}}</td>
                            </tr>
                            <tr>
                                <td><strong>Products</strong></td>
                                <td>{{count($user->store->products)}}</td>
                                <td><a href="/admin/store/products/{{$user->store->id}}">View products</a></td>
                            </tr>
                            
                                

                            

                        </table>
                    </div>
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
