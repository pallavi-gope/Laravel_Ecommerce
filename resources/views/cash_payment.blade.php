@extends('layouts.main_master')
@section('content')
@section('title')
Cash on Delivery
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Payment</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="checkout-box">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Total Checkout Amount</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li>
                                            @if(Session::has('coupon'))
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>Subtotal</b>
                                                        <h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4><b>Rs.{{ $cartTotal }}</b></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b class="text-success">Coupon</b></h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4><b class="text-success">{{ session()->get('coupon')['coupon_name'] }} </b></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b class="">Discount</b></h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4><b class=""> ({{ session()->get('coupon')['coupon_discount'] }}%) </b></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b class="text-primary">Grand Total</b></h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4><b class="text-success">Rs.{{ session()->get('coupon')['total_amount'] }}/- </b></h4>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>Subtotal</b></h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4> <b>Rs.{{ $cartTotal }}</b></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>Grand Total</b></h4>
                                                </div>
                                                <div class="col-md-8 text-right">
                                                    <h4> <b>Rs.{{ $cartTotal }}</b></h4>
                                                </div>
                                            </div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Continue Payment</h4>
                                </div>
                                <div class="" style="display: flex; justify-content:space-between;align-items:center">
                                    <img src="{{ asset('frontend/images/payments/cash.png') }}" style="width: 150px;" alt="">
                                    <form action="{{ route('cash.pay') }}" method="POST" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <label for="card-element">
                                                <input type="hidden" name="name" id="name" class="form-control" value="{{ $data['shipping_name'] }}" />
                                                <input type="hidden" name="email" id="email" class="form-control" value="{{ $data['shipping_email'] }}" />
                                                <input type="hidden" name="phone" id="phone" class="form-control" value="{{ $data['shipping_phone'] }}" />
                                                <input type="hidden" name="post_code" id="post_code" class="form-control" value="{{ $data['post_code'] }}" />
                                                <input type="hidden" name="division_id" id="division_id" class="form-control" value="{{ $data['division_id'] }}" />
                                                <input type="hidden" name="district_id" id="district_id" class="form-control" value="{{ $data['district_id'] }}" />
                                                <input type="hidden" name="state_id" id="state_id" class="form-control" value="{{ $data['state_id'] }}" />
                                                <input type="hidden" name="notes" id="notes" class="form-control" value="{{ $data['notes'] }}" />
                                            </label>
                                        </div>                                       
                                        <button type="submit" class="btn btn-block btn-primary">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
@endsection