<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function viewWishlist(){
        return view('wishlist');
    }
    public function getWishlist(){
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }
    public function addToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Product Added To Your Wishlist!']);
            } else {
                return response()->json(['error' => 'Product Already Exists On Your Wishlist!']);
            }
        } else {
            return response()->json(['error' => 'Please Login First']);
        }
    }  
    public function removeWishlist($rowId){
        Wishlist::where('user_id', Auth::id())->where('id', $rowId)->delete();
        return response()->json(['success' => 'Product Removed From Wishlist!']);
    } 
}
