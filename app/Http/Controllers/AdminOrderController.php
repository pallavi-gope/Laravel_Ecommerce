<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class AdminOrderController extends Controller
{
    public function orderPending(){
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending', compact('orders'));
    }
    public function orderDetails($order_id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('admin.orders.order_details', compact('order', 'orderitem'));
    }
    public function orderConfirmed(){
        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
        return view('admin.orders.confirmed', compact('orders'));
    }
    public function orderProcessing(){
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('admin.orders.processing', compact('orders'));
    }
    public function orderPicked(){
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('admin.orders.picked', compact('orders'));
    }
    public function orderShipped(){
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('admin.orders.shipped', compact('orders'));
    }
    public function orderDelivered(){
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('admin.orders.delivered', compact('orders'));
    }
    public function orderCancelled(){
        $orders = Order::where('status', 'Cancelled')->orderBy('id', 'DESC')->get();
        return view('admin.orders.cancelled', compact('orders'));
    }
    public function pendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Confirmed',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.pending')->with($notification);
    }
    public function confirmToProcess($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Processing',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.confirmed')->with($notification);
    }
    public function processToPick($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Picked',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Picked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.processing')->with($notification);
    }
    public function pickToShip($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Shipped',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Shipped Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.picked')->with($notification);
    }
    public function shipToDeliver($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Delivered',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Delivered Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.shipped')->with($notification);
    }
    public function deliverToCancel($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Cancelled',
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Order Cancelled Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.delivered')->with($notification);
    }
    public function invoiceDownload($order_id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();       
        $pdf = PDF::loadView('admin.orders.invoice', compact('order', 'orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);
        return $pdf->download('invoice'.Carbon::now()->format('dmYhis').'.pdf');
    }
}
