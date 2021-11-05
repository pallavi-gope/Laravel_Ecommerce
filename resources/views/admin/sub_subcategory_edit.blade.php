@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <div class="col-6 offset-3">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Subcategory</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('subsubcategory.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subsubcategory->id }}" />
                            <div class="form-group">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Subcategory <span class="text-danger">*</span></label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="" disabled>Select Subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Sub Subcategory Name English <span class="text-danger">*</span></label>
                                <input type="text" name="subsubcategory_name_en" value="{{ $subsubcategory->subsubcategory_name_en }}" id="subsubcategory_name_en" class="form-control" />
                                @error('subsubcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Sub Subcategory Name Hindi <span class="text-danger">*</span></label>
                                <input type="text" name="subsubcategory_name_hin" value="{{ $subsubcategory->subsubcategory_name_hin }}" id="subcategory_name_hin" class="form-control" />
                                @error('subsubcategory_name_hin')
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
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{ url('/admin/category/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                        });
                    }
                });
            }
            else{
                alert('danger');
            }
        });
    });
</script>
@endsection