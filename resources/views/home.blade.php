@extends('layouts.app')

@section('title')
    Home
@endsection

@section('header')
    @include('inc.navbar')
@endsection
@section('content')

<div class="block-section-1">
    <div class="main-slide slide-opt-1 full-width">
        <div class="owl-carousel nav-style1" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>

           {{--  @foreach ($products->Top3 as $product ) --}}
                <div class="item-slide item-slide-1" style="background-image: url('{{asset('files/banner02.png')}}');">
                   {{--   <div class="slide-desc slide-desc-1">
                   <div class="p-primary"  style="color:white;">{{ $product->name}}</div>
                        <p style="color:white;">{{ $product->s_desc}}</p>
                        <a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $product->name)])}}" class="btn-shop-now">Shop Now</a>
                    </div> --}}
                </div>
                <div class="item-slide item-slide-1" style="background-image: url('{{asset('files/banner01.png')}}');">
                    {{--<div class="slide-desc slide-desc-1">
                     <div class="p-primary"  style="color:white;">{{ $product->name}}</div>
                        <p style="color:white;">{{ $product->s_desc}}</p>
                        <a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $product->name)])}}" class="btn-shop-now">Shop Now</a>
                    </div> --}}
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>

@if (count($products->WeeklyDeals) >= 2) 
<div class="block-daily-deals style1">
    <div class="container">
        <div class="title-of-section">Weekly deals</div>
        <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":3},"992":{"items":2}}'>
            {{-- {{dd($products->WeeklyDeals)}} --}}
            @foreach ($products->WeeklyDeals as $deal)
                <div class="deal-of-day equal-elem">
                    <div class="product-thumb style1">
                        <div class="thumb-inner">
                        <a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $deal->name)])}}">

                            <!-- <img height="200" width="200" src="{{ url('storage/products/img/'.$deal->productPhoto[0]->filename)}}" alt="{{$deal->name}}"></a>
 -->

                            @if(isset($deal->productPhoto[0]->filename))
                                                                    @if(file_exists(url('storage/products/200/'.$deal->productPhoto[0]->filename)))
                                                                        <img height="200" width="200" src="{{ url('storage/products/200/'.$deal->productPhoto[0]->filename)}}" alt="{{$deal->name}}">
                                                                    @else
                                                                        <img height="200" width="200" src="{{ url('storage/products/img/'.$deal->productPhoto[0]->filename)}}" alt="{{$deal->name}}">
                                                                    @endif
                                                                @else 
                                                                        <img height="200" width="200" src="{{ url('files/v-17-512.png')}}" alt="{{$deal->name}}">
                                                                @endif

                        </div>
                    </div>
                    <div class="product-innfo">
                        <div class="product-name"><a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $deal->name)])}}">{{ $deal->name}}</a></div>
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
                                                            <a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $singleProduct->name)])}}">


                                                                
                                                                @if(isset($singleProduct->productPhoto[0]->filename))
                                                                    @if(file_exists(url('storage/products/200/'.$singleProduct->productPhoto[0]->filename)))
                                                                        <img height="200" width="200" src="{{ url('storage/products/200/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}">
                                                                    @else
                                                                        <img height="200" width="200" src="{{ url('storage/products/img/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}">
                                                                    @endif
                                                                @else 
                                                                        <img height="200" width="200" src="{{ url('files/v-17-512.png')}}" alt="{{$singleProduct->name}}">
                                                                @endif


                                                            </a>
                                                        </div>

                                                        <a href="" class="quick-view">Quick View</a>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $singleProduct->name)])}}">{{$singleProduct->name}}</a></div>
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
                                                                <a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $singleProduct->name)])}}">

                                                                    @if(isset($singleProduct->productPhoto[0]->filename))
                                                                    @if(file_exists(url('storage/products/200/'.$singleProduct->productPhoto[0]->filename)))
                                                                        <img height="200" width="200" src="{{ url('storage/products/200/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}">
                                                                    @else
                                                                        <img height="200" width="200" src="{{ url('storage/products/img/'.$singleProduct->productPhoto[0]->filename)}}" alt="{{$singleProduct->name}}">
                                                                    @endif
                                                                @else 
                                                                        <img height="200" width="200" src="{{ url('files/v-17-512.png')}}" alt="{{$singleProduct->name}}">
                                                                @endif


                                                                </a>
                                                            </div>

                                                            <a href="" class="quick-view">Quick View</a>
                                                        </div>
                                                        <div class="product-innfo">
                                                            <div class="product-name"><a href="{{ route('product.named.view', [ 'id' => str_replace(' ', '_', $singleProduct->name)])}}">{{$singleProduct->name}}</a></div>
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
<div class="block-section-brand">
    <div class="container">
        <h6 style="font-size: 12px;"><b>About Us:</b></h6>
        <p style="font-size:10.5px;">Industrial Supply Cart is a B2B online platform to meet the supply requirements of Industries like Oilfield Supplies, Electrical Supplies, Mechanical Supplies, Renewable, Chemicals and many more such industries or for that matter for any industrial product requirement we can help. </p>
        <p style="font-size:10.5px;">We also have a division, which is taking care of Engineering Services or Consultation, wherein any specific need or help which is beyond on the standard supply or buy and sell requirement, please do drop us an email to our support team to support you.</p>
        <p style="font-size:10.5px;">Our aim from this portal is to get every product available at most optimum price to everyone. It is a kind of UNIQUE portal dedicated to Industrial Products only. We are part of Industrial community, we know how how hard it is to run an operation if a missing small spare part or an urgent equipment could bring entire operation to stop. We want to dedicated this Portal to all those involved in Industrial sector, we want to help solve their problems.</p>
        <p style="font-size:10.5px;">Also, if you have any inventory which you did not use for too long, we want you to get liquidate your investment on this non-moving inventory, just take a picture of any inventory which you have, which is not being used and no plans to use in near future, post it on our portal, we will make sure you can liquidate and manage your operations better, do not worry if you need something urgently in future, you can find it on our portal, who knows the item you need in future is lying in your country or in your neighborhood, we are taking this initiative to all those in industrial sector to reach out to anything they need help in sourcing and sell something which they do not need. We do not call our selves only for new products, any used product or surplus or unsold product can be sold from our portal. </p>
        <p style="font-size:10.5px;">This portal will help bring buyers and sellers closers to sell anything from their yard to customer’s place without any difficulty, there are logistics partners connected as well, they will bring your bulk or big size equipment to your doors at ease, including fully covered insurance service. So that your purchase is safe, insured and reaches you on time, every time!! </p>
        <p style="font-size:10.5px;">We welcome all the Raw Material, Machine, Tools, Equipment, Spare Parts, Consumables or Miscellaneous Product suppliers from all over the world to join our online B2B platform to deal (buy or sell) your products Globally, we allow 100% transparency here, your request for the product will reach directly in Email Inbox of your supplier, we don't charge any commission here making industrialsupplycart.com world's first Truly free trading platform,</p>
        <p style="font-size:10.5px;">This initiative was started by a founder with over 20-years industrial experience in multiple industries and in multiple countries. We gained so much of experience and knowledge, and also, we realize it is very hard to get something in remote countries, this kind of platform near your place brings every product to your door step. </p>
        <p style="font-size:10.5px;">Our offices are in Singapore, Indonesia, United States, United Arab Emirates and India, we employee significant number of professionals to work in backend to keep industrialsupplycart.com functioning smoothly. </p><br>
        <h6 style="font-size: 12px;"><b>Oilfield Supplies: </b></h6>
        <p style="font-size:10.5px;">Our portal will help you get any kind of Oilfield Tool or Equipment easily, with our team’s experience of almost 2-decades, we have built a niche portal for the oilfield community. All key oilfield products like</p>
            <p style="font-size:10.5px;">Offshore Rigs, Onshore Rigs, Rig Equipment like Blow Out Preventer (BOP), Top Drive, Rotary Table, Mud Pumps, Drill Console, Draw-works, Winches, Mud Cooler </p>
            <p style="font-size:10.5px;">Drilling Tools like Drill Pipe, Heavy Weight Drill Pipes (HWDP), Drill Collars, Downhole tools, Bottom Hole Accessories (BHA), Stabilizer, Bit Subs, Cross Over Subs, Float Subs, Float Valves </p>
            <p style="font-size:10.5px;">Fishing Tools used in Oilfield industry like Fishing Jar, Jar Intensifier, Bumper Sub, Fishing Magnet, Junk Sub, Casing Spear, Casing Scrapple, Casing Cutter so on</p>
            <p style="font-size:10.5px;">Handling Tools like Power Tongs, Manual Tongs, Slips, Spiders, Elevators, Dies, Inserts so on. </p>
            <p style="font-size:10.5px;">Wellheads and accessories like X-mas tree, Gate Valves, Ball Valves, Choke Valves, Plug Valves.</p>
            <p style="font-size:10.5px;">Drilling Software, Safety Equipment and Systems, Spill Control, Safety Mats, Escape Systems, Man Rider Winches, Wire Ropes, Slings, so on </p>
            <p style="font-size:10.5px;">Hope this portal could help your next oilfield equipment, spare part or a consumables, there are many vendors who have stock, but do not know where to sell, please come here, we are open, and it is 100% for free, please post your products and improve your operational efficiency and profitability.</p><br>
            <h6 style="font-size: 12px;"><b>Electrical:     </b></h6>
            <p style="font-size:10.5px;">Electrical products are other key equipment and products are used in all Industries. Products vary from huge equipment like Transformers, Sub-Stations, Panel Boards, Switchgears, Power Supply, Power Transmission Products, Industrial Lighting, Industrial Cables, Wires, Switches, LED Lighting for Industrial or Residential purposes and many more products we have.</p>
            <p style="font-size:10.5px;">We have qualified Electrical engineers in our team to help the community on our portal to get the best deal, and we are able to provide our assistance whenever required. So come get your next electrical product from our portal, we are sure, you will not regret it.</p><br>
            <h6><b>Mechanical:  </b></h6>
            <p style="font-size:10.5px;">Mechanical, itself brings a heavy image in our mind with tons of heavy stuff to go into this field of engineering. Just imagine sometime how difficult it will be to get such huge equipment at reasonable pricing and at considerable shorter deliver times, sometimes it is hard to meet these two, if you meet these two you may end up with a wrong product or product of inferior quality. </p>
            <p style="font-size:10.5px;">Industrial Supply Cart helps the industries which require these mechanical equipment’ at ease and help in getting the right equipment under right budget. If anyone needed a used equipment in working condition, this portal is the choice to deal in, if you have any used engine or truck or any other product you want to sell and buy something else which you need urgently, you can liquidate your cost, and make your operation run smoothly by comping on to our portal often. </p>
            <p style="font-size:10.5px;">Our expertise include, most of the key industrial equipment which are related with the mechanical field, either it is an important CNC Machine, Manual Lathe Machine, Machine for Fabrication, Process Industry Equipment, Chemical Process Plant Machinery, Sugar Industry Machinery, Industrial set-up for other process and manufacturing industries. </p>
            <p style="font-size:10.5px;">Even if you do not find something listed read to sell, do drop us an email, our team of engineers will get the right product and refer it to you, so that your sourcing needs are met, most importantly under your budget, quality and delivery terms.   </p>
            <p style="font-size:10.5px;">Hope you find your next mechanical equipment, machine, tool or replacement product on our portal. </p><br>
            <h6 style="font-size: 12px;"><b>Renewable: </b></h6>
            <p style="font-size:10.5px;">World is changing sooner towards renewable sources of energies, impact of climate change is going to huge and our future generations are at risk. </p>
            <p style="font-size:10.5px;">Industrial Supply Cart has taken the initiative to keep Renewable energy as one of our key sector to deal, and make this world a better place.</p>
            <p style="font-size:10.5px;">Our portfolio in renewable energy has multiple areas Wind Power Plants, Solar Energy Plants, Geothermal Power Plants and many other such initiatives wherein we help companies to get towards green energy. </p>
            <p style="font-size:10.5px;">We have team of qualified engineers, we can help provide consulting like EPC company into these projects to get the complete end-to-end solution. </p>

            <p style="font-size:10.5px;">If you make a equipment or product for any green initiatives or renewable energies, please do list them in this category, if you do not find something which you are looking for, just buzz us, we will be glad to support to find the right matching product and company and get connected, so that you can deal directly on any such needs. We will always be there to support in transactions like translation jobs, communicating, or local inspection or verification services across the globe, we add our credibility and value in every product or transaction we help, to make sure you get the best service. </p><br>
            <h6 style="font-size: 12px;"><b>Chemicals: </b></h6>
            <p style="font-size:10.5px;">Covid-19 has taught us again, how important are all those medicines and medical equipment. Chemicals play a vital role to keep our lives moving forward, not only as medicines/drugs from the Pharamceuticals Industry, but also all those chemicals used in the Process Plants, say for making paper, or chemicals used in food industry. All these key industrial requirement of chemicals, has made us consider as one of our key industrial category. </p>
            <p style="font-size:10.5px;">Industrial Supply Cart has few Chemical Engineers spread across the globe, wherein they keep adding value to our valuable customers to get the right chemical product for their requirement. </p>
            <p style="font-size:10.5px;">Whether these Chemicals are for Water Treatment Plants, Process Plants, Paper and Pulp Factories, Cement Factories, Petrochemical Plants, Sugar Plants, Palm Oil Refining, Crude Oil Refining, Pharmaceuticals APIs or Active Pharma Ingredients are the products used in Pharma Industry, we have team of Engineers based in multiple locations wherein these industries are considered niche and we bring that expertise and products to your door steps. </p>
            <p style="font-size:10.5px;">Please shop if you need any chemical on our portal, if you have something in your yard which may expire soon, please do post on our portal, we will get a value for it, without getting it thrown away, however, we will make sure, we add value to make sure every Chemical product dealt on our portal meets the requirements of the industry, safety, regulator requirement. However, we do invite every one in our community on this portal to do your own due diligence before you start any transaction, if you require our help in any transaction, do not worry, just send us an email to our support team, we will be there in no time to help you deal smoothly. </p><br>
            <h6 style="font-size: 12px;"><b>100% Business Transparency Policy  </b></h6>
            <p style="font-size:10.5px;">As per the industrial supply cart 100% Business Transparency Policy we will allow the seller to quote price for buyers and send it to their email inbox directly and the industrial supply cart website acting as a B2B eCommerce platform to connect those who want to find the best product in best price and those who want to sell their products locally and internationally, as per this policy we will not charge you anything for using our online B2B platform, and we don't own or manufacture any product available on our B2B eCommerce site, every product here is either manufacture by new and local manufacturer or manufactured by major industries and sold by retailers to a global audience.</p><br>
            <h6 style="font-size: 12px;"><b>Our Value Addition!! </b></h6>
            <p style="font-size:10.5px;">Our team will get involved when requirement by our community on this portal to help in inspection or verification of the products offered, to confirm quality, life, condition and compatibility or any other requirement required by the buyer, so that Industrial Supply Cart team could help in seamless and smooth transaction and also to make sure value for money. </p>
            <p style="font-size:10.5px;">We do not ask for any transfers to our accounts, sellers and buyers can deal directly, the goal of this portal is to bring all these communities together, if any value added services needed during the process, we will come into picture to help provide that niche service which the seller may not be able to provide or a buyer need additional verification from the third party which can be coordinated by the Industrial Supply Cart team. </p>
            <p style="font-size:10.5px;">We follow 100% transparency business policy, here a buyers request for quote goes directly into the inbox of sellers email without any intervention of industrial supply cart, 100% transparency business policy allow us to be the most trusted online B2B eCommerce platform without any Infringement to your privacy policy. </p>
            <p style="font-size:10.5px;"><b>-let us connect online to meet the global supply needs-  </b></p>
    </div>
</div>
@endsection
