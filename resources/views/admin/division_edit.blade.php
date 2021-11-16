@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Shipping Divisions</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Shipping Division</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="box">
                <div class="box-header with-border">
                        <h3 class="box-title">Edit Division</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('division.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Division Name <span class="text-danger">*</span></label>
                                <input type="text" name="division_name" value="{{ $item->division_name }}" id="division_name" class="form-control" />
                                <input type="hidden" name="id" value="{{ $item->id }}" />
                                @error('division_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update Division" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection