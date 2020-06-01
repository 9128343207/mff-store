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
    </style>

    <title>{{config('app.name')}}</title>
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
                <span aria-hidden`="true">&times;</span>
            </button>
        </div>
    @endif

    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
	    setTimeout(function() {
	        $(".alert").alert('close');
	    }, 3000);
    	});
    </script>
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
     <script type="text/javascript" src="{{ asset('js/function.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/Modernizr.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.plugin.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.countdown.js') }}"></script>
</body>
</html>
