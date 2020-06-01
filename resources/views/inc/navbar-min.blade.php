{{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @foreach(App\Menu::orderBy('order','asc')->get() as $menuItem)

                @if( $menuItem->parent_id == 0 )
                    <li class="nav-item dropdown" {{ $menuItem->url ? '' : "class=dropdown" }}>
                    <a id="navbarDropdown" class="nav-link {{ $menuItem->children->isEmpty() ? '' : "dropdown-toggle" }}" href="{{ $menuItem->children->isEmpty() ? $menuItem->url : "#" }}"
                       {{ $menuItem->children->isEmpty()
                            ? ''
                            : "data-toggle=dropdown role=button aria-expanded=false" }} >
                        {{ $menuItem->title }}
                    </a>
                @endif

                @if( ! $menuItem->children->isEmpty() )
                    <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="navbarDropdown">
                    @foreach($menuItem->children as $subMenuItem)
                        <a class="dropdown-item" href="{{ $subMenuItem->url }}">{{ $subMenuItem->title }}</a>
                    @endforeach
                    </div>
                @endif
                </li>

                @endforeach

                {{-- @if(Auth::guard('web')->user()->is_seller)
                    <li><a class='nav-link' href="{{ Route('vendor.home') }}"> Vendor Dashboard</a></li>
                @endif --}}
                {{-- @if(Auth::guard('web')->check())
                <li><a class='nav-link' href="{{ Route('vendor.home') }}"> Vendor Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('home')}}" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
                @if(Auth::guard('vendor')->check())
                    <li class="nav-item dropdown">
                        <a id="vendorDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('vendor')->user()->name }} (vendor) <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                            <a href="{{route('vendor.home')}}" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                Logout
                            </a>
                            <form id="admin-logout-form" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav> --}}



 <!-- HEADER -->
 <header class="site-header header-opt-1">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- hotline -->
            <ul class="nav-top-left krystal-nav" >
                <li><a href="index.html">Home</a></li>

                <li class="menu-item-has-children ">
                    <a href="grid-product.html" class="dropdown-toggle">
                        <span>Shop</span><i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="submenu parent-megamenu">
                        <li class="switcher-option">
                            <a href="grid-product.html" class="switcher-flag icon">Grid Product</a>
                        </li>
                        <li class="switcher-option">
                            <a href="grid-product-right.html" class="switcher-flag icon">Grid Product Right</a>
                        </li>
                        <li class="switcher-option">
                            <a href="list-product.html" class="switcher-flag icon">List Product</a>
                        </li>
                        <li class="switcher-option">
                            <a href="list-product-right.html" class="switcher-flag icon">List Product Right</a>
                        </li>
                        <li class="switcher-option">
                            <a href="detail.html" class="switcher-flag icon">Detail Product</a>
                        </li>
                    </ul>
                </li>

                <li><a href="contact-us.html">Contact Us</a></li>
            </ul><!-- hotline -->

            <!-- heder links -->
            <ul class="nav-top-right krystal-nav">
                <li ><a href="">Newsletter</a></li>
                <li class="menu-item-has-children"><a href="" class="dropdown-toggle"><img src="images/home1/l1.jpg" alt="flag">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu parent-megamenu">
                        <li class="switcher-option">
                            <a href="" class="flag"><img src="images/home1/l1.jpg" alt="flag">English</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="flag"><img src="images/home1/l2.jpg" alt="flag">Hungary</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="flag"><img src="images/home1/l3.jpg" alt="flag">German</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="flag"><img src="images/home1/l4.jpg" alt="flag">French</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="flag"><img src="images/home1/l5.jpg" alt="flag">Canada</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#" class="dropdown-toggle">
                        <span>Dollar (US)</span><i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="submenu parent-megamenu">
                        <li class="switcher-option">
                            <a href="" class="switcher-flag icon">Pound (GBP)</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="switcher-flag icon">Euro (EUR)</a>
                        </li>
                        <li class="switcher-option">
                            <a href="" class="switcher-flag icon">Dollar (USD)</a>
                        </li>
                    </ul>
                </li>

                @if(Auth::guard('web')->check())
                <li><a class='nav-link' href="{{ Route('vendor.home') }}"> Vendor Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('home')}}" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul><!-- heder links -->

        </div>
    </div> <!-- header-top -->

    <!-- header-content -->
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 nav-left">
                    <!-- logo -->
                    <strong class="logo">
                        <a href=""><img src="images/home1/logo.jpg" alt="logo"></a>
                    </strong><!-- logo -->
                </div>

            </div>
        </div>
    </div><!-- header-content -->
    <!-- header-menu-bar -->
    {{-- <div class="header-menu-bar header-sticky">
        <div class="header-menu-nav menu-style-1">
            <div class="container">
                <div class="header-menu-nav-inner ">
                    <div class="header-menu header-menu-resize">
                        <ul class="header-nav krystal-nav">
                            <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                            <li class="menu-item-has-children arrow">
                                <a href="index.html">Cameras</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <ul class="submenu parent-megamenu">
                                    <li class="menu-item">
                                        <a href="index1.html">Home 1</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="index2.html">Home 2</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="index3.html">Home 3</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="index4.html">Home 4</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="index5.html">Home 5</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Tv & Audio</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <ul class="submenu parent-megamenu">
                                    <li class="menu-item">
                                        <a href="grid-product.html">Grid Product</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="list-product.html">List Product</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="list-product-right.html">List Product Right</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="grid-product-right.html">Grid Product Right</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="detail.html">Detail Product</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children arrow item-megamenu">
                                <a href="#">Laptop & Computer</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <div class="submenu parent-megamenu megamenu">
                                    <div class="row">
                                        <div class="submenu-banner submenu-banner-menu-1">
                                            <div class="col-md-4">
                                                <div class="dropdown-menu-info">
                                                    <h6 class="dropdown-menu-title">Laptop & computers</h6>
                                                    <div class="dropdown-menu-content">
                                                        <ul class="menu">
                                                            <li class="menu-item"><a href="#">Laptops, Desktops & Monitors</a></li>
                                                            <li class="menu-item"><a href="#">Printers & Ink</a></li>
                                                            <li class="menu-item"><a href="#">Computer Accessories</a></li>
                                                            <li class="menu-item"><a href="#">Software</a></li>
                                                            <li class="menu-item"><a href="#">Macbook</a></li>
                                                            <li class="menu-item"><a href="#">Macbook Air</a></li>
                                                            <li class="menu-item"><a href="#">Laptop Pro</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="dropdown-menu-info">
                                                    <h6 class="dropdown-menu-title">Accessories</h6>
                                                    <div class="dropdown-menu-content">
                                                        <ul class="menu">
                                                            <li class="menu-item"><a href="#">Accessories</a></li>
                                                            <li class="menu-item"><a href="#">Phone Batteries</a></li>
                                                            <li class="menu-item"><a href="#">Phone Charger</a></li>
                                                            <li class="menu-item"><a href="#">Phone Screen</a></li>
                                                            <li class="menu-item"><a href="#">Head Set</a></li>
                                                            <li class="menu-item"><a href="#">Software</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children arrow item-megamenu">
                                <a href="#">Accessories</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <div class="submenu parent-megamenu megamenu">
                                    <div class="row">
                                        <div class="submenu-banner submenu-banner-menu-2">
                                            <div class="col-md-3">
                                                <div class="dropdown-menu-info">
                                                    <h6 class="dropdown-menu-title">Laptop & computers</h6>
                                                    <div class="dropdown-menu-content">
                                                        <ul class="menu">
                                                            <li class="menu-item"><a href="#">Laptops, Desktops & Monitors</a></li>
                                                            <li class="menu-item"><a href="#">Printers & Ink</a></li>
                                                            <li class="menu-item"><a href="#">Computer Accessories</a></li>
                                                            <li class="menu-item"><a href="#">Software</a></li>
                                                            <li class="menu-item"><a href="#">Macbook</a></li>
                                                            <li class="menu-item"><a href="#">Macbook Air</a></li>
                                                            <li class="menu-item"><a href="#">Laptop Pro</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown-menu-info">
                                                    <h6 class="dropdown-menu-title">Accessories</h6>
                                                    <div class="dropdown-menu-content">
                                                        <ul class="menu">
                                                            <li class="menu-item"><a href="#">Accessories</a></li>
                                                            <li class="menu-item"><a href="#">Phone Batteries</a></li>
                                                            <li class="menu-item"><a href="#">Phone Charger</a></li>
                                                            <li class="menu-item"><a href="#">Phone Screen</a></li>
                                                            <li class="menu-item"><a href="#">Head Set</a></li>
                                                            <li class="menu-item"><a href="#">Software</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown-menu-info">
                                                    <h6 class="dropdown-menu-title">Accessories</h6>
                                                    <div class="dropdown-menu-content">
                                                        <ul class="menu">
                                                            <li class="menu-item"><a href="#">Accessories</a></li>
                                                            <li class="menu-item"><a href="#">Phone Batteries</a></li>
                                                            <li class="menu-item"><a href="#">Phone Charger</a></li>
                                                            <li class="menu-item"><a href="#">Phone Screen</a></li>
                                                            <li class="menu-item"><a href="#">Head Set</a></li>
                                                            <li class="menu-item"><a href="#">Software</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown-menu-info">
                                                    <div class="dropdown-menu-content">
                                                        <!-- <h4 class="info-big">Save<span>Up<br>To</span> $100</h4>
                                                        <span class="info-small">on a new Playtaysion 4 Consoles When you sign up.</span> -->
                                                        <a href="" class="shop-now">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Smartphone & Tablet</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <ul class="submenu parent-megamenu">
                                    <li class="menu-item">
                                        <a href="checkout.html">Checkout</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="shopping-cart.html">Shopping Cart</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Game & Consoles</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <ul class="submenu parent-megamenu">
                                    <li class="menu-item">
                                        <a href="blog-grid.html">Blog Grid</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="blog-list.html">Blog List</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="blog-single.html">Blog Single</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Video Games & Consoles</a>
                                <span class="toggle-submenu hidden-md"></span>
                                <ul class="submenu parent-megamenu">
                                    <li class="menu-item">
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="login.html">Login</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header><!-- end HEADER --> --}}

