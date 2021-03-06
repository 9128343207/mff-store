<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cookiealert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174594796-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

     

      gtag('config', 'UA-174594796-2');
    </script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5H3G8N');</script>
<!-- End Google Tag Manager -->

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

       /* #popup-newsletter {
            display: none;
        }*/
    </style>
    <script type="text/javascript">
         // $('#popup-newsletter').modal('hide');
    </script>

    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5H3G8N"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    @php
        $accept_payment = 1;
    @endphp
    <div class="wrapper">

        @yield('header')
        <main class="site-main site-login">
            <div class="modal" id="popup-newsletter" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span></button>
                        <div class="block-newletter-popup">
                            <div class="block-content">
                                <div id="msg"></div>
                                <p class="text-popup-primary">Get New Products <br>In your inbox</p>
                                <p class="text-des">Sign Up for newsletter</p>
                                <!-- <p class="text-italic">minimum purchase $100.00 (Without Tax)</p> -->
                                <p class="text-your-email">Enter your email below</p>
                                <div class="newsletter-form">
                                    <form id="newsletter-validate-detail" class="form subscribe">
                                        @csrf
                                        <div class="control">
                                            <input type="email" id="newsletter" placeholder="Enter your email address..." name="email" class="input-subscribe">
                                            <button type="submit" title="Subscribe" class="btn subscribe">
                                                <span>Subscribes</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <ul class="checkbox-popup">
                            <li><label class="inline" ><input type="checkbox"><span class="input"></span>Don’t show this popup again</label></li>
                        </ul>                   
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    <!-- FOOTER -->
    <footer class="site-footer footer-opt-2">
        <div class="footer-top full-width">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div class="newsletter-title">
                            <h3 class="h3-newsletter">Sign up to Newsletter</h3>
                            <span class="span-newsletter">Recevie $50 Coupon for fist Shopping.</span>
                        </div> --}}
                    </div>
                    {{-- <div class="col-md-6">
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
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="footer-column equal-container">
            <div class="container">
                <div class="row">
                    @php
                            $footer = App\Footer::where('status', 1)->first();

                        @endphp
                    {{--<div class="col-md-6 col-sm-6 equal-elem">
                       <h3 class="title-of-section" style="color: white;">About Us</h3>
                        <div class="contacts">
                            <p class="contacts-info">{{ $footer->about}}</p>
                            <span class="contacts-info info-address ">{{ $footer->address}}</span>
                            <span class="contacts-info info-phone">{{ $footer->support_number}}</span>
                            <span class="contacts-info info-support">{{ $footer->support_mail}}</span>
                            <div class="socials">
                                <a href="" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                <a href="" class="social"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>--}}
                    <div class="col-md-4 col-sm-4 equal-elem">
                        <div class="links">
                        <h3 class="title-of-section" style="color: white;">My account</h3>
                        <ul>
                            @if(!Auth::guard('web')->check())
                                <li><a href="{{route('login')}}">Sign In</a></li>
                            @endif
                            <li><a href="{{route('cart.view')}}">View Cart</a></li>
                            {{-- <li><a href="">Terms & Conditions</a></li> --}}
                            {{-- <li><a href="">Contact us</a></li> --}}
                            <!-- <li><a href="{{ route('ticket.create')}}">support</a></li> -->
                            <!-- <li><a href="{{route('myorders')}}">Track My Order</a></li> -->
                            <li><a href="{{ route('start-selling') }}">Start Selling</a></li>
                            {{-- <li><a href="">Help</a></li> --}}
                        </ul>
                        </div>
                    </div>
                     <div class="col-md-4 col-sm-4 equal-elem">
                        <div class="links">
                                <h3 class="title-of-section" style="color: white;">Information</h3>
                                <ul>
                                    <!-- <li><a href="">Delivery information</a></li> -->
                                    <li><a href="{{route('general.privacy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('general.terms')}}">Terms & Conditions</a></li>
                                    <li><a href="{{route('general.disc')}}">Disclaimer</a></li>
                                    <li><a href="{{route('contactus.index')}}">Contact us</a></li>
                                    <!-- <li><a href="">Sitemap</a></li> -->
                                </ul>
                                </div>
                    </div> 
                   <div class="col-md-4 col-sm-4 equal-elem">
                        <div class="links links-ins">
                            <h3 class="title-of-section" style="color:white;">Created and Owned by </h3>
                            <div class="content-ins">
                                
                                <p><b>MFF International Pte Ltd., </b></p>
                                <p>1 Bukit Batok Crescent, #06-18 WCEGA Plaza, </p>
                                <p>Singapore 658064 </p>
                                <p>Tel: +6566941572</p>
                                <a style="color:white;" href="https://mff-intl.com">mff-intl.com</a>
                                <!-- <a style="color:white;" href="mailto:support@energi-adidaya.com">support@energi-adidaya.com</a> -->
                               
                            </div>
                            
                            <!-- <a href="" class="view-more">View More<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> -->
                        </div>
                    </div> 
                </div><hr><br>
                <div class="row">
                    <h3 class="title-of-section" style="color: white;">Managed by </h3>
                    <div class="col-sm-3 col-lg-3">
                        <p><b>In Indonesia</b></p>
                        <p>PT Energi Adidaya Nusantara</p>
                        <p>WISM KDS,2nd Floor, Unit #202,JI Warung Jatibarat No 6b Jakarata</p>
                        <p>Selatan 12740,Indonesia.</p>
                        <p>Tel: +62217995734</p>
                        <p>Mail: sales@energi-adidaya.com</p>
                        <a style="color:white;" href="https://energi-adidaya.com">energi-adidaya.com</a>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <p><b>In India</b></p>
                        <p>Osiltec Consulting Private Ltd </p>
                        <p>6-3-652/D/20 Dhruvatara Complex Somajiguda Main Of Panjagutta,Near Errum Manzil Metro Station,</p>
                        <p>Hyderabad, 500082, Telangana, India</p>
                        <p>Tel: +914048555141(India)</p>
                        <p>Mail: info@osiltec.com</p>
                        <a style="color:white;" href="https://osiltec.com">osiltec.com</a>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <p><b>In UAE</b></p>
                        <p>VMV Solutions LLC </p>
                        <p>Sharjah Media City, Sharajah, UAE.</p>
                        <p>Tel:  +(971) 55 8853939</p>
                        <p>Mail:  Sales@vmv-Solutions.com</p>
                        <a style="color:white;" href="https://vmv-solutions.com">vmv-solutions.com</a>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <p><b>Rest of the World </b></p>
                        <p>MFF International Pte Ltd </p>
                        <p>1 BUKIT BATOK CRESCENT, #06-18 WCEGA PLAZA SINGAPORE 658064</p>
                        <p>Tel: +6566941572</p>
                        <p>Mail: info@mff-intl.com</p>
                        <a style="color:white;" href="https://mff-intl.com">mff-intl.com</a>
                    </div>
                </div><hr><br>
                <div class="row">
                    <div class="col">
                        <div class="links">
                                    <h3 class="title-of-section" style="color: white;">Disclaimer: </h3>
                                    <div class="content-ins" style="font-size: 12px">
            All brands mentioned on this website we do not hold any trademark rights. This is platform for buying and selling. Please verify the credentials of sellers and buyer before doing any transactions. By agreeing to use our platform you will do due diligence for every transaction and Industrialsupplycart cannot be held responsible and you agree to fully indemnify is from any loss or issues arising from any transactions or communications.</div>
                                    </div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value='' id="cartData">
        <div class="copyright full-width">
             <div class="container">
                 <!-- <div class="copyright-right">
                    © Copyright {{now()->format('Y')}}<span> <a href="https://osiltec.com">Osiltec</a></span>. All Rights Reserved.
                </div> -->
               {{-- <div class="pay-men">
                    <a href=""><img src="images/home1/pay1.jpg" alt="pay1"></a>
                    <a href=""><img src="images/home1/pay2.jpg" alt="pay2"></a>
                    <a href=""><img src="images/home1/pay3.jpg" alt="pay3"></a>
                    <a href=""><img src="images/home1/pay4.jpg" alt="pay4"></a>
                </div> --}}
             </div>
        </div>
</footer><!-- end FOOTER -->


<div class=" text-center cookiealert" role="">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <!-- <a href="https://cookiesandyou.com/" target="_blank">Learn more</a> -->

    <button type="button" class="btn btn-primary btn-sm acceptcookies">
        I agree
    </button>
</div>


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
     <script type="text/javascript" src="{{ asset('js/cookiealert.js') }}"></script>
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


            $("#newsletter-validate-detail").submit(function(e){
                e.preventDefault();
                // alert('submitted');
                $.ajax({
                    type: "POST",
                    url: '/add-to-newleter',
                    data: $('#newsletter-validate-detail').serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        
                        var msg = '<div class="alert alert-success" role="alert">';
                            msg += 'Your email is registered with us!';
                            msg += '</div>';
                        $('#msg').html(msg);
                        
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
    <style type="text/css">
        
    </style>
    <script type="text/javascript">

       
        
        function setCookie(cname, cvalue, exdays) {
          var d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          var expires = "expires="+d.toUTCString();
          document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
          var name = cname + "=";
          var ca = document.cookie.split(';');
          for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
          }
          return "";
        }

        var cookie = getCookie('shown');
        // alert(cookie);
        if (!cookie) {
          showPopup();
        }

        function showPopup() {
          setCookie('shown', 'true', 365);
          $('#popup-newsletter').modal('show');
        }
    </script>
</body>
</html>
