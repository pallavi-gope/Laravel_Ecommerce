@extends('layouts.main_master')
@section('content')
@section('title')
Checkout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="checkout-box">
            <form action="{{ route('checkout_process') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="name text-primary"><b>Shipping Details</b></h4>
                                                <hr>
                                                <div class="form-group">
                                                    <label class="">Name<span>*</span></label>
                                                    <input type="text" name="shipping_name" required class="form-control unicase-form-control text-input" value="{{ Auth::user()->name }}" placeholder="Full Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Email<span>*</span></label>
                                                    <input type="email" name="shipping_email" required class="form-control unicase-form-control text-input" value="{{ Auth::user()->email }}" placeholder="Email" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Phone<span>*</span></label>
                                                    <input type="tel" name="shipping_phone" required class="form-control unicase-form-control text-input" value="{{ Auth::user()->phone }}" placeholder="Phone" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Pin Code<span>*</span></label>
                                                    <input type="number" maxlength="6" name="post_code" required class="form-control unicase-form-control text-input" value="" placeholder="Pin Code" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="name text-primary"><b>Shipping Address</b></h4>
                                                <hr>
                                                <div class="form-group">
                                                    <label class="info-title">Division<span>*</span></label>
                                                    <select name="division_id" id="division_id" class="form-control" required>
                                                        <option value="" selected disabled>Select Division</option>
                                                        @foreach($shipdivision as $division)
                                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title">District<span>*</span></label>
                                                    <select name="district_id" id="district_id" class="form-control" required>
                                                        <option value="" selected disabled>Select District</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title">State<span>*</span></label>
                                                    <select name="state_id" id="state_id" class="form-control" required>
                                                        <option value="" selected disabled>Select State</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title">Notes</label>
                                                    <textarea name="notes" id="notes" class="form-control" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkout-progress-sidebar">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                            <li>
                                                <div class="cart-item product-summary">
                                                    <div class="row" style="display:flex;align-items:center;">
                                                        <div class="col-md-3">
                                                            <div class="image"><a href=""><img src="{{ asset($item->options->image) }}" style="width:100%" alt=""></a> </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h5 class="name" style="margin:5px 0"><a href="">{{ $item->name }}</a></h5>
                                                            <div class="price"><b>Rs.</b> {{ $item->price }} | <b>QTY : ({{ $item->qty }})</b></div>
                                                            <div class="price"><b>Color : </b>{{ $item->options->color }} | <b>Size : </b> {{ $item->options->size }}</div>
                                                        </div>
                                                        <div class="col-md-2 action"><button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <hr>
                                            </li>
                                            @endforeach
                                            <li>
                                                @if(Session::has('coupon'))
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Subtotal</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b>Rs.{{ $cartTotal }}</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b class="text-success">Coupon</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b class="text-success">{{ session()->get('coupon')['coupon_name'] }} </b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b class="">Discount</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b class=""> ({{ session()->get('coupon')['coupon_discount'] }}%) </b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b class="text-primary">Grand Total</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b class="text-success">Rs.{{ session()->get('coupon')['total_amount'] }}/- </b>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Subtotal</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b>Rs.{{ $cartTotal }}</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>Grand Total</b>
                                                    </div>
                                                    <div class="col-md-8 text-right">
                                                        <b>Rs.{{ $cartTotal }}</b>
                                                    </div>
                                                </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-progress-sidebar">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe" />
                                            <img src="{{ asset('frontend/images/payments/4.png') }}" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card" />
                                            <img src="{{ asset('frontend/images/payments/3.png') }}" alt="">
                                        </div>
                                        <div class="col-md-12" style="margin-top:6px">
                                            <label for="">Cash On Delivery</label>
                                            <input type="radio" name="payment_method" value="cash" />
                                            <img src="{{ asset('frontend/images/payments/2.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-progress-sidebar">
                            <div class="panel-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" id="submit" class="btn-upper btn btn-primary btn-block checkout-page-button">Continue To Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/admin/shipping/district/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="district_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/admin/shipping/state/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection