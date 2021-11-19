@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Coupons</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Coupons</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupons List &nbsp;<span class="badge badge-pill bg-primary">{{ count($coupons) }}</span></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->coupon_discount }}</td>
                                        <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d M Y') }}</td>
                                        <td class="text-center">
                                            @if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-pill bg-success">Valid</span>
                                            @else
                                            <span class="badge badge-pill bg-danger">Expired</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('coupon.delete', $coupon->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Coupon</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('add.coupon') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Coupon Name <span class="text-danger">*</span></label>
                                <input type="text" name="coupon_name" id="coupon_name" class="form-control" />
                                @error('coupon_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Discount (%) <span class="text-danger">*</span></label>
                                <input type="number" name="coupon_discount" id="coupon_discount" class="form-control" />
                                @error('coupon_discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Validity Date<span class="text-danger">*</span></label>
                                <input type="date" name="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="coupon_validity" class="form-control" />
                                @error('coupon_validity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Submit" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection