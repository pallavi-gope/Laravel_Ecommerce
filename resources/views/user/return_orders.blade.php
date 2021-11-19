@extends('layouts.main_master')
@section('content')
@section('title')
My Orders
@endsection
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('common.user_sidebar')
            </div>
            <div class="col-md-10">
                <div class="card shopping-cart">
                    <h3 class="text-left" style="margin-top:0"><b>My Return Requests</b></h3>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table order-table table-bordered">
                                <thead>
                                    <tr style="background-color: #e2e2e2;">
                                        <th class="col-md-3">
                                            <label for="">Date</label>
                                        </th>
                                        <th class="col-md-2">
                                            <label for="">Amount</label>
                                        </th>
                                        <th class="col-md-2">
                                            <label for="">Payment</label>
                                        </th>
                                        <th class="col-md-2">
                                            <label for="">Invoice</label>
                                        </th>
                                        <th class="col-md-2">
                                            <label for="">Order</label>
                                        </th>
                                        <th class="col-md-2">
                                            <label for="">Action</label>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $item->order_date }}</td>
                                        <td>Rs.{{ $item->amount }}</td>
                                        <td>{{ $item->payment_type }}</td>
                                        <td>{{ $item->invoice_no }}</td>
                                        <td>                                            
                                            <span class="badge badge-pill bg-warning">Return Requested</span>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <a href="{{ url('/user/order-details/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> view</a>
                                            <a href="{{ url('/user/download-invoice/'.$item->id) }}" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> invoice</a>
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
    </div>
</div>
@endsection