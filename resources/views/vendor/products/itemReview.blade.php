@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
<h1>Add New Product - Step 3</h1>
<hr>
<h3>Review Product Details</h3>
<form action="/vendor/products/store" method="post" >
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td>Product Name:</td>
            <td><strong>{{$product->name}}</strong></td>
        </tr>
        <tr>
            <td>Product Amount:</td>
            <td><strong>{{$product->amount}}</strong></td>
        </tr>
        <tr>
            <td>Product Company:</td>
            <td><strong>{{$product->company}}</strong></td>
        </tr>
        <tr>
            <td>Product Available:</td>
            <td><strong>{{$product->available ? 'Yes' : 'No'}}</strong></td>
        </tr>
        <tr>
            <td>Product Description:</td>
            <td><strong>{{$product->description}}</strong></td>
        </tr>
        {{-- <tr>
            <td>Product Image:</td>
            <td><strong><img alt="Product Image" src="/storage/productimg/{{$productImages->productImg}}"/></strong></td>
        </tr> --}}
        <tr>
             @if(Session::has('type') !== 0 && session('type') == 'new')
                @if($productImages)
               @foreach ($productImages as $image )
                  @if($image)
                    <td><img height="300px" width="300px" src="{{  url('storage/products/img/',$image)}}"></td>
                @else
                    <span style="color: red">Image not added! Please try again.</span>
                    <script type="text/javascript">$('#final-submit').prop('disabled', true); </script>
                @endif
                @endforeach
              @endif
            @else
              @if($productImages)
               @foreach ($productImages as $image )
                @if($image->filename)
                  <td><img height="300px" width="300px" src="{{  url('storage/products/img/',$image->filename)}}"></td>
                @else
                <span style="color: red">Image not added! Please try again.</span>
                <script type="text/javascript">$('#final-submit').prop('disabled', true); </script>
                @endif
              @endforeach
              @endif
            @endif
       
        </tr>
    </table>
    <a type="button" href="{{ Route('vendor.product.listing') }}" class="btn btn-warning">Back to Products details</a>
    <!-- <a type="button" href="/products/create-step2" class="btn btn-warning">Back to Step 2</a> -->
    <button id="final-submit" type="submit" class="btn btn-primary">Create Product</button>
</form>
@endsection
