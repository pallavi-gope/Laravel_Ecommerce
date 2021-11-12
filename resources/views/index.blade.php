@extends('layouts.main_master')
@section('content')
@section('title')
Home Easy Online shop
@endsection
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            @include('common.vertical_menu')
            @include('common.products_hot_deals')
            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Offers</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                @foreach($special_offers as $product)
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </a> </div>
                                                </div>
                                            </div>
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                                            @if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('common.product_tags')
            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Deals</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                @foreach($sepcial_deals as $product)
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""> </a> </div>
                                                </div>
                                            </div>
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                                            @if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                <h3 class="section-title">Newsletters</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <p>Sign Up for Our Newsletter!</p>
                    <form>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                        </div>
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            @include('common.testimonials')
            <div class="home-banner"> <img src="{{ asset('frontend/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                    @foreach($sliders as $slide)
                    <div class="item">
                        <img src="{{ asset($slide->slider) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">money back</h4>
                                    </div>
                                </div>
                                <h6 class="text">30 Days Money Back Guarantee</h6>
                            </div>
                        </div>


                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">free shipping</h4>
                                    </div>
                                </div>
                                <h6 class="text">Shipping on orders over $99</h6>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">Special Sale</h4>
                                    </div>
                                </div>
                                <h6 class="text">Extra $5 off on all items </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">New Products</h3>
                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                        <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                        @foreach($categories as $category)
                        <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">@if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                @foreach($products as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                </div>
                                                @if($product->discount_price == NULL)
                                                <div class="tag new"><span>New</span></div>
                                                @else
                                                @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price)*100;
                                                @endphp
                                                <div class="tag new"><span>{{ round($discount) }} %</span></div>
                                                @endif
                                            </div>
                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                @if($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                                @else
                                                <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                                @endif
                                            </div>
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button  data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)"  class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @foreach($categories as $category)
                    @php
                    $catwiseProd = App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->limit(6)->get();
                    @endphp
                    <div class="tab-pane" id="category{{ $category->id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                @forelse($catwiseProd as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                                @if($product->discount_price == NULL)
                                                <div class="tag new"><span>New</span></div>
                                                @else
                                                @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price)*100;
                                                @endphp
                                                <div class="tag sale"><span>{{ round($discount) }} %</span></div>
                                                @endif
                                            </div>
                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                @if($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                                @else
                                                <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                                @endif
                                            </div>
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon"  data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)"  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h5 class="text-danger text-center">No Product Available</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="wide-banner cnt-strip">
                            <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner1.jpg') }}" alt=""> </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5">
                        <div class="wide-banner cnt-strip">
                            <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner2.jpg') }}" alt=""> </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($featured as $product)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                    @if($product->discount_price == NULL)
                                    <div class="tag new"><span>New</span></div>
                                    @else
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }} %</span></div>
                                    @endif
                                </div>
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if(session()->get('language') =='hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                        </a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    @if($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                    @else
                                    <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                    @endif
                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)" type="button"><i class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                            <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">{{ $skip_category_0->category_name_en }}</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($skip_product_0 as $product)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                    @if($product->discount_price == NULL)
                                    <div class="tag new"><span>New</span></div>
                                    @else
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }} %</span></div>
                                    @endif
                                </div>
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if(session()->get('language') =='hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                        </a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    @if($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                    @else
                                    <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                    @endif
                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                            <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">{{ $skip_category_1->category_name_en }}</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($skip_product_1 as $product)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                    @if($product->discount_price == NULL)
                                    <div class="tag new"><span>New</span></div>
                                    @else
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }} %</span></div>
                                    @endif
                                </div>
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if(session()->get('language') =='hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                        </a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    @if($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                    @else
                                    <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                    @endif
                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"  data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)"  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                            <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">{{ $skip_brand_1->brand_name_en }}</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($skip_product_brand_1 as $product)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                    @if($product->discount_price == NULL)
                                    <div class="tag new"><span>New</span></div>
                                    @else
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }} %</span></div>
                                    @endif
                                </div>
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if(session()->get('language') =='hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                                        </a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    @if($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                    @else
                                    <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                    @endif
                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"  data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)"  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                            <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    @include('layouts.brandlayout')
</div>
@endsection