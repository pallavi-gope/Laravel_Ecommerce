@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Subcategory</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Subcategory</li>
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
                        <h3 class="box-title">Edit Subcategory</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('subcategory.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subcategory->id }}" />
                            <div class="form-group">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Name English <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" id="subcategory_name_en" class="form-control" />
                                @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Name Hindi <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_hin" value="{{ $subcategory->subcategory_name_hin }}" id="subcategory_name_hin" class="form-control" />
                                @error('subcategory_name_hin')
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