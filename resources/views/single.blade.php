@extends('layouts.app')
@section('title')
{{$item->name}}
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')
<script>

    var item = {!! json_encode($item->toArray(), JSON_HEX_TAG) !!};
    window.item = (item) ? item : 0;
    // console.log(item);
</script>
<div class="container">
        <ol class="breadcrumb-page">
            <li><a href="{{ route('home') }}">Home </a></li>
            <li class="active"><a href="">Product</a></li>
            <li class="active"><a href="">{{ $item->name}}</a></li>

        </ol>
    </div>
    <div class="container">
        <div class="product-content-single">
            <div class="row">
                <div class="col-md-4 col-sm-12 padding-right">
                    <div class="product-media">
                        <div class="image-preview-container image-thick-box image_preview_container">
                           

                             @if(isset($item->productPhoto[0]->filename))
                                                                        <img height="200" width="200" id="img_zoom" data-zoom-image="{{ url('storage/products/img/'.$item->productPhoto[0]->filename)}}" src="{{ url('storage/products/img/'.$item->productPhoto[0]->filename)}}" alt="{{$item->name}}">
                                                                    @else 
                                                                        <img height="200" width="200" src="{{ url('files/v-17-512.png')}}" alt="{{$item->name}}">
                                                                    @endif

                            <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-preview image-small product_preview">
                            <div id="thumbnails" class="thumbnails_carousel owl-carousel nav-style4" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":5},"600":{"items":5},"1000":{"items":5}}'>
                                @if(isset($item->productPhoto[0]->filename))
                                    @foreach ($item->productPhoto as $image )
                                        <a href="#" data-image="images/detail/thick-box-1.jpg" data-zoom-image="{{ url('storage/products/img/'.$image->filename)}}">
                                            <img src="{{ url('storage/products/img/'.$image->filename)}}" alt="{{$item->name}}" data-large-image="{{ url('storage/products/img/'.$image->filename)}}" alt="{{$item->name}}">
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="product-info-main">
                    <div class="product-name"><a href="">{{ $item->name.' - '.$item->bname}}</a><br>
                        {{-- <small>Sold by - {{$item->store->store_name}}</small> --}}
                    </div>
                        {{-- <span class="star-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="review">5 Review(s)</span>
                        </span> --}}
                        <div class="product-infomation">
                            {{ $item->s_desc}}
                        </div>
                        <div class="group-btn-share">
                            <a href="#"><img src="images/detail/btn1.png" alt="btn1"></a>
                            <a href="#"><img src="images/detail/btn2.png" alt="btn1"></a>
                            <a href="#"><img src="images/detail/btn3.png" alt="btn1"></a>
                            <a href="#"><img src="images/detail/btn4.png" alt="btn1"></a>
                        </div>
                        {{-- <div class="product-description">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 making it over 2000 years old.
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-info-price">
                        <div class="product-info-stock-sku">
                            <div class="stock available">
                                <span class="label-stock">Availability: </span>{{ ($item->in_stock != 0) ? 'In stock' : 'Unavailable'}}
                            </div>
                        </div>
                        {{-- <div class="transportation">
                            <span>item with Free Delivery</span>
                        </div> --}}

                            <!-- <span class="price">
                                @if (!$item->discount_price)
                                    <ins>${{ $item->price}}</ins>
                                @else
                                    <ins>${{ ($item->price * $item->discount_price)/100}}</ins>
                                    <del>${{ $item->price}}</del>
                                    {{-- <span class="onsale">-50%</span> // TODO add calculation for persantage --}}
                                @endif
                            </span> -->
                        <div class="quantity">
                                <!-- <form method="POST" onsubmit="event.preventDefault(); addToCart(this);" action="#" id="cart">
                                        @csrf
                            <h6 class="quantity-title">Quantity:</h6>
                            <div class="buttons-added">
                                <input type="text" value="1" name="quantity" title="Qty" class="input-text qty text" size="1">
                                <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="single-add-to-cart">
                                <input type="hidden"  name="productId" value="{{ $item->id}}">
                                <input type="submit" data-btn-id-add="{{ $item->id}}" class="btn-add-to-cart" value="Add To Cart">
                                <button class="btn-added" data-btn-id-added="{{ $item->id}}"  style="display:none" class="btn-add-to-cart" value="Added">Added</button>
                            </form> -->
                             <a href="{{ route('quotes', ['pid' => $item->id])}}"><button>Get Quotes</button></a>
                            {{-- <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i>Compare</a>
                            <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>Wishlist</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tab-details-product">
            <ul class="box-tab nav-tab">
                <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                <li><a data-toggle="tab" href="#tab-2">Addtional Infomation</a></li>
                {{-- <li><a data-toggle="tab" href="#tab-3">Reviews</a></li> --}}
            </ul>
            <div class="tab-container">
                <div id="tab-1" class="tab-panel active">
                    <div class="box-content">
                    {{$item->description2}}
                    </div>
                </div>
                <div id="tab-2" class="tab-panel">
                    <div class="box-content">
                        {{$item->description3}}<br>
                        {{$item->warranty_desc}}
                    </div>
                </div>
                <div id="tab-3" class="tab-panel">
                    <div class="box-content">
                        <form method="post" action="#"  class="new-review-form">
                            <a href="#" class="form-title">Write a review</a>
                            <div class="form-content">
                                <p class="form-row form-row-wide">
                                    <label>Name</label>
                                    <input type="text" value="" name="text" placeholder="Enter your name" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Email</label>
                                    <input type="text" name="text" placeholder="admin@example.com" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Review Title<span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="Give your review a title" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Body of Review (1500)</label>
                                    <textarea aria-invalid="false" class="textarea-control" rows="5" cols="40" name="message"></textarea>
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Submit Review" name="Submit" class="button-submit">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-recent-view">
        <div class="container">
            <div class="title-of-section">You may be also interested</div>
            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>

                @foreach ($similars as $similar)
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="{{ $similar->id}}">

                                    
                                    @if(isset($similar->productPhoto[0]->filename))
                                                                        <img height="200" width="200" id="img_zoom" data-zoom-image="{{ url('storage/products/img/'.$similar->productPhoto[0]->filename)}}" src="{{ url('storage/products/img/'.$similar->productPhoto[0]->filename)}}" alt="{{$similar->name}}">
                                                                    @else 
                                                                        <img height="200" width="200" src="{{ url('files/v-17-512.png')}}" alt="{{$similar->name}}">
                                                                    @endif

                                </a>
                            </div>
                            {{-- <span class="onsale">-50%</span> --}}
                            <a href="" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="{{ $similar->id }}">{{ $similar->name }}</a></div>
                            <span class="price">
                                @if (!$similar->discount_price)
                                    <ins>${{ $similar->price }}</ins>
                                @else
                                    <ins>${{ $similar->discount_price }}</ins>
                                    <del>${{ $similar->price }}</del>
                                    <span class="onsale">-50%</span> {{-- // TODO add calculation for persantage --}}
                                @endif
                            </span>
                            <span class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="review">5 Review(s)</span>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- <div class="block-section-brand">
        <div class="container">
            <div class="section-brand style1">
                <div class="owl-carousel nav-style3" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="2" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":4},"1000":{"items":6}}'>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                    <a href="" class="item-brand"><img src="images/home1/brand1.jpg" alt="brand1"></a>
                </div>
            </div>
        </div>
    </div>
 -->
@endsection
