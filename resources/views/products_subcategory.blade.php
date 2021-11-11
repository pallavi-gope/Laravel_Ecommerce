@extends('layouts.main_master')
@section('content')
@section('title')
Subcategory Wise Products
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Handbags</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                @include('common.vertical_menu')
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">shop by</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Category</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @foreach($categories as $category)
                                    <div class="accordion-group">
                                        <div class="accordion-heading"> <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                                @if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif
                                            </a> </div>
                                        <div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
                                            <div class="accordion-inner">
                                                @php
                                                $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                                @endphp
                                                <ul>
                                                    @foreach($subcategories as $subcategory)
                                                    <li><a href="{{ url('products/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                                                            @if(session()->get('language') == 'hindi') {{ $subcategory->subcategory_name_hin }} @else {{ $subcategory->subcategory_name_en }} @endif
                                                        </a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <a href="#" class="lnk btn btn-primary">Show Now</a>
                            </div>
                        </div>
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Manufactures</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Forever 18</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Dolce & Gabbana</a></li>
                                    <li><a href="#">Alluare</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Other Brand</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Colors</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Yellow</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Teal</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Compare products</h3>
                            <div class="sidebar-widget-body">
                                <div class="compare-report">
                                    <p>You have no <span>item(s)</span> to compare</p>
                                </div>
                            </div>
                        </div>
                        @include('common.testimonials')
                    </div>
                </div>
            </div>
            <div class='col-md-9'>
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image"> <img src="{{ asset('frontend/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text"> Big Sale </div>
                                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-sm-12 col-md-6">
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">position</a></li>
                                                <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Show</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6 col-md-4 text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                            <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                        <div class="tab-pane " id="list-container">
                            <div class="category-product">
                                @foreach($products as $product)
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{ url('product/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        @if($product->discount_price == NULL)
                                                        <div class="product-price"> <span class="price">Rs. {{ $product->selling_price }}</span></div>
                                                        @else
                                                        <div class="product-price"> <span class="price">Rs. {{ $product->discount_price }}</span> <span class="price-before-discount">Rs. {{ $product->selling_price }}</span> </div>
                                                        @endif
                                                        <div class="description m-t-10">@if(session()->get('language') == 'hindi') {{ $product->short_desc_hin }} @else {{ $product->short_desc_en }} @endif</div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                    <li class="lnk"> <a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout');
    </div>
</div>
@endsection