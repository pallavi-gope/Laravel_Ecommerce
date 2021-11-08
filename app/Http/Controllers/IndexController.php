<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        return view('index', compact('categories', 'sliders', 'products'));
    }
    public function userLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }
    public function userProfileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Your Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('dashboard')->with($notification);
    }
    public function changePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.change_password', compact('user'));
    }
    public function updatePassword(Request $request){
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login');
        }else{
            return Redirect()->back();
        }
    }
}
