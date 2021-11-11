<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Slider;
use App\Models\Brand;
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
        $sliders = Slider::where('status', 1)->orderBy('id', 'ASC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deal', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $sepcial_deals = Product::where('special_deal', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(6)->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->limit(6)->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_product_brand_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->limit(6)->get();
        // return $skip_category->id;
        // die();
        return view('index', compact('categories', 'sliders', 'products', 'featured', 'hot_deals', 'special_offers', 'sepcial_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_1', 'skip_product_brand_1'));
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

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
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
    public function changePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.change_password', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedpassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login');
        } else {
            return Redirect()->back();
        }
    }
    public function productDetails($id, $slug)
    {
        $products = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        $color_en = $products->product_color_en;
        $product_color_en = explode(',', $color_en);
        $color_hin = $products->product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        $size_en = $products->product_size_en;
        $product_size_en = explode(',', $size_en);
        $size_hin = $products->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        return view('product_details', compact('products', 'images', 'product_color_en', 'product_color_hin', 'product_size_en', 'product_size_hin'));
    }
    public function tagwiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->where('product_tags_hin', $tag)->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('products_tags', compact('products','categories'));
    }
    public function subcatProduct($id, $slug){
        $products = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('products_subcategory', compact('products', 'categories'));
    }
    public function subsubcatProduct($id, $slug){
        $products = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('products_subsubcategory', compact('products', 'categories'));
    }
}
