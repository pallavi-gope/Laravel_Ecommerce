<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class AdminSliderController extends Controller
{
    public function manageSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders', compact('sliders'));
    }
    public function sliderAdd(Request $request)
    {
        $request->validate(
            [
                'slider' => 'required'
            ],
            [
                'slider.required' => 'Please Select Slider Image'
            ]
        );
        $image = $request->slider;
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/sliders/' . $name_gen);
        $save_url = 'upload/sliders/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function sliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('admin.slider_edit', compact('sliders'));
    }
    public function sliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_img;
        $image_update = $request->slider;
        if ($image_update) {
            @unlink($old_img);
            $name_gen_update = hexdec(uniqid()) . '.' . $image_update->getClientOriginalExtension();
            Image::make($image_update)->resize(870, 370)->save('upload/sliders/' . $name_gen_update);
            $save_url_update = 'upload/sliders/' . $name_gen_update;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider' => $save_url_update,
                'updated_at' => Carbon::now()
            ]);
        } else {

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'Slider Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('manage.slider')->with($notification);
    }
    public function sliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider Activated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function sliderInactive($id)
    {
        Slider::findorFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider Deactivated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }
    public function sliderDelete($id)
    {
        $slider_img = Slider::findOrFail($id);
        @unlink($slider_img->slider);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully!',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
    public function setLight()
    {
        Session::put('light-skin', ['skin' => 'light']);
        return response()->json(['light-skin']);
    }
    public function setDark()
    {
        if (Session::has('light-skin')) {
            Session::forget('light-skin');
        }
        return response()->json(['dark-skin']);
    }
}
