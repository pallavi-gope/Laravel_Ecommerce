@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Add Product</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Product</li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Product</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Brand</label>
                                        <select name="brand_id" id="brand_id" required class="form-control">
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category_id" id="category_id" required class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Subcategory</label>
                                        <select name="subcategory_id" id="subcategory_id" required class="form-control">
                                            <option value="" disabled selected>Select Subcategory</option>
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Sub Subcategory</label>
                                        <select name="subsubcategory_id" id="subsubcategory_id" required class="form-control">
                                            <option value="" disabled selected>Select Sub Subcategory</option>
                                        </select>
                                        @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Name En</label>
                                        <input type="text" class="form-control" required name="product_name_en" id="product_name_en" />
                                        @error('product_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Name Hin</label>
                                        <input type="text" class="form-control" required name="product_name_hin" id="product_name_hin" />
                                        @error('product_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Product Code</label>
                                        <input type="text" class="form-control" required name="product_code" id="product_code" />
                                        @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Product Quantity</label>
                                        <input type="text" class="form-control" required name="product_qty" id="product_qty" />
                                        @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Selling Price</label>
                                        <input type="text" class="form-control" required name="selling_price" id="selling_price" />
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Discount Price</label>
                                        <input type="text" class="form-control" name="discount_price" id="discount_price" />
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Tags En</label>
                                        <input type="text" class="form-control" required name="product_tags_en" id="product_tags_en" value="" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_tags_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Tags Hin</label>
                                        <input type="text" class="form-control" required name="product_tags_hin" id="product_tags_hin" value="" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_tags_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Size En</label>
                                        <input type="text" class="form-control" name="product_size_en" id="product_size_en" value="Small, Medium, Large" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_size_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Size Hin</label>
                                        <input type="text" class="form-control" name="product_size_hin" id="product_size_hin" value="Small, Medium, Large" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_size_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Color En</label>
                                        <input type="text" class="form-control" name="product_color_en" id="product_color_en" value="Red, Black" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_color_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Color Hin</label>
                                        <input type="text" class="form-control" name="product_color_hin" id="product_color_hin" value="Red,Black" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_color_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Main Image</label>
                                        <input type="file" class="form-control" required name="product_thumbnail" onchange="mainthumb(this)" id="product_thumbnail" />
                                        @error('product_thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" id="main_thumb" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Multiple Image</label>
                                        <input type="file" class="form-control" multiple name="multiple_image[]" id="multiple_image" />
                                        @error('multiple_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row" id="preview_img">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Short Description En</label>
                                        <textarea name="short_desc_en" required class="form-control" id="short_desc_en" cols="30" rows="5"></textarea>
                                        @error('short_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Short Description Hin</label>
                                        <textarea name="short_desc_hin" required class="form-control" id="short_desc_hin" cols="30" rows="5"></textarea>
                                        @error('short_desc_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Long Description En</label>
                                        <textarea name="long_desc_en" required class="form-control" id="editor1" cols="30" rows="10"></textarea>
                                        @error('long_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Long Description Hin</label>
                                        <textarea name="long_desc_hin" required class="form-control" id="editor2" cols="30" rows="10"></textarea>
                                        @error('long_desc_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="controls">
                                        <br>
                                        <br>
                                        <fieldset>
                                            <input type="checkbox" name="hot_deal" id="checkbox_1" value="1" />
                                            <label for="checkbox_1">Hot Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <br>
                                    <fieldset>
                                        <input type="checkbox" name="featured" id="checkbox_2" value="1" />
                                        <label for="checkbox_2">Featured</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <br>
                                    <fieldset>
                                        <input type="checkbox" name="special_offer" id="checkbox_3" value="1" />
                                        <label for="checkbox_3">Special Offer</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <br>
                                    <fieldset>
                                        <input type="checkbox" name="special_deal" id="checkbox_4" value="1" />
                                        <label for="checkbox_4">Special Deal</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-group text-center">
                                        <input type="submit" value="Add Product" class="btn btn-primary rounded-3" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/admin/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{ url('/admin/subcategory/subsubcategory/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });

    function mainthumb(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#main_thumb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#multiple_image').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) { //check File API supported browser
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
@endsection