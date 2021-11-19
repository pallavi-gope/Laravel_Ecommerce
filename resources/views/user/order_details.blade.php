@extends('layouts.main_master')
@section('content')
@section('title')
Shipping Details
@endsection
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('common.user_sidebar')
            </div>
            <div class="col-md-5">
                <div class="card shopping-cart">
                    <div class="card-title d-flex" style="display: flex;align-items:center;justify-content:space-between">
                        <h3 class="text-left" style="margin:0"><b>Order Details</b></h3>
                        <h4><span class="text-secondary" style="margin:0">Invoice: </span> <span class="text-primary">{{ $order->invoice_no }}</span></h4>
                    </div>
                    <hr>
                    <div class="card-body" style="background-color: #E9EBEC;">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Name: </th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <th>{{ $order->user->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <th>{{ $order->user->email }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Type: </th>
                                    <th>{{ $order->payment_type }}</th>
                                </tr>
                                <tr>
                                    <th>Transaction ID: </th>
                                    <th>{{ $order->transaction_id }}</th>
                                </tr>
                                <tr>
                                    <th>Invoice No.: </th>
                                    <th>{{ $order->invoice_no }}</th>
                                </tr>
                                <tr>
                                    <th>Order Total: </th>
                                    <th>Rs.{{ $order->amount }}</th>
                                </tr>
                                <tr>
                                    <th>Order Status: </th>
                                    <th><span class="badge badge-pill badge-warning bg-primary" style="background-color: #418DB9;"> {{ $order->status }}</span></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shopping-cart">
                    <div class="card-title d-flex" style="display: flex;align-items:center;justify-content:space-between">
                        <h3 class="text-left" style="margin-top:0"><b>Shipping Details</b></h3>
                    </div>
                    <hr>
                    <div class="card-body" style="background-color: #E9EBEC;">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name: </th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Phone: </th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email: </th>
                                    <th>{{ $order->email }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Division: </th>
                                    <th>{{ $order->division->division_name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping District: </th>
                                    <th>{{ $order->district->district_name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping State: </th>
                                    <th>{{ $order->state->state_name }}</th>
                                </tr>
                                <tr>
                                    <th>Postal Code: </th>
                                    <th>{{ $order->post_code }}</th>
                                </tr>
                                <tr>
                                    <th>Order Date: </th>
                                    <th>{{ $order->order_date }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="margin-top:20px">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="shopping-cart">
                            <div class="table-responsive">
                                <table class="table table-bordered order-table">
                                    <thead style="background-color: #E9EBEC;">
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Product Code</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th class="text-center">Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($orderitem as $item)
                                        <tr>
                                            <td>
                                                <div class="image"><a href=""><img src="{{ asset($item->product->product_thumbnail) }}" style="height:80px;width:80px" alt=""></a> </div>
                                            </td>
                                            <td>
                                                <h5 class="name" style="margin:5px 0"><a href="{{ url('/product/'.$item->product->id.'/'.$item->product->product_slug_en) }}">{{ $item->product->product_name_en }}</a></h5>
                                            </td>
                                            <td>
                                                {{ $item->product->product_code }}
                                            </td>
                                            <td>
                                                {{ $item->color }}
                                            </td>
                                            <td>
                                                {{ $item->size }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->qty }}
                                            </td>
                                            <td>
                                                <b>Rs.</b> {{ $item->price }}
                                                @if($item->qty > 1)
                                                (Rs.{{ $item->price * $item->qty }})
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                            <h4 class="text-danger">Orders Not Found!</h4>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(($order->status == 'Delivered') && ($order->return_reason == NULL))
                        <form method="POST" action="{{ route('return.order', $order->id) }}">
                            @csrf
                            <div class="return" style="margin-top:2rem">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Return Reason</label>
                                            <textarea name="return_reason" id="return_reason" class="form-control" placeholder="Return Reason..." required cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" id="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @elseif($order->status == 'Cancelled')
                        <h5 class="badge badge-pill bg-danger" style="font-size: 20px; padding:6px 15px;font-weight:400">Cancelled</h5>
                        @else
                         <h5 class="badge badge-pill bg-danger" style="font-size: 20px; padding:6px 15px;font-weight:400">Return Requested</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection