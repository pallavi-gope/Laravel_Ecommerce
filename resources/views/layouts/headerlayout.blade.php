<header class="header-style-1">
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>
                                @if(session()->get('language') == 'hindi') मेरा लेखा @else My Account @endif
                            </a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                                @if(session()->get('language') == 'hindi') इच्छा-सूची @else Wishlist @endif
                            </a></li>
                        <li><a href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i>
                                @if(session()->get('language') == 'hindi') मेरी कार्ट @else My Cart @endif
                            </a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
                                @if(session()->get('language') == 'hindi') चेकआउट @else Checkout @endif
                            </a></li>
                        @auth
                        <li><a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>
                                @if(session()->get('language') == 'hindi') मेरी प्रोफाइल @else My Profile @endif
                            </a></li>
                        @else
                        <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                                @if(session()->get('language') == 'hindi') लॉग इन @else Login @endif
                            </a></li>
                        <li><a href="{{ route('register') }}"><i class="icon fa fa-lock"></i>
                                @if(session()->get('language') == 'hindi') रजिस्टर @else Register @endif
                            </a></li>
                        @endauth
                    </ul>
                </div>
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">
                                    @if(session()->get('language') == 'hindi')
                                    भाषा: हिंदी
                                    @else
                                    Language:English
                                    @endif
                                </span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'hindi')
                                <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                <li><a href="{{ route('hindi.language') }}">हिंदी</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend/images/logo.png') }}" alt="logo"> </a> </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span><span class="total-price"> <span class="sign">Rs.</span><span class="value" id="cartSubTotal"></span> /-</span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="minicart">
                                </div>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"><span class="text">Sub Total :</span>Rs. <span class='price' id="cartSubTotal"></span>/-</div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}">
                                        @if(session()->get('language') == 'hindi') घर @else Home @endif
                                    </a>
                                </li>
                                @php
                                $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp
                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu">
                                    <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            @php
                                                            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                                            @endphp
                                                            @foreach($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                                                                <a href="{{ url('/products/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                                                                    <h2 class="title">@if(session()->get('language') == 'hindi') {{ $subcategory->subcategory_name_hin }} @else {{ $subcategory->subcategory_name_en }} @endif</h2>
                                                                </a>
                                                                <ul class="links">
                                                                    @php
                                                                    $subsubcategories = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                                                    @endphp
                                                                    @foreach($subsubcategories as $subsubcategory)
                                                                    <li><a href="{{ url('/products/subsubcategory/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">@if(session()->get('language') == 'hindi') {{ $subsubcategory->subsubcategory_name_hin }} @else {{ $subsubcategory->subsubcategory_name_en }} @endif</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                        <img class="img-responsive" src="{{ asset('frontend/images/banners/top-menu-banner.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>