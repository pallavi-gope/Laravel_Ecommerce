<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCouponController extends Controller
{
    public function manageCoupon(){
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon',compact('coupons'));
    }
    public function couponAdd(Request $request){
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function couponDelete($id){
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification); 
    }
    public function couponEdit($id){
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon_edit', compact('coupons'));
    }
    public function couponUpdate(Request $request){
        $id = $request->id;
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('manage.coupon')->with($notification);
    }
}
