@php
$categories=DB::table('categories')->whereNull('parent_id')->select('id','name')->get();
@endphp

<header class="header-main_area bg--sapphire">
    <div class="header-top_area d-lg-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-10">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class=""><a href="blog-left-sidebar.html">Categories <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="hm-dropdown" style="height:600px;overflow: auto">
                                        @foreach($categories as $category)
                                        <li><a href="{{route('shop')}}?category_id={{ $category->id}}">{{ $category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="megamenu-holder {{ Request::segment(1) =='shop' ?'active':''}}"><a href="{{ route('shop')}}">Shop </a></li>
                                <li class="{{ Request::segment(1) =='faq' ?'active':''}}"><a href="{{ route('faq')}}">Faq </a></li>
                                <li class="{{ Request::segment(1) =='about-us' ?'active':''}}"><a href="{{ route('aboutus')}}">About Us</a></li>
                                <li class="{{ Request::segment(1) =='wishlists' ?'active':''}}"><a href="{{ route('wishlists.index')}}">Wishlist</a></li>
                                <li class="{{ Request::segment(1) =='contact' ?'active':''}}"><a href="{{ route('contact')}}">Contact</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <li>
                                    @guest
                                    <a href="#">My Account<i class="fa fa-chevron-down"></i></a>
                                    @else
                                    <a href="{{ route('myAccount')}}">{{ auth()->user()->name}}<i class="fa fa-chevron-down"></i></a>
                                    @endguest
                                    <ul class="ht-dropdown ht-my_account">
                                        @guest
                                        <li><a href="{{ route('login')}}">Register</a></li>
                                        <li><a href="{{ route('login')}}">Login</a></li>
                                        @else
                                        <li><a href=" {{ route('myAccount')}} ">Dashboard</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @endguest
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top_area header-sticky bg--sapphire">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class=""><a href="blog-left-sidebar.html">Categories <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="hm-dropdown" style="height:600px;overflow: auto">
                                        @foreach($categories as $category)
                                        <li><a href="{{ $category->id}}">{{ $category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                
                                <li class="megamenu-holder {{ Request::segment(1) =='shop' ?'active':''}}"><a href="{{ route('shop')}}">Shop </a></li>
                                <li class="{{ Request::segment(1) =='faq' ?'active':''}}"><a href="{{ route('faq')}}">Faq </a></li>
                                <li class="{{ Request::segment(1) =='about-us' ?'active':''}}"><a href="{{ route('aboutus')}}">About Us</a></li>
                                <li class="{{ Request::segment(1) =='wishlists' ?'active':''}}"><a href="{{ route('wishlists.index')}}">Wishlist</a></li>
                                <li class="{{ Request::segment(1) =='contact' ?'active':''}}"><a href="{{ route('contact')}}">Contact</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-3 d-block d-lg-none">
                    <div class="header-logo_area header-sticky_logo">
                        <a href="{{ route('home')}}">
                            <img src="{{ asset('assets/images/menu/logo/1.png')}}" alt="Uren's Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-sm-9">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">{{ session()->get('cart') ? count(session()->get('cart')['items']) :0}}</span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                        <span>Cart:</span>
                                        <span class="total-price">{{ session()->get('cart') ? session()->get('cart')['total'] :0}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="contact-us_wrap">
                                <a href="tel://+8801755520777"><i class="ion-android-call"></i>01755-520777</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-3 col-sm-5">
                    <div class="header-logo_area">
                        <a href="{{ route('home')}}">
                            <img src="{{ asset('assets/images/menu/logo/1.png')}}" alt="Uren's Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="hm-form_area">
                        <form action="{{ route('shop')}}" class="hm-searchbox">
                            <select class="nice-select select-search-category" name="category_id">
                                <option value="" hidden>All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id}}" {{ $category->id == request('category_id') ? 'selected' :''}}> {{ $category->name}} </option>
                                @endforeach
                     
                            </select>
                            <input type="text" placeholder="Enter your search key ..." name="q" value="{{ request('q') ??''}}">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-7">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count"> {{ session()->get('cart') ? count(session()->get('cart')['items']) :0}} </span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                        <span>Cart:</span>
                                        <span class="total-price">{{ session()->get('cart') ? session()->get('cart')['total'] :0}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="contact-us_wrap">
                                <a href="tel://01755520777"><i class="ion-android-call"></i>01755-520777</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        @include('frontend.partials.cart_modal')
    </div>



    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="{{ route('shop')}}" class="inner-searchbox">
                        <input type="text" placeholder="Search for item..." name="q" value="{{ request('q') ??''}}">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                <li class="menu-item-has-children active"><a href="index.html"><span
                                class="mm-text">Categories <i class="ion-ios-arrow-down"></i></span></a>
                                    <ul class="sub-menu">

                                        @foreach($categories as $category)
                                        <li><a href="{{ $category->id}}">{{ $category->name}}</a></li>
                                        @endforeach
                                    </ul>
                        </li>

                        <li class="menu-item-has-children {{ Request::segment(1) =='shop' ?'active':''}}"><a href="{{ route('shop')}}">Shop </a></li>
                        <li class="menu-item-has-children {{ Request::segment(1) =='faq' ?'active':''}}"><a href="{{ route('faq')}}">Faq </a></li>
                        <li class="menu-item-has-children {{ Request::segment(1) =='about-us' ?'active':''}}"><a href="{{ route('aboutus')}}">About Us</a></li>
                        <li class="menu-item-has-children {{ Request::segment(1) =='wishlists' ?'active':''}}"><a href="{{ route('wishlists.index')}}">Wishlist</a></li>
                        <li class="menu-item-has-children {{ Request::segment(1) =='contact' ?'active':''}}"><a href="{{ route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
               
            </div>
        </div>
    </div>
</header>