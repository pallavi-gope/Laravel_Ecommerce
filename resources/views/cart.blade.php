@extends('layouts.main_master')
@section('content')
@section('title')
My Cart
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>My Cart</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Image</th>
                                    <th class="cart-description item">Product</th>
                                    <th class="cart-product-name item">Color</th>
                                    <th class="cart-edit item">Size</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cartpage">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
@endsection