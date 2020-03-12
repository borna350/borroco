<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image">
                        <a href="#">
                            @if( auth()->guard('admin')->user()->avatar)
                                <img src="{{ auth()->guard('admin')->user()->avatar }}" alt="User">
                            @else
                                <img src="{{ asset('admin') }}/avatar.png" alt="User">
                            @endif
                        </a>
                    </div>
                    <div class="detail">
                        <h4>{{ auth()->guard('admin')->user()->name }}</h4>
                        @if(auth()->guard('admin')->user()->role == 'super_admin')
                            <small>Super Admin</small>
                        @elseif(auth()->guard('admin')->user()->role == 'admin')
                            <small>Admin (Manager)</small>
                        @else
                            <small>Craftsman</small>
                        @endif
                    </div>
                    <a href="#" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="#" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="#" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="#" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="{{ route('admin.logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                    <form id="logout-form" action="{!! url('admin/logout') !!}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="header">MAIN</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active':'' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>

            <li class="header">PRODUCTS</li>
            <li class="{{ Request::is('admin/category*') || Request::is('admin/subcategory*') || Request::is('admin/product*') || Request::is('admin/material*') || Request::is('admin/wishlist*') || Request::is('admin/order*') ? 'active open':'' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Products</span> </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('admin/material*') ? 'active':'' }}"><a href="{{ route('material.index') }}">Materials</a></li>
                    <li class="{{ Request::is('admin/category*') ? 'active':'' }}"><a href="{{ route('category.index') }}">Categories</a></li>
                    <li class="{{ Request::is('admin/subcategory*') ? 'active':'' }}"><a href="{{ route('subcategory.index') }}">Sub Categories</a></li>
                    <li class="{{ Request::is('admin/product*') ? 'active':'' }}"><a href="{{ route('product.index') }}">Product</a></li>
                    <li class="{{ Request::is('admin/wishlist*') ? 'active':'' }}"><a href="{{ route('wishlist.index') }}">Wish List</a></li>
                    <li class="{{ Request::is('admin/order*') ? 'active':'' }}"><a href="{{ route('order.index') }}">Order List</a></li>
                </ul>
            </li>

            <li class="header">Admin Area</li>
            <li class="{{ Request::is('admin/administrator*') || Request::is('admin/artisan-request*')  ? 'active open':'' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-list"></i><span>Admin & Role</span> </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('admin/administrator*') ? 'active':'' }}"><a href="{{ route('administrator.index') }}">Administrators</a></li>
                    <li class="{{ Request::is('admin/artisan-request') ? 'active':'' }}"><a href="{{ route('artisan-request') }}">Artisan Request</a></li>
                </ul>
            </li>
            <li class="header">About Area</li>
            <li class="{{ Request::is('admin/team*') || Request::is('admin/follow-us*') || Request::is('admin/about*')  || Request::is('admin/customer-support*') ? 'active open':'' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Abouts</span> </a>
                <ul class="ml-menu">
                <li class="{{ Request::is('admin/about*') ? 'active':'' }}"><a href="{{route('about.index')}}">About</a></li>
                <li class="{{ Request::is('admin/follow-us*') ? 'active':'' }}"><a href="{{route('follow-us.index')}}">Follow Us</a></li>
                <li class="{{ Request::is('admin/team*') ? 'active':'' }}"><a href="{{route('team.index')}}">Team</a></li>
                <li class="{{ Request::is('admin/customer-support*') ? 'active':'' }}"><a href="{{route('customer-support.index')}}">Customer Support</a></li>
                </ul>
            </li>

            <li class="header">Site Setting</li>
            <li class="{{ Request::is('admin/home-banner*') ||  Request::is('admin/home-video*') || Request::is('admin/faq*') || Request::is('admin/footer-info*') || Request::is('admin/coupon*') ? 'active open':'' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Settings</span> </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('admin/home-banner*') ? 'active':'' }}"><a href="{{route('home-banner.index')}}">Home Banner</a></li>
                    <li class="{{ Request::is('admin/home-video*') ? 'active':'' }}"><a href="{{route('home-video.index')}}">Home Video</a></li>
                    <li class="{{ Request::is('admin/faq*') ? 'active':'' }}"><a href="{{route('faq.index')}}">FAQS</a></li>
                    <li class="{{ Request::is('admin/footer-info*') ? 'active':'' }}"><a href="{{route('footer-info.index')}}">Footer Information</a></li>
                    <li class="{{ Request::is('admin/coupon*') ? 'active':'' }}"><a href="{{route('coupon.index')}}">Coupon Code</a></li>
                </ul>

            </li>



            <!--
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span> </a>
                <ul class="ml-menu">
                    <li><a href="widgets-app.html">Apps Widgets</a></li>
                    <li><a href="widgets-data.html">Data Widgets</a></li>
                </ul>
            </li>
            -->
        </ul>
    </div>
</aside>
