<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="">
                            <a class="" href="{{ Route('admin.dashboard')}}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                Dashboard
                            </a>

                        </li>
                        <li class="">
                            <a class="" href="{{ Route('admin.user.list')}}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                Users
                            </a>

                        </li>
                        <li class="">
                            <a class="" href="{{ Route('admin.store.list')}}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                Store
                            </a>

                        </li>
                        <li class="active">
                            <a class="has-arrow" href="index.html">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Products</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Dashboard v.1" href="{{ Route('vendor.product.all')}}"><span class="mini-sub-pro">All</span></a></li>
                            <li><a title="Dashboard v.2" href="{{ Route('vendor.product.listing') }}"><span class="mini-sub-pro">Add New</span></a></li>

                                <li><a title="Analytics" href="analytics.html"><span class="mini-sub-pro">Analytics</span></a></li>
                                <li><a title="Widgets" href="widgets.html"><span class="mini-sub-pro">Widgets</span></a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="index.html">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Payments</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Dashboard v.1" href="{{ Route('vendor.product.all')}}"><span class="mini-sub-pro">All</span></a></li>
                            <li><a title="Dashboard v.2" href="{{ Route('vendor.payment.methods') }}"><span class="mini-sub-pro">Methods</span></a></li>

                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Orders</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{ Route('admin.order.all')}}"><span class="mini-sub-pro">All</span></a></li>

                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Shipment</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{ Route('vendor.order.all')}}"><span class="mini-sub-pro">All</span></a></li>
                                <li><a title="Dashboard v.2" href="{{ Route('vendor.payment.methods') }}"><span class="mini-sub-pro">Methods</span></a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">CMS</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{ Route('admin.CMS.header')}}"><span class="mini-sub-pro">Header</span></a></li>
                                <li><a title="Dashboard v.2" href="{{ Route('admin.CMS.footer') }}"><span class="mini-sub-pro">Footer</span></a></li>
                                <li><a title="Dashboard v.3" href="{{route('admin.category')}}"><span class="mini-sub-pro">Menu</span></a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Preference</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href=""><span class="mini-sub-pro">Vendor</span></a></li>
                                <li><a title="Dashboard v.2" href="{{ Route('admin.CMS.footer') }}"><span class="mini-sub-pro">Footer</span></a></li>
                                <li><a title="Dashboard v.3" href="{{route('admin.category')}}"><span class="mini-sub-pro">Menu</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
