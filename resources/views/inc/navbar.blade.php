{{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        @php
                            $header = App\Header::where('status', 1)->first();
                            
                        @endphp
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ $header->title }}
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
                @if(Auth::guard('web')->user()->is_seller)
                    <li><a class='nav-link' href="{{ Route('vendor.home') }}"> Vendor Dashboard</a></li>
                @endif
                    <li class="menu-item-has-children arrow">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('web')->user()->name }}
                        </a>
                        <div class="submenu parent-megamenu" aria-labelledby="navbarDropdown">
                            <a href="{{route('home')}}" class=" menu-item dropdown-item">Dashboard</a>
                            <a class="menu-item dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                Logout
                            </a>
                            <ul>
                            <li class="menu-item"><a href="{{ route('cart.view')}}">View Cart</a></li>
                                <li class="menu-item"><a href="">My Wishlist</a></li>
                                <li class="menu-item"><a href="">Contact us</a></li>
                                <li class="menu-item"><a href="">Track My Order</a></li>
                                <li class="menu-item"><a href="">Help</a></li>
                            </ul>
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
                <div class="col-md-8 nav-mind">

                    <!-- block search -->
                    <form method="post" id="search" action="{{route('product.search')}}">
                    @csrf 
                    <div class="block-search">
                        <div class="block-content">
                            <div class="categori-search  ">
                                <select data-placeholder="All Categories" class="chosen-select categori-search-option" name="cat">
                                    <option value="">All Categories</option>
                                    <!-- <optgroup label="- Electronics">
                                      <option>Batteries & Chargens</option>
                                      <option>Headphone & Headsets</option>
                                      <option>Mp3 Player & Acessories</option>
                                    </optgroup>
                                    <optgroup label="- Smartphone & Table">
                                      <option>Batteries & Chargens</option>
                                      <option>Headphone & Headsets</option>
                                      <option>Mp3 Player & Acessories</option>
                                    </optgroup>
                                    <optgroup label="- Electronics">
                                      <option>Batteries & Chargens</option>
                                      <option>Headphone & Headsets</option>
                                      <option>Mp3 Player & Acessories</option>
                                    </optgroup>
                                    <optgroup label="- Smartphone & Table">
                                      <option>Batteries & Chargens</option>
                                      <option>Headphone & Headsets</option>
                                      <option>Mp3 Player & Acessories</option>
                                    </optgroup> -->
                                     @foreach (App\Category::where('parent_id', 1)->get() as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                </select>
                               
                            </div>
                            <div class="form-search">
                                    <div class="box-group">
                                        <input type="text" class="form-control" placeholder="Searh entire store here..." name="keyword">
                                        <button class="btn btn-search" type="submit"><span>search</span></button>
                                    </div>
                            </div>
                        </div>
                    </div><!-- block search -->
                </form>
                </div>
                <div class="col-md-2 nav-right">

                    <!-- block mini cart -->

                    <span data-action="toggle-nav" class="menu-on-mobile hidden-md style2">
                        <span class="btn-open-mobile home-page">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="title-menu-mobile">Main menu</span>
                    </span>

                    <div class="block-minicart dropdown style2">



                        <a class="minicart" href="#">

                            <span class="counter qty">

                                <span class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>

                                <span class="counter-number">0</span>

                            </span>

                            <span class="counter-your-cart">

                                <span class="counter-label">Your Cart:</span>

                                <span class="counter-price">$00.00</span>

                            </span>

                        </a>

                        <div class="parent-megamenu">

                            <form>

                                <div class="minicart-content-wrapper" >

                                    <div class="subtitle">

                                        You have <span class="in-counter">2</span> item(s) in your cart

                                    </div>

                                    <div class="minicart-items-wrapper">

                                        <ol class="minicart-items">

                                            <li class="product-inner">

                                                <div class="product-thumb style1">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="images/home1/c1.jpg" alt="c1"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Xbox One S Halo Collection Bund</a></div>

                                                    <a href="#" class="remove"><i class="fa fa-times" aria-hidden="true"></i></a>

                                                    <span class="price price-dark">

                                                        <ins>$229.00</ins>

                                                    </span>

                                                </div>

                                            </li>

                                            <li class="product-inner">

                                                <div class="product-thumb style1">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="images/home1/c2.jpg" alt="c2"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Acer's Aspire S7 is a thin and portable...</a></div>
                                                    <a href="#" class="remove"><i class="fa fa-times" aria-hidden="true"></i></a>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

                                                    </span>

                                                </div>

                                            </li>

                                        </ol>

                                    </div>

                                    <div class="subtotal">

                                        <span class="label">Total :</span>

                                        <span class="total-price"></span>

                                    </div>

                                    <div class="actions">

                                    <a class="btn btn-viewcart" href="{{ route('cart.view') }}">View cart</a>

                                    <a class="btn btn-checkout" href="{{ route('checkout')}}">Checkout</a>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div><!-- block mini cart -->


                    <a href="" class="hidden-md search-hidden"><span class="pe-7s-search"></span></a>

                    <a class="wishlist-minicart" href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a>



                </div>
            </div>
        </div>
    </div><!-- header-content -->
    <!-- header-menu-bar -->
    <div class="header-menu-bar header-sticky">
        <div class="header-menu-nav menu-style-1">
            <div class="container">
                <div class="header-menu-nav-inner ">
                    <div class="header-menu header-menu-resize">
                        <ul class="header-nav krystal-nav">
                           <!--  <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                            <li class="menu-item-has-children arrow">
                                <a href="index.html">Cameras</a>

                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Tv & Audio</a>

                            </li>
                            <li class="menu-item-has-children arrow item-megamenu">
                                <a href="#">Laptop & Computer</a>

                            </li>
                            <li class="menu-item-has-children arrow item-megamenu">
                                <a href="#">Accessories</a>

                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Smartphone & Tablet</a>

                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Game & Consoles</a>

                            </li>
                            <li class="menu-item-has-children arrow">
                                <a href="#">Video Games & Consoles</a>

                            </li> -->
                            
                            @foreach(App\Category::where('parent_id', '=', 1)->get() as $category)
                            
                            <li class="menu-item-has-children arrow">
                                <a href="#">{{$category->title}}</a>
                                 @if(count($category->childs))
                                    <ul class="submenu parent-megamenu">
                                        @foreach($category->childs as $child)
                                            <li class="switcher-option">
                                                <a href="grid-product.html" class="switcher-flag icon">{{$child->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li> 
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header><!-- end HEADER -->

