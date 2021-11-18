<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class UserController extends Controller
{
    public function myOrders(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('user.my_orders', compact('orders'));
    }
    public function orderDetails($order_id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('user.order_details', compact('order', 'orderitem'));
    }
    public function downloadInvoice($order_id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('user.order_invoice', compact('order', 'orderitem'));
       
        $pdf = PDF::loadView('user.order_invoice', compact('order', 'orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);
        return $pdf->download('invoice'.Carbon::now()->format('dmYhis').'.pdf');
    }
}
