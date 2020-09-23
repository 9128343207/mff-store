@extends('layouts.vendor')
@section('title')
    Home
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
                    <h4>Products List</h4>
                    <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}">Add Product</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Department</th>
                                <th>In Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                @if (!$products == null)
                                    @php $count = 1; @endphp
                                    @foreach ($products as $product)
                                    
                                    @php $category = optional($product->category)->title @endphp
                                    <tr>
                                        <td>{{  $count }}</td>
                                        <td>
                                            @foreach ($product->productPhoto as $photos )
                                                <img height="60px" width="60px" src="{{ url('storage/products/img/'.$photos->filename)}}">
                                            @endforeach
                                        </td>
                                        <td>{{ $product->name }}</td>
                                            <td>{{ ($product->status != null) ?  $product->status : 'Not Verified'}}</td>
                                        <td>{{ $category }}</td>
                                        <!-- <td>{{ $product->manufacturer }}</td> -->
                                        <td>{{ $product->in_stock }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><a href="{{ Route('vendor.product.edit', ['item' => $product->id]) }}">Edit</a>&nbsp;<a href="{{ Route('vendor.product.delete', ['item' => $product->id]) }}">Delete</a></td>
                                        </tr>
                                            @php $count++; @endphp 
                                    @endforeach
                                @else
                                    <tr><td colspan="5"> You do not have added any products. <a href="{{route('vendor.product.listing')}}">Add now</a><td></tr>
                                @endif

                            </tr>

                        </table>
                    </div>
                    <div class="custom-pagination">
                        <!-- <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
