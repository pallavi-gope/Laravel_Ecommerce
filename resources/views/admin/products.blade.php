@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Products</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Products</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product&nbsp;Name</th>
                                        <td>Product&nbsp;Code</td>
                                        <th>Quantity</th>
                                        <th>Selling</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width:20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $row)
                                    <tr>
                                        <td><img src="{{ asset($row->product_thumbnail) }}" style="width: 60px;height:50px" alt=""></td>
                                        <td>{{ $row->product_name_en }}</td>
                                        <td>{{ $row->product_code }}</td>
                                        <td>{{ $row->product_qty }}</td>
                                        <td>{{ $row->selling_price }}</td>
                                        <td class="text-center">
                                            @if($row->discount_price == NULL)
                                            <span class="badge badge-pill badge-danger">No Discount</span>
                                            @else
                                            @php
                                            $amount = $row->selling_price - $row->discount_price;
                                            $discount = ($amount/$row->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-primary">{{ round($discount) }} %</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('product.view', $row->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @if($row->status == 1)
                                            <a href="{{ route('product.inactive', $row->id) }}" class="btn btn-warning btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('product.active', $row->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            <a href="{{ route('product.delete', $row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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