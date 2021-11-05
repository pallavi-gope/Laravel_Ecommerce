@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Subcategory</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Subcateogry</li>
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
                        <h3 class="box-title">Subcategory List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Subcategory En</th>
                                        <th>Subcategory Hin</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory['category']['category_name_en'] }}</i></td>
                                        <td>{{ $subcategory->subcategory_name_en }}</td>
                                        <td>{{ $subcategory->subcategory_name_hin }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('subcategory.delete', $subcategory->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add Subcategory</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('add.subcategory') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Category ID <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach($categories as $category)
                                     <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Subcategory Name English <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_en" id="subcategory_name_en" class="form-control" />
                                @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Subcategory Name Hindi <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_hin" id="subcategory_name_hin" class="form-control" />
                                @error('subcategory_name_hin')
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