<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
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
        @yield('style')
    <script src="{{ asset('vendor/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    @yield('header')
    <main class="container mt-4">
        @yield('content')
    </main>


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

    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
            setTimeout(function() {
                $(".alert").alert('close');
            }, 10000);
    	});
    </script>
        <script src="{{ asset('vendor/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/js/wow.min.js') }}"></script>
        <script src="{{ asset('vendor/js/jquery-price-slider.js') }}"></script>
        <script src="{{ asset('vendor/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('vendor/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('vendor/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('vendor/js/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('vendor/js/counterup/waypoints.min.js') }}"></script>
        <script src="{{ asset('vendor/js/counterup/counterup-active.js') }}"></script>
        <script src="{{ asset('vendor/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('vendor/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
        <script src="{{ asset('vendor/js/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('vendor/js/metisMenu/metisMenu-active.js') }}"></script>
        <script src="{{ asset('vendor/js/morrisjs/raphael-min.js') }}"></script>
        <script src="{{ asset('vendor/js/morrisjs/morris.js') }}"></script>
        <script src="{{ asset('vendor/js/morrisjs/morris-active.js') }}"></script>
        <script src="{{ asset('vendor/js/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('vendor/js/sparkline/jquery.charts-sparkline.js') }}"></script>
        <script src="{{ asset('vendor/js/sparkline/sparkline-active.js') }}"></script>
        <script src="{{ asset('vendor/js/calendar/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/js/calendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('vendor/js/calendar/fullcalendar-active.js') }}"></script>
        <script src="{{ asset('vendor/js/plugins.js') }}"></script>
        <script src="{{ asset('vendor/js/main.js') }}"></script>
        <script>
            function getCookie(name) {
                // Split cookie string and get all individual name=value pairs in an array
                var cookieArr = document.cookie.split(";");

                // Loop through the array elements
                for(var i = 0; i < cookieArr.length; i++) {
                    var cookiePair = cookieArr[i].split("=");

                    /* Removing whitespace at the beginning of the cookie name
                    and compare it with the given string */
                    if(name == cookiePair[0].trim()) {
                        // Decode the cookie value and return
                        return decodeURIComponent(cookiePair[1]);
                    }
                }

                // Return null if not found
                return null;
            }
        </script>
        @yield('script')
</body>
</html>
