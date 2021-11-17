@extends('layouts.main_master')
@section('content')
@section('title')
Stripe Payment
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
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
                                    <div class="">
                                        <form action="{{ route('stripe.pay') }}" method="POST" id="payment-form">
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
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit Payment</button>
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
<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51JwkalSEqHOWfRwCCq7UBWzkE1c1axCG4kBL8SKntLNj0LCKWlhkBjIpRRBd4wbQwvXBi8OMud1pbG5lpLIpra4500I8ZzQeBE');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
@endsection