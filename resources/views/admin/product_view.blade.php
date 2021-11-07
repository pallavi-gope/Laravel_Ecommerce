@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">View Product</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Product</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
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
                        <h3 class="box-title">View Product</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="id" value="{{ $products->id }}" />
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    @foreach($brands as $brand)
                                    <div>{{ $brand->id == $products->brand_id ? $brand->brand_name_en : '' }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    @foreach($categories as $category)
                                    <div>{{ $category->id == $products->category_id ? $category->category_name_en : '' }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Subcategory</label>
                                    @foreach($subcategories as $subcategory)
                                    <div>{{ $subcategory->id == $products->subcategory_id ? $subcategory->subcategory_name_en : '' }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Sub Subcategory</label>
                                    @foreach($subsubcategories as $subsubcategory)
                                    <div>{{ $subsubcategory->id == $products->subsubcategory_id ? $subsubcategory->subsubcategory_name_en : '' }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name En</label>
                                    <input type="text" class="form-control" readonly name="product_name_en" value="{{ $products->product_name_en }}" id="product_name_en" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name Hin</label>
                                    <input type="text" class="form-control" readonly name="product_name_hin" value="{{ $products->product_name_hin }}" id="product_name_hin" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Code</label>
                                    <input type="text" class="form-control" readonly name="product_code" value="{{ $products->product_code }}" id="product_code" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" class="form-control" readonly name="product_qty" value="{{ $products->product_qty }}" id="product_qty" />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Selling Price</label>
                                    <input type="text" class="form-control" readonly name="selling_price" value="{{ $products->selling_price }}" id="selling_price" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Discount Price</label>
                                    <input type="text" class="form-control" readonly name="discount_price" value="{{ $products->discount_price }}" id="discount_price" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Tags En</label>
                                    <input type="text" class="form-control" readonly name="product_tags_en" value="{{ $products->product_tags_en }}" id="product_tags_en" value="" data-role="tagsinput" placeholder="add tags" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Tags Hin</label>
                                    <input type="text" class="form-control" readonly name="product_tags_hin" value="{{ $products->product_tags_hin }}" id="product_tags_hin" value="" data-role="tagsinput" placeholder="add tags" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Size En</label>
                                    <input type="text" class="form-control" readonly name="product_size_en" value="{{ $products->product_size_en }}" id="product_size_en" value="Small, Medium, Large" data-role="tagsinput" placeholder="add tags" />

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Size Hin</label>
                                    <input type="text" class="form-control" readonly name="product_size_hin" value="{{ $products->product_size_hin }}" id="product_size_hin" value="Small, Medium, Large" data-role="tagsinput" placeholder="add tags" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Color En</label>
                                    <input type="text" class="form-control" readonly name="product_color_en" value="{{ $products->product_color_en }}" id="product_color_en" value="Red, Black" data-role="tagsinput" placeholder="add tags" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Color Hin</label>
                                    <input type="text" class="form-control" readonly name="product_color_hin" value="{{ $products->product_color_hin }}" id="product_color_hin" value="Red,Black" data-role="tagsinput" placeholder="add tags" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Short Description En</label>
                                    <textarea name="short_desc_en" readonly class="form-control" id="short_desc_en" cols="30" rows="5">{{ $products->short_desc_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Short Description Hin</label>
                                    <textarea name="short_desc_hin" readonly class="form-control" id="short_desc_hin" cols="30" rows="5">{{ $products->short_desc_hin }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Long Description En</label>
                                    <div>
                                        {{ $products->long_desc_en }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Long Description Hin</label>
                                    <div>
                                        {{ $products->long_desc_hin }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="controls">
                                    <br>
                                    <br>
                                    <fieldset>
                                        <input type="checkbox" name="hot_deal" id="checkbox_1" value="1" {{ $products->hot_deal == 1 ? 'checked' : '' }} />
                                        <label for="checkbox_1">Hot Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <br>
                                <fieldset>
                                    <input type="checkbox" name="featured" id="checkbox_2" value="1" {{ $products->featured == 1 ? 'checked' : '' }} />
                                    <label for="checkbox_2">Featured</label>
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <br>
                                <fieldset>
                                    <input type="checkbox" name="special_offer" id="checkbox_3" value="1" {{ $products->special_offer == 1 ? 'checked' : '' }} />
                                    <label for="checkbox_3">Special Offer</label>
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <br>
                                <fieldset>
                                    <input type="checkbox" name="special_deal" id="checkbox_4" value="1" {{ $products->special_deal == 1 ? 'checked' : '' }} />
                                    <label for="checkbox_4">Special Deal</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box bt-3 border-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Thumbnail</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($products->product_thumbnail) }}" id="main_thumb" class="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box bt-3 border-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Images</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            @foreach($images as $image)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($image->image) }}" class="card-img-top" alt="">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection