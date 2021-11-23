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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Coupon</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('coupon.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $coupons->id }}" />
                                <label for="">Coupon Name <span class="text-danger">*</span></label>
                                <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" id="coupon_name" class="form-control" />
                                @error('coupon_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Discount (%) <span class="text-danger">*</span></label>
                                <input type="number" name="coupon_discount" value="{{ $coupons->coupon_discount }}" id="coupon_discount" class="form-control" />
                                @error('coupon_discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Validity Date<span class="text-danger">*</span></label>
                                <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" id="coupon_validity" class="form-control" />
                                @error('coupon_validity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection