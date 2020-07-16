@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
    <h1>Add New Product - Step 1</h1>
    {{-- <hr>{{ dd($product)}} --}}
    <form action="/products/create-step1" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Item Price</label>
            <input type="text" value="{{{ isset($product->price) ? $product->price : '' }}}" class="form-control" id="taskTitle"  name="price">
        </div>
        <div class="form-group">
            <label for="description">Currency</label>  {{-- // TODO add currency units --}}
            <select class="form-control" name="weight_measure_unit">
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
            </select>
        </div>
        <div class="form-group">
                <label for="title">Available</label>
                <input type="text" value="{{{ isset($product->in_stock) ? $product->in_stock : '' }}}" class="form-control" id="taskTitle"  name="in_stock">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Review</button>
    </form>
@endsection
