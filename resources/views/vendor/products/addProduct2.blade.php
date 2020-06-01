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
            <label for="title">Item Weight</label>
            <input type="text" value="{{{ isset($product->item_weight) ? $product->item_weight : '' }}}" class="form-control" id="taskTitle"  name="item_weight">
        </div>
        <div class="form-group">
            <label for="description">Weight measure unit</label>
            <select class="form-control" name="weight_measure_unit">
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
            </select>
        </div>
        <div class="form-group">
                <label for="title">Item Volume</label>
                <input type="text" value="{{{ isset($product->volume) ? $product->volume : '' }}}" class="form-control" id="taskTitle"  name="volume">
            </div>
            <div class="form-group">
                <label for="description">Weight measure unit</label>
                <select class="form-control" name="volume_measure_unit">
                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'cubic-ft') ? "selected=\"selected\"" : "" }}}>cubic-ft</option>
                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'ounce') ? "selected=\"selected\"" : "" }}}>ounce</option>
                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'cubic-m') ? "selected=\"selected\"" : "" }}}>cubic-m</option>
                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'liters') ? "selected=\"selected\"" : "" }}}>liters</option>
                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'grams') ? "selected=\"selected\"" : "" }}}>grams</option>
                </select>
            </div>
        <div class="form-group">
            <label for="description">Warranty Descriptions</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="warranty_desc">{{{ isset($product->warranty_desc) ? $product->warranty_desc : '' }}}</textarea>
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
        <button type="submit" class="btn btn-primary">Add Product Image</button>
    </form>
@endsection
