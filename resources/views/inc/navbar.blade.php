


 <!-- HEADER -->
 <header class="site-header header-opt-1">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- hotline -->
            <ul class="nav-top-left krystal-nav" >
                <li><a href="{{ route('home') }}">Home</a></li>

                <li class="">
                    <a href="{{ route('products.more') }}" >
                        <span>Shop</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('contactus.index') }}" >
                        <span>Contact Us</span>
                    </a>
                </li>

            </ul><!-- hotline -->

            <!-- heder links -->
            <ul class="nav-top-right krystal-nav">

                @if(Auth::guard('web')->check())
                    @if(Auth::guard('web')->user()->is_seller)
                        <li><a class='nav-link' href="{{ Route('vendor.dashboard') }}"> Vendor Dashboard</a></li>
                    @endif
                    <li class="menu-item-has-children arrow">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('web')->user()->name }}
                        </a>
                        <div class="submenu parent-megamenu" aria-labelledby="navbarDropdown">

                            <ul>
                                <li class="menu-item"><a href="{{ route('cart.view')}}">View Cart</a></li>
                                <!-- <li class="menu-item"> <a href="{{route('home')}}" class=" dropdown-item">Dashboard</a> -->
                                    </li>
                                    <li class="menu-item"><a class=" dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                        Logout
                                    </a></li>

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
                        <a href="{{ route('home')}}"><img src="{{asset('files/logo.png')}}" alt="logo"></a>
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
                                     @foreach (App\Category::where('type', '=', 'products')->get() as $category)
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

                    {{-- <a class="wishlist-minicart" href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a> --}}



                </div>
            </div>
        </div>
    </div>

            <div class="header-menu-bar header-sticky">
                <div class="header-menu-nav menu-style-1">
                    <div class="container">
                        <div class="header-menu-nav-inner ">
                            <div class="header-menu header-menu-resize">
                                <ul class="header-nav krystal-nav">
                                    <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                                   
 
                                    @foreach(App\Category::where('parent_id', '=', 1)->get() as $category)
                                        @php 
                                            $arrow = count($category->childs) > 0 ? 'arrow' : '';
                                        @endphp
                                        <li class="menu-item-has-children {{$arrow}}">
                                            <a href="/products/cat/{{ $category->id }}">{{$category->title}}</a>
                                            <span class="toggle-submenu hidden-md"></span>
                                             @if(count($category->childs))
                                                <ul class="submenu parent-megamenu">
                                                    @foreach($category->childs as $child)
                                                        <li class="menu-item">
                                                            <a href="{{ route('product.by.category', [str_replace(' ', '-', $child->title)])}}" class="switcher-flag icon">{{$child->title}}</a>
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

