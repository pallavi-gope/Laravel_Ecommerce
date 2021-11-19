@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Pending Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Orders</li>
                            <li class="breadcrumb-item" aria-current="page">Pending</li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border" style="display: flex;align-items:center;justify-content:space-between">
                        <h4 class="box-title"><strong>Order</strong> Details</h4>
                        <h4 class="mb-0"><span class="text-secondary" style="margin:0">Invoice: </span> <span class="text-success">{{ $order->invoice_no }}</span></h4>
                    </div>
                    <div class="box-body">
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
                                <tr>
                                    <th colspan="2">
                                        @if($order->status == 'Pending')
                                        <a href="{{ route('pending.confirm', $order->id) }}" id="confirm" class="btn btn-success btn-block">Confirm Order</a>
                                        @elseif($order->status == 'Confirmed')
                                        <a href="{{ route('confirm.process', $order->id) }}" id="process" class="btn btn-success btn-block">Processing Order</a>
                                        @elseif($order->status == 'Processing')
                                        <a href="{{ route('process.pick', $order->id) }}" id="picked" class="btn btn-success btn-block">Picked Order</a>
                                        @elseif($order->status == 'Picked')
                                        <a href="{{ route('pick.ship', $order->id) }}" id="shipped" class="btn btn-success btn-block">Shipped Order</a>
                                        @elseif($order->status == 'Shipped')
                                        <a href="{{ route('ship.deliver', $order->id) }}" id="delivered" class="btn btn-success btn-block">Delivered Order</a>
                                        @elseif($order->status == 'Delivered')
                                        <a href="{{ route('deliver.cancel', $order->id) }}" id="cancel" class="btn btn-danger btn-block">Cancel Order</a>
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border" style="display: flex;align-items:center;justify-content:space-between">
                        <h4 class="box-title"><strong>Shipping</strong> Details</h4>
                    </div>
                    <div class="box-body">
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
            <div class="col-md-12 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Products</strong> Ordered</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered order-table">
                                <thead style="background-color: #1A233A;">
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
                                    @foreach($orderitem as $item)
                                    <tr>
                                        <td style="width: 10%;">
                                            <div class="image"><a href=""><img src="{{ asset($item->product->product_thumbnail) }}" style="height:80px;width:80px" alt=""></a> </div>
                                        </td>
                                        <td>
                                            <h5 class="name" style="margin:5px 0"><a href="#">{{ $item->product->product_name_en }}</a></h5>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection