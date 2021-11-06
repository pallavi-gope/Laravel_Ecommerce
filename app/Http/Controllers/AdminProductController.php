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
    public function productAdd(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.product_add', compact('brands', 'categories'));
    }
    public function productInsert(Request $request){
        $image = $request->product_thumbnail;
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/'.$name_gen);
        $save_url = 'upload/products/thumbnails/'.$name_gen;

       $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
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
        foreach($images as $img){
            $multi_name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/images/'.$multi_name_gen);
            $save_url_multi = 'upload/products/images/'.$multi_name_gen;

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
        return Redirect()->back()->with($notification);
    }
}
