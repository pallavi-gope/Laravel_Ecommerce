@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Slider</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Slider</li>
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
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $sliders->title }}" id="title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $sliders->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_img" value="{{ $sliders->slider }}" />
                                <input type="hidden" name="id" value="{{ $sliders->id }}" />
                                <label for="">Slider Image <span class="text-danger">*</span></label>
                                <input type="file" name="slider" id="slider" class="form-control" />
                                @error('slider')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset($sliders->slider) }}" style="height: 100px;" alt="">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update Slider" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection