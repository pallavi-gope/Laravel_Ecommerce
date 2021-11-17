<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //---------------------MINI CART-------------------------------//
    public function addToCart(Request $request, $id)
    {
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->selling_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
    		]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }
    public function viewMiniCart(){
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,
    	));
    }
    public function removeMiniCart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Product Removed from Cart!']);
    }
    //-------------------CART PAGE------------------------------//
    public function viewCart()
    {
       return view('cart');
    }
    public function getCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal)
        ));
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Cart Product Removed Successfully!']);
    }
    public function incrementCart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount /100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount /100)
            ]);
        }
        return response()->json(['increment']);
    }
    public function decrementCart($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount /100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount /100)
            ]);
        }
        return response()->json(['decrement']);
    }
    //-------------------COUPON------------------------------//
    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount /100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount /100)
            ]);
            return response()->json(array(
                'success' => 'Coupon Applied Successfully!'
            ));
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
    public function couponCalculation(){
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => Session::get('coupon')['coupon_name'],
                'coupon_discount' => Session::get('coupon')['coupon_discount'],
                'discount_amount' => Session::get('coupon')['discount_amount'],
                'total_amount' => Session::get('coupon')['total_amount']
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total()
            ));
        }
    }
    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully!']);
    }
}
