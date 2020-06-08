@extends('layouts.app')
@section('title')
    My Orders
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')
    <!-- MAIN -->
    
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="#">Home </a></li>
                <li class="active"><a href="#">Recent Orders</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                        
                    <form class="form-cart">
                        <div class="table-cart">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="tb-image"></th>
                                        <th class="tb-product">Product Name</th>
                                        <th class="tb-price">Unit Price</th>
                                        <th class="tb-qty">Qty</th>
                                        <th class="tb-total">Status</th>
                                        <th class="tb-remove"></th>
                                    </tr>
                                </thead>
                                <tbody id='cart-item'>
                                            {{-- //TODO LOOP THIS IN JAVASCRIPT --}}

                                </tbody>
                            </table>

                        </div>
                        <!-- <div class="cart-actions">
                            <a href="" type="submit" class="btn-continue">
                                <span>Continue Shopping</span>
                            </a>
                            <button type="submit" class="btn-clean" >
                                <span>Update Shopping Cart</span>
                            </button>
                            <a href="{{route('cart.clear')}}"  class="btn-update" >
                                <span>Clear Shopping Cart</span>
                            </a>
                        </div> -->
                    </form>
                    
                        <!-- <tr><td>No Items In Cart</td></tr> -->
                    
                </div>
                <div class="col-md-3 padding-left-5">
                    <div class="order-summary">
                        <!-- <h4 class="title-shopping-cart">Order Summary</h4>
                        <div class="checkout-element-content">
                            <span class="order-left">Subtotal:<span>$458.00</span></span>
                            <span class="order-left">Shipping:<span>Free Shipping</span></span>
                            <span class="order-left">Total:<span>$458.00</span></span>
                            <ul>
                                <li><label class="inline" ><input type="checkbox"><span class="input"></span>I have promo code</label></li>
                            </ul>
                        <button  type="submit" class="btn-checkout" >
                               <a href="{{ route('checkout')}}"> <span>Check Out</span></a>
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="block-recent-view">
                <div class="container">
                <div class="title-of-section">You may be also interested</div>
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
        </div>
        <div class="block-section-brand">
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
    </main><!-- end MAIN -->

@endsection

@section('script')
    <script>

        // function quantity(e){
        //     // console.log(e);
        //     var qnty = $(e).val();
        //         var citem = $(e).attr('data-item');
        //         var cdata = {qty: qnty, item:citem};
        //         $.ajax({
        //             type: "post",
        //             url: '/update-cart',
        //             headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        //             data: cdata,
        //             success: function(data)
        //             {
        //                 getCartList();
        //             }
        //         });
        // }

        $(document).ready(function(){
                setTimeout(function(){
                //TODO Add a loading animation in cart items div
                getOrderList();
            },100);
        });


        function getOrderList() {
            $.ajax({
                    type: "get",
                    url: '/get-ordered-items',
                    dataType: 'json',
                    success: function(data)
                    {
                        console.log(data);
                        $('#cart-item').empty();
                        data.forEach(renderOrderItem);
                    }
                });
        }

        function renderOrderItem(item) {
            console.log('sitm'+item.itemDetail.id)

            html = '<tr class="cart-item">';
            html += '<td></td>'; //TODO ajax get image
            html += '<td class="tb-product"><div class="product-name"><a href="'+item.itemDetail.id+'">'+item.itemDetail.name+'</a></div></td>';
            html += '<td class="tb-price"><span class="price">$'+item.itemDetail.price+'</span></td>';
            html += '<td class="tb-qty"><div class="quantity"><div class="buttons-added"><span class=" qty">'+item.orderDetail.qty+' </span></div></div></td>';
            // html += '<td class="tb-total"><span class="price">'+item.qty*item.itemDetail.price+'</span></td>'; //TODO calculate price according to quantity
            html += '<td class=""><span>'+item.orderDetail.status+'</span></a></td>';
            html += '</tr>';
                $('#cart-item').append(html);
        }
    </script>
@endsection
