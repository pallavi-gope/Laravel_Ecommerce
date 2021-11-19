@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Brands</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Brands</li>
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
                        <h3 class="box-title">Brands List&nbsp; <span class="badge badge-pill bg-primary">{{ count($brands) }}</span></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Hin</th>
                                        <th>Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->brand_name_en }}</td>
                                        <td>{{ $brand->brand_name_hin }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" style="width: 70px; height:40px" alt=""></td>
                                        <td class="text-center">
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('add.brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Brand Name English <span class="text-danger">*</span></label>
                                <input type="text" name="brand_name_en" id="brand_name_en" class="form-control" />
                                @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Name Hindi <span class="text-danger">*</span></label>
                                <input type="text" name="brand_name_hin" id="brand_name_hin" class="form-control" />
                                @error('brand_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Image <span class="text-danger">*</span></label>
                                <input type="file" name="brand_image" id="brand_image" class="form-control"  />
                                @error('brand_image')
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