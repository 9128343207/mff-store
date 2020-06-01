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
            <label for="description">Product Descriptions</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="description">{{{ isset($product->description) ? $product->description : '' }}}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Product Attribute Bullet Points</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="description2">{{{ isset($product->description2) ? $product->description2 : '' }}}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Legal Disclaimer</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="description3">{{{ isset($product->description3) ? $product->description3 : '' }}}</textarea>
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
