<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/educate-custon-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/metisMenu/metisMenu-vertical.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/calendar/fullcalendar.print.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/responsive.css') }}">
        <!-- modernizr JS
            ============================================ -->
        <script src="{{ asset('vendor/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
        <main class="container mt-4">
                @yield('content')
            </main>

    <div class="text-center login-footer">
        <!-- <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p> -->
    </div>
</div>
</div>
<!-- jquery
    ============================================ -->
    <script src="{{ asset('vendor/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('vendor/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('vendor/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('vendor/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('vendor/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('vendor/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('vendor/js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('vendor/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('vendor/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('vendor/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('vendor/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ asset('vendor/js/morrisjs/raphael-min.js') }}"></script>
    <script src="{{ asset('vendor/js/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('vendor/js/morrisjs/morris-active.js') }}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ asset('vendor/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('vendor/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ asset('vendor/js/sparkline/sparkline-active.js') }}"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{ asset('vendor/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('vendor/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('vendor/js/plugins.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('vendor/js/main.js') }}"></script>
    <!-- tawk chat JS
        ============================================ -->
    {{-- <script src="{{ asset('vendor/js/tawk-chat.js') }}"></script> --}}
</body>

</html>
