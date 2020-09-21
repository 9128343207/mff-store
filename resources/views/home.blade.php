@extends('layouts.app')

@section('header')
    @include('inc.navbar')
@endsection
@section('content')
<div class="block-section-1">
    <div class="main-slide slide-opt-1 full-width">
        <div class="owl-carousel nav-style1" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>

            @foreach ($products->Top3 as $product )
                <div class="item-slide item-slide-1" style="background-image: url('{{asset('files/slide-1.jpg')}}');">
                    <div class="slide-desc slide-desc-1">
                    <div class="p-primary"  style="color:white;">{{ $product->name}}</div>
                        <p style="color:white;">{{ $product->s_desc}}</p>
                        <a href="{{ url('product/'.$product->id)}}" class="btn-shop-now">Shop Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@if ($products->WeeklyDeals) 
<div class="block-daily-deals style1">
    <div class="container">
        <div class="title-of-section">Weekly deals</div>
        <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":3},"992":{"items":2}}'>
            {{-- {{dd($products->WeeklyDeals)}} --}}
            @foreach ($products->WeeklyDeals as $deal)
                <div class="deal-of-day equal-elem">
                    <div class="product-thumb style1">
                        <div class="thumb-inner">
                        <a href="{{ url('product/'.$deal->id)}}"><img src="{{ url('storage/products/img/'.$deal->productPhoto[0]->filename)}}" alt="{{$deal->name}}"></a>
                        </div>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="{{ url('product/'.$deal->id)}}">{{ $deal->name}}</a></div>
                        @if ($deal->price_status == 1)
                            <span class="price">
                                @if (!$deal->discount_price)
                                    <ins>${{ $deal->price}}</ins>
                                @else
                                    <ins>${{ $deal->discount_price}}</ins>
                                    <del>${{ $deal->price}}</del>
                                    <span class="onsale">-50%</span> {{-- // TODO add calculation for persantage --}}
                                @endif
                            </span>
                        
                        @endif
                        <span class="star-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="review">5 Review(s)</span>
                        </span>
                        <div class="product-count-down">
                            <div class="kt-countdown" data-y="2020" data-m="2" data-d="27" data-h="10" data-i="0" data-s="0"></div>
                        </div>
                         @if ($deal->price_status == 1)
                        <form method="POST" onsubmit="event.preventDefault(); addToCart(this);" action="#" id="cart">
                                @csrf
                            <input type="hidden"  name="productId" value="{{ $deal->id}}">
                            <input type="submit" data-btn-id-add="{{ $deal->id}}" class="btn-add-to-cart" value="Add To Cart">
                            <button class="btn-added" data-btn-id-added="{{ $deal->id}}"  style="display:none" class="btn-add-to-cart" value="Added">Added</button>
                        </form>
                        @else 
                                                    <a href="{{ route('quotes', ['pid' => $deal->id])}}"><button>Get Quotes</button></a>
                                                @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="block-section-4">
    <div class="container">
        <div class="title-of-section">Featured Products</div>
        <div class="tab-product tab-product-fade-effect">
            {{-- <ul class="box-tabs nav-tab">
                <li class="active"><a data-animated="" data-toggle="tab" href="#tab-1">All Products </a></li>
                <li><a data-animated="fadeInLeft" data-toggle="tab" href="#tab-2">Laptop & Computer</a></li>
                <li><a data-animated="zoomInUp" data-toggle="tab" href="#tab-1">TV & Audio </a></li>
                <li><a data-animated="zoomInUp" data-toggle="tab" href="#tab-2">Game & Consoles</a></li>
            </ul> --}}
            <div class="tab-content">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                @foreach ($products->NewArrivals->chunk(2) as $productRow )
                                    <div class="owl-one-row">
                                        @foreach ($productRow as $singleProduct)
                                        <div class="product-item style1">
                                                <div class="product-inner equal-elem">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="{{ url('product/'.$singleProduct->id)}}"><img src="{{ url('storage/products/img/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}"></a>
                                                        </div>

                                                        <a href="" class="quick-view">Quick View</a>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="{{ url('product/'.$singleProduct->id)}}">{{$singleProduct->name}}</a></div>
                                                        @if ($singleProduct->price_status == 1)
                                                            <span class="price">
                                                                @if (!$singleProduct->discount_price)
                                                                    <ins>${{ $singleProduct->price}}</ins>
                                                                @else
                                                                    <ins>${{ $singleProduct->discount_price}}</ins>
                                                                    <del>${{ $singleProduct->price}}</del>
                                                                    <span class="onsale">-50%</span> {{-- // TODO add calculation for persantage --}}
                                                                @endif
                                                            </span>
                                                        
                                                        @endif
                                                        <div class="group-btn-hover">
                                                            <div class="inner">
                                                                 @if ($singleProduct->price_status == 1)
                                                                {{-- <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                                                <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a> --}}
                                                                <form method="POST" onsubmit="event.preventDefault(); addToCart(this);" action="#" id="cart">
                                                                    @csrf
                                                                <input type="hidden"  name="productId" value="{{ $singleProduct->id}}">
                                                                <input type="submit" data-btn-id-add="{{ $singleProduct->id}}" class="btn-add-to-cart" value="Add To Cart">
                                                                <button class="btn-added" data-btn-id-added="{{ $singleProduct->id}}"  style="display:none" class="btn-add-to-cart" value="Added">Added</button>
                                                            </form>
                                                            @else
                                                             <a href="{{ route('quotes', ['pid' => $singleProduct->id])}}"><button>Get Quotes</button></a>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                    </div>
                    <div id="tab-2" class="tab-panel">
                        <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-section-5">
   <div class="full-width background-section-5">
        <div class="container">
            <div class="title-of-section style2">Top Selling</div>
            <div class="tab-product tab-product-fade-effect">
                {{-- <ul class="box-tabs nav-tab style2">
                    <li class="active"><a data-animated="" data-toggle="tab" href="#tab-3">All Products </a></li>
                    <li><a data-animated="fadeInLeft" data-toggle="tab" href="#tab-4">Laptop & Computer</a></li>
                    <li><a data-animated="zoomInUp" data-toggle="tab" href="#tab-3">TV & Audio </a></li>
                    <li><a data-animated="zoomInUp" data-toggle="tab" href="#tab-4">Game & Consoles</a></li>
                </ul> --}}
                <div class="tab-content">
                    <div class="tab-container">
                        <div id="tab-1" class="tab-panel active">
                            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                    @foreach ($products->TopSelling->chunk(2) as $productRow )
                                        <div class="owl-one-row">
                                            @foreach ($productRow as $singleProduct)
                                            <div class="product-item style1">
                                                    <div class="product-inner equal-elem">
                                                        <div class="product-thumb">
                                                            <div class="thumb-inner">
                                                                <a href="{{ url('product/'.$singleProduct->id)}}"><img src="{{ url('storage/products/img/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}"></a>
                                                            </div>

                                                            <a href="" class="quick-view">Quick View</a>
                                                        </div>
                                                        <div class="product-innfo">
                                                            <div class="product-name"><a href="{{ url('product/'.$singleProduct->id)}}">{{$singleProduct->name}}</a></div>
                                                            @if ($singleProduct->price_status)
                                                                <span class="price">
                                                                    @if (!$singleProduct->discount_price)
                                                                        <ins>${{ $singleProduct->price}}</ins>
                                                                    @else
                                                                        <ins>${{ $singleProduct->discount_price}}</ins>
                                                                        <del>${{ $singleProduct->price}}</del>
                                                                        <span class="onsale">-50%</span> {{-- // TODO add calculation for persantage --}}
                                                                    @endif
                                                                </span>
                                                            
                                                            @endif
                                                            <div class="group-btn-hover">
                                                                <div class="inner">
                                                                     @if ($singleProduct->price_status == 1)
                                                                    {{-- <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                                                    <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a> --}}
                                                                    <form method="POST" onsubmit="event.preventDefault(); addToCart(this);" action="#" id="cart">
                                                                        @csrf
                                                                    <input type="hidden"  name="productId" value="{{ $singleProduct->id}}">
                                                                    <input type="submit" data-btn-id-add="{{ $singleProduct->id}}" class="btn-add-to-cart" value="Add To Cart">
                                                                    <button class="btn-added" data-btn-id-added="{{ $singleProduct->id}}"  style="display:none" class="btn-add-to-cart" value="Added">Added</button>
                                                                </form>
                                                                @else
                                                                     <a href="{{ route('quotes', ['pid' => $singleProduct->id])}}"><button>Get Quotes</button></a>
                                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<!-- <div class="block-section-6">
    <div class="container">
        <div class="promotion-banner box-single style-2">
            <a href="" class="banner-img"><img src="images/home1/banner-3.jpg" alt="banner-3"></a>
            <a href="" class="shop-now hidden-mobile">Shop now</a>
        </div>
    </div>
</div>
<div class="block-recent-view">
    <div class="container">
        <div class="title-of-section">Recently Viewed Products</div>
        <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r1.jpg" alt="r1"></a>
                        </div>
                        <span class="onsale">-50%</span>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Women Hats</a></div>
                        <span class="price">
                            <ins>$229.00</ins>
                            <del>$259.00</del>
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
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r2.jpg" alt="r2"></a>
                        </div>
                        <span class="onnew">new</span>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Basketball Sports Shoes</a></div>
                        <span class="price price-dark">
                            <ins>$229.00</ins>
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
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r3.jpg" alt="r3"></a>
                        </div>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Dark Green Prada Sneakers</a></div>
                        <span class="price price-dark">
                            <ins>$229.00</ins>
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
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r4.jpg" alt="r4"></a>
                        </div>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Clutches in Men's Bags for Men</a></div>
                        <span class="price price-dark">
                            <ins>$229.00</ins>
                        </span>
                        <div class="group-btn-hover style2">
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                            <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                            <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r5.jpg" alt="r5"></a>
                        </div>
                        <span class="onsale">-50%</span>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Parka With a Hood</a></div>
                        <span class="price">
                            <ins>$229.00</ins>
                            <del>$259.00</del>
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
            <div class="product-item style1">
                <div class="product-inner equal-elem">
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href=""><img src="images/home1/r6.jpg" alt="r6"></a>
                        </div>
                        <a href="" class="quick-view">Quick View</a>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="">Smartphone MTK6737 Quad Core.</a></div>
                        <span class="price price-dark">
                            <ins>$229.00</ins>
                        </span>
                        <div class="group-btn-hover style2">
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                            <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                            <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
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
</div> -->
@endsection
