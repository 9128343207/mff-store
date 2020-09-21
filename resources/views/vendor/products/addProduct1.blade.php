@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
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

                                                        <div class="form-group res-mg-t-15">

                                                            {{-- <label for="description">Product Category</label> --}}
                                                           <select name="p-category" class="form-control">
                                                               <option>Choose category</option>
                                                               @foreach ($allCategories as $category)
                                                                <option value="{{ $category['id'] }}">{{  $category['title'] }}</option>
                                                               @endforeach
                                                           </select>
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
                                                                <lable>Price in (USD)</lable>
                                                                <input type="number" placeholder="Price (in USD)" value="{{{ isset($product->price) ? $product->price : '' }}}" class="form-control" id="taskTitle"  name="price">
                                                                @error('price')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                
                                                                <input type="checkbox" placeholder="Price (in USD)" value="{{{ isset($product->price_status) ? $product->price_status : '' }}}" class="form-control" id="taskTitle" style="width: 50px;height: 20px;"  name="price_status">
                                                                <lable>Hide price </lable>
                                                                @error('price')
                                                                <span class="alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <input type="hidden" name="currency" value="USD">
                                                            <!-- <div class="form-group">
                                                                <select class="form-control" name="currency">
                                                                    <option selected>Choose Currency</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'OZ') ? "selected=\"selected\"" : "" }}}>OZ</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'KG') ? "selected=\"selected\"" : "" }}}>KG</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'GR') ? "selected=\"selected\"" : "" }}}>GR</option>
                                                                    <option {{{ (isset($product->currency) && $product->currency == 'LB') ? "selected=\"selected\"" : "" }}}>LB</option>
                                                                </select>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <lable>Available Product Quantity</lable>
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
