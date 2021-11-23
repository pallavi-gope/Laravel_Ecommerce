@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Category</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Category</li>
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
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}" />
                            <div class="form-group">
                                <label for="">Category Name English <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_en" value="{{ $category->category_name_en }}" id="category_name_en" class="form-control" />
                                @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Name Hindi <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_hin" value="{{ $category->category_name_hin }}" id="category_name_hin" class="form-control" />
                                @error('category_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Icon <span class="text-danger">*</span></label>
                                <input type="text" name="category_icon" id="category_icon" value="{{ $category->category_icon }}" class="form-control" />
                                @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update" class="btn btn-primary btn-rounded" name="update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection