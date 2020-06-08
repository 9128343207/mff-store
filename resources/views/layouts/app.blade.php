<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">


    <style>
        /* these styles will animate bootstrap alerts. */
        .alert{
            z-index: 99;
            top: 60px;
            right:18px;
            min-width:30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }
        @keyframes slide {
            100% { top: 30px; }
        }
        @media screen and (max-width: 668px) {
            .alert{ /* center the alert on small screens */
                left: 10px;
                right: 10px;
            }
        }
        .desc {
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
            /* display: table-caption; */
        }
    </style>

    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
    <div class="wrapper">

        @yield('header')
        <main class="site-main site-login">
            @yield('content')
        </main>
    </div>
    <!-- FOOTER -->
    <footer class="site-footer footer-opt-2">
        <div class="footer-top full-width">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="newsletter-title">
                            <h3 class="h3-newsletter">Sign up to Newsletter</h3>
                            <span class="span-newsletter">Recevie $50 Coupon for fist Shopping.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter-form">
                            <form id="newsletter-validate-detail" class="form subscribe">
                                <div class="control">
                                    <input type="email" placeholder="Enter your email address" id="newsletter" name="email" class="input-subscribe">
                                    <button type="submit" title="Subscribe" class="btn subscribe">
                                        <span>Sign Up</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-column equal-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 equal-elem">
                        <h3 class="title-of-section">About Us</h3>
                        <div class="contacts">
                            <p class="contacts-info">Nullam tristique tortor nibh, in viverra libero sollicitudin ac. Suspendisse quis lacinia ipsum. Etiam scelerisque sit amet lectus quis lacinia. Sed condimentum auctor.</p>
                            <span class="contacts-info info-address ">218 Fifth Avenue, HeavenTower NewYork City</span>
                            <span class="contacts-info info-phone">(+68) 123 456 7890</span>
                            <span class="contacts-info info-support">Hot-Support@Krystal.com</span>
                            <div class="socials">
                                <a href="" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 equal-elem">
                        <div class="links">
                        <h3 class="title-of-section">My account</h3>
                        <ul>
                            <li><a href="">Sign In</a></li>
                            <li><a href="">View Cart</a></li>
                            <li><a href="">My Wishlist</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Track My Order</a></li>
                            <li><a href="{{ route('start-selling') }}">Start Selling</a></li>
                            <li><a href="">Help</a></li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 equal-elem">
                        <div class="links">
                        <h3 class="title-of-section">Information</h3>
                        <ul>
                            <li><a href="">Specials</a></li>
                            <li><a href="">New products</a></li>
                            <li><a href="">Best sellers</a></li>
                            <li><a href="">Our stores</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-elem">
                        <div class="links links-ins">
                            <h3 class="title-of-section">Instagram</h3>
                            <div class="content-ins">
                                <a href=""><img src="images/detail/ins1.jpg" alt="ins1"></a>
                                <a href=""><img src="images/detail/ins2.jpg" alt="ins2"></a>
                                <a href=""><img src="images/detail/ins3.jpg" alt="ins3"></a>
                                <a href=""><img src="images/detail/ins4.jpg" alt="ins4"></a>
                                <a href=""><img src="images/detail/ins5.jpg" alt="ins5"></a>
                                <a href=""><img src="images/detail/ins6.jpg" alt="ins6"></a>
                                <a href=""><img src="images/detail/ins7.jpg" alt="ins7"></a>
                                <a href=""><img src="images/detail/ins8.jpg" alt="ins8"></a>
                                <a href=""><img src="images/detail/ins9.jpg" alt="ins9"></a>
                                <a href=""><img src="images/detail/ins10.jpg" alt="ins10"></a>
                            </div>
                            <a href="" class="view-more">View More<!-- <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> --></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value='' id="cartData">
        <div class="copyright full-width">
             <div class="container">
                 <div class="copyright-right">
                    © Copyright 2017<span> Krystal</span>. All Rights Reserved.
                </div>
                <div class="pay-men">
                    <a href=""><img src="images/home1/pay1.jpg" alt="pay1"></a>
                    <a href=""><img src="images/home1/pay2.jpg" alt="pay2"></a>
                    <a href=""><img src="images/home1/pay3.jpg" alt="pay3"></a>
                    <a href=""><img src="images/home1/pay4.jpg" alt="pay4"></a>
                </div>
             </div>
        </div>
</footer><!-- end FOOTER -->
    <script src="{{asset('js/app.js')}}"></script>

    {{-- Success Alert --}}
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.actual.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.elevateZoom.min.js') }}"></script>
     <script src="{{ asset('js/fancybox/source/jquery.fancybox.pack.js') }}"></script>
     <script src="{{ asset('js/fancybox/source/helpers/jquery.fancybox-media.js') }}"></script>
     <script src="{{ asset('js/fancybox/source/helpers/jquery.fancybox-thumbs.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/function.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/Modernizr.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.plugin.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.countdown.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.shop.js') }}"></script>
     <script>

        $(document).ready(function(){
            $("#cart").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/add-to-cart',
                    data: $('#cart').serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('.alert').alert()
                        if (data == 1) {
                            $('.btn-add-to-cart').hide();
                            $('.btn-added').show();
                            $('body').append('<div class="alert alert-success">Added to cart</div>');
                        } else {
                            $('body').append('<div class="alert alert-warning">Product already added</div>');
                        }
                        setTimeout(function() {
                            $(".alert").alert('close');
                        }, 6000);
                    }
                });
            });
        });
        $(document).ready(function(){
            setTimeout(function(){
                getCart();
                var cartData = $('#cartData').val();
                cartBtnToggle(JSON.parse(cartData), item);
            },500); // milliseconds
            setTimeout(function() {
                $(".alert").alert('close');
            }, 6000);
    	});
            function getCart() {
                $.ajax({
                    type: "GET",
                    url: '/get-cart-items',
                    dataType: 'json', // added data type
                    success: function(data)
                    {
                        $('.counter-price').html('$'+data.cartTotal);
                        $('.total-price').html('$'+data.cartTotal);
                        $('.counter-number').html(data.count);
                        $('.in-counter').html(data.count);
                        $('#cartData').val(JSON.stringify(data));
                    }
                });
            }
            // function removeItem(e) {
            //     // console.log();exit;
            //     $.ajax({
            //         type: "POST",
            //         url: '/remove-cart-items',
            //         headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            //         data: {'id': e.getAttribute('data-id')}, // added data type
            //         success: function(data)
            //         {
            //             alert(data);
            //             //TODO if success then update cart items
            //         }
            //     });
            // }
            function cartBtnToggle(data, item) {
                if(data.productIds.includes(item.id)){
                    $('.btn-add-to-cart').hide();
                    $('.btn-added').show();
                } else {
                    $('.btn-add-to-cart').show();
                    $('.btn-added').hide();
                }
            }

            function populateItem(data){
               var table = $('#cart-item');
            }

            // TODO Populate cart data in mini cart container

            $(document).ready(function(){
                console.log($('.price_slider_amount.to'));
            });
            function addToCart(e){
                var l = $(e.productId).val();
                $.ajax({
                    type: "POST",
                    url: '/add-to-cart',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: $(e).serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('.alert').alert()
                        if (data == 1) {
                            $("[data-btn-id-add="+l+"]").hide();
                            $("[data-btn-id-added="+l+"]").show();
                            $('body').append('<div class="alert alert-success">Added to cart</div>');
                            getCart();
                        } else {
                            $('body').append('<div class="alert alert-warning">Product already added</div>');
                        }
                    }
                });
            }
    </script>
    <script type="text/javascript">


        $(document).ready(function(){
                setTimeout(function(){
                //TODO Add a loading animation in cart items div
                getCartList();
            },100);
    	});

        function getCartList() {
            $.ajax({
                    type: "get",
                    url: '/get-cart-items',
                    dataType: 'json',
                    success: function(data)
                    {
                        console.log(data);
                        $('#cart-item').empty();
                        data.items.forEach(renderCartItem);
                    }
                });
        }

        function renderCartItem(item) {

            html = '<tr class="cart-item">';
            html += '<td></td>'; //TODO ajax get image
            html += '<td class="tb-product"><div class="product-name"><a href="'+item.itemDetail.id+'">'+item.itemDetail.name+'</a></div></td>';
            html += '<td class="tb-price"><span class="price">$'+item.itemDetail.price+'</span></td>';
            html += '<td class="tb-qty"><div class="quantity"><div class="buttons-added"><input type="text" value="'+item.qty+'" data-item="'+item.itemDetail.id+'" id="qty" onchange="quantity(this)" title="Qty" class="input-text qty text" size="1"><a href="#" class="sign plus"><i class="fa fa-plus"></i></a><a href="#" class="sign minus"><i class="fa fa-minus"></i></a></div></div></td>';
            html += '<td class="tb-total"><span class="price">'+item.qty*item.itemDetail.price+'</span></td>'; //TODO calculate price according to quantity
            html += '<td class="tb-remove"><a href="cart/remove/'+item.itemDetail.id+'" data-id="" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></a></td>';
                $('#cart-item').append(html);
        }
    </script>

    @yield('script')
</body>
</html>
