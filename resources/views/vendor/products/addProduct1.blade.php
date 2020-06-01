@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('contnt')
    <h1>Add New Product - Step 1</h1>
    {{-- <hr>{{ dd($product)}} --}}
    @if ($errors->any())
            <div class="alert alert-danger">

                @foreach ($errors->all() as $message) {
                    <span>{{ $message }}</span>
                @endforeach
            </div>
        @endif

    <form action="/vendor/products/create-step1" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Item Name</label>
            <input type="text" value="{{{ isset($product->name) ? $product->name : '' }}}" class="form-control" id="taskTitle"  name="name">
            @error('name')
                <span class="alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Brand Name</label>
            <input type="text" value="{{{ isset($product->bname) ? $product->bname : '' }}}" class="form-control" id="taskTitle"  name="bname">
            @error('bname')
                <span class="alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Manufacturer</label>
            <input type="text" value="{{{ isset($product->manufacturer) ? $product->manufacturer : '' }}}" class="form-control" id="taskTitle"  name="manufacturer">
            @error('manufacturer')
                <span class="alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Short Description</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="s_desc">{{{ isset($product->s_desc) ? $product->s_desc : '' }}}</textarea>
            @error('s_desc')
                <span class="alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
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
                <div class="form-group">
                        <label for="title">Item Price</label>
                        <input type="number" value="{{{ isset($product->price) ? $product->price : '' }}}" class="form-control" id="taskTitle"  name="price">
                        @error('price')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    <div class="form-group">
                        <label for="description">Currency</label>  {{-- // TODO add currency units --}}
                        <select class="form-control" name="currency">
                            <option {{{ (isset($product->currency) && $product->currency == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                            <option {{{ (isset($product->currency) && $product->currency == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                            <option {{{ (isset($product->currency) && $product->currency == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                            <option {{{ (isset($product->currency) && $product->currency == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="title">Stock</label>
                            <input type="number" value="{{{ isset($product->in_stock) ? $product->in_stock : '' }}}" class="form-control" id="taskTitle"  name="in_stock">
                            @error('in_stock')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
        <button type="submit" class="btn btn-primary">Add Product Image</button>
    </form>
@endsection

@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Product Details</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $message) {
                                                        <span>{{ $message }}</span>
                                                    @endforeach
                                            </div>
                                        @endif
                                            <form action="/vendor/products/create-step1" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="text" value="{{{ isset($product->name) ? $product->name : '' }}}" class="form-control" id="taskTitle"  name="name" placeholder="Item Name">
                                                            @error('name')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Item's Brand Name" value="{{{ isset($product->bname) ? $product->bname : '' }}}" class="form-control" id="taskTitle"  name="bname">
                                                            @error('bname')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Manufacturer" value="{{{ isset($product->manufacturer) ? $product->manufacturer : '' }}}" class="form-control" id="taskTitle"  name="manufacturer">
                                                            @error('manufacturer')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror                                                        </div>
                                                        <div class="form-group">
                                                            <textarea type="text"  class="form-control" id="taskDescription" name="s_desc">{{{ isset($product->s_desc) ? $product->s_desc : 'Write Short Description...' }}}</textarea>
                                                            @error('s_desc')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror                                                        </div>
                                                        <div class="form-group alert-up-pd">
                                                            <input type="text" placeholder="Item Weight" value="{{{ isset($product->item_weight) ? $product->item_weight : '' }}}" class="form-control" id="taskTitle"  name="item_weight">
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                                <select class="form-control" name="weight_measure_unit">
                                                                    <option Selected>Choose Weight Measure Unit</option>
                                                                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                                                                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                                                                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                                                                    <option {{{ (isset($product->weight_measure_unit) && $product->weight_measure_unit == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
                                                                </select>                                                        </div>
                                                        <div class="form-group">
                                                                <input type="number" placeholder="Price" value="{{{ isset($product->price) ? $product->price : '' }}}" class="form-control" id="taskTitle"  name="price">
                                                                @error('price')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" name="currency">
                                                                    <option selected>Choose Currency</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" placeholder="Available Product Quantity" value="{{{ isset($product->in_stock) ? $product->in_stock : '' }}}" class="form-control" id="taskTitle"  name="in_stock">
                                                                @error('in_stock')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm <select class="form-control" name="currency">


                                                        <div class="form-group">
                                                            <textarea type="text"  class="form-control" id="taskDescription" name="warranty_desc">{{{ isset($product->warranty_desc) ? $product->warranty_desc : 'Warranty Description...' }}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea type="text"  class="form-control" id="taskDescription" name="description">{{{ isset($product->description) ? $product->description : 'Product Full Description..' }}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea type="text"  class="form-control" id="taskDescription" name="description2">{{{ isset($product->description2) ? $product->description2 : 'Product Attribute Bullet Points' }}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea type="text"  class="form-control" id="taskDescription" name="description3">{{{ isset($product->description3) ? $product->description3 : 'Legel Disclaimer' }}}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="Phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                                    </div>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Facebook URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Twitter URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Google Plus">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Linkedin URL">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
