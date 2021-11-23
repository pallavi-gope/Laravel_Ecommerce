@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Sliders</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Slider</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $row)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset($row->slider) }}" style="height: 50px;" alt=""></td>
                                        <td>
                                            @if($row->title == NULL)
                                            <span class="text-danger">No Title</span>
                                            @else
                                            <span>{{ $row->title }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->description == NULL)
                                            <span class="text-danger">No Description</span>
                                            @else
                                            <span>{{ $row->description }}</span>
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
                                            <a href="{{ route('slider.edit', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @if($row->status == 1)
                                            <a href="{{ route('slider.inactive', $row->id) }}" class="btn btn-warning btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('slider.active', $row->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            <a href="{{ route('slider.delete', $row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('add.slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Slider Image <span class="text-danger">*</span></label>
                                <input type="file" name="slider" id="slider" class="form-control" />
                                @error('slider')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Add Slider" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection