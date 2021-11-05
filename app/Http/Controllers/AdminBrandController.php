<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;


class AdminBrandController extends Controller
{
    public function brandView(){
        $brands = Brand::latest()->get();
        return view('admin.brand_view', compact('brands'));
    }
    public function brandAdd(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required'
        ]);

        $image = $request->brand_image;
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand_images/'.$name_gen);
        $save_url = 'upload/brand_images/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_image' => $save_url,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-', $request->brand_slug_hin)
        ]);
        $notification = array(
            'message' => 'Brand Inserted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function brandEdit($id){
        $brand = Brand::FindOrFail($id);
        return view('admin.brand_edit', compact('brand'));
    }
    public function brandUpdate(Request $request){
        $brand_id = $request->id;
        $old_image = $request->old_image;
        if($request->file('brand_image')){
           @unlink($old_image);
           $image = $request->brand_image;
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300, 300)->save('upload/brand_images/'.$name_gen);
           $save_url = 'upload/brand_images/'.$name_gen;

            Brand::FindOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_image' => $save_url,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin)
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.brand')->with($notification);
        }else{
            Brand::FindOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin)
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.brand')->with($notification);
        }
    }
    public function brandDelete($id){
        $brand = Brand::FindOrFail($id);
        $image = $brand->brand_image;
        @unlink($image);
        Brand::FindOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
