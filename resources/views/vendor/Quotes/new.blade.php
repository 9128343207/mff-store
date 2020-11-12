@extends('layouts.vendor')
@section('title')
    Quotes Request
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
                    <h4>Quotes Requests</h4>
                    <div class="add-product">
                    <!-- <a href="{{ Route('vendor.product.listing') }}">Add Product</a> -->
                    </div>
                    <div class="asset-inner">
                       
                        <table>
                            <tr>
                                <th>No</th>
                                <!-- <th>Image</th> -->
                                <th>Product Name</th>
                                <th>Status</th>
                                
                                <th>Date/Time</th>
                                <th>Action</th>
                            </tr>
                            @if(count($data['quotes']) != 0)
                            @php $count = 1; @endphp
                            @foreach($data['quotes'] as $quote)
                            <tr>
                            	
                                
                                    @if(App\Product::find($quote->product_id) != null)
                                    <td>{{$count}}</td>
                                    <td>{{App\Product::find($quote->product_id)->name}}</td>
                                    <td>{{$quote->status}}</td>
                                    <td>{{$quote->created_at}}</td>
                                    <td><a href="{{route('vendor.quotes.view', ['id' => $quote->id])}}">view</a></td>
                                @else 
                                <td style="color: red;">{{$count}}</td>
                                <td style="color: red;">Product have been removed!</td>
                                @endif
                               
                            		
                            	@php $count = $count + 1;	@endphp
                                
                            </tr>
                            @endforeach
                            @else
                            <tr><td>No Quotes available!</td></tr>
                            @endif

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