<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\ImageManagerStatic as Image;

class AdminProductController extends Controller
{
    public function productAdd()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.product_add', compact('brands', 'categories'));
    }
    public function productInsert(Request $request)
    {
        $image = $request->product_thumbnail;
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $name_gen);
        $save_url = 'upload/products/thumbnails/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_hin' => $request->short_desc_hin,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_hin' => $request->long_desc_hin,
            'product_thumbnail' => $save_url,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deal' => $request->special_deal,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multiple_image');
        foreach ($images as $img) {
            $multi_name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/images/' . $multi_name_gen);
            $save_url_multi = 'upload/products/images/' . $multi_name_gen;

            ProductImage::insert([
                'product_id' => $product_id,
                'image' => $save_url_multi,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'Product Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.product')->with($notification);
    }
    public function productManage()
    {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }
    public function productEdit($id)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $subsubcategories = SubSubcategory::latest()->get();
        $products = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.product_edit', compact('categories', 'products', 'brands', 'subcategories', 'subsubcategories', 'images'));
    }
    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_hin' => $request->short_desc_hin,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_hin' => $request->long_desc_hin,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deal' => $request->special_deal,
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.product')->with($notification);
    }
    public function productImageUpdate(Request $request){
        $imgs = $request->multiple_image;
        foreach($imgs as $id => $img){
            $imgDel = ProductImage::findOrFail($id);
            @unlink($imgDel->image);
            $multi_name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/images/' . $multi_name_gen);
            $save_path = 'upload/products/images/' . $multi_name_gen;

            ProductImage::where('id', $id)->update([
                'image' => $save_path,
                'updated_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated',
            'alery-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function productThumbUpdate(Request $request){
        $product_id = $request->product_id;
        $old_img = $request->old_img;
        @unlink($old_img);
        $image = $request->product_thumbnail;
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $name_gen);
        $save_url = 'upload/products/thumbnails/' . $name_gen;

        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Thumbnail Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function productImageDelete($id){
        $old_img = ProductImage::findOrFail($id);
        @unlink($old_img->image);
        ProductImage::findorFail($id)->delete();
        $notification = array(
            'message' => 'Product Image Deleted Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }
    public function productView($id)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $subsubcategories = SubSubcategory::latest()->get();
        $products = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.product_view', compact('categories', 'products', 'brands', 'subcategories', 'subsubcategories', 'images'));
    }
    public function productActive($id){
        Product::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Activated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function productInactive($id){
        Product::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Inactivated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function productDelete($id){
        $product = Product::findOrFail($id);
        @unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = ProductImage::where('product_id', $id)->get();
        foreach($images as $img){
            @unlink($img->image);
            ProductImage::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
}
