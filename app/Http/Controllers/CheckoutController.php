<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipdivision;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //-------------------CHECKOUT------------------------------//
    public function checkoutView()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $shipdivision = Shipdivision::orderBy('division_name', 'ASC')->get();
                return view('checkout_view', compact('carts', 'cartQty', 'cartTotal', 'shipdivision'));
            } else {
                $notification = array(
                    'message' => 'Add At Least One Product To Cart!',
                    'alert-type' => 'error'
                );
                return Redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please Login To Checkout!',
                'alert-type' => 'error'
            );
            return Redirect()->route('login')->with($notification);
        }
    }
    public function checkout_process(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data["shipping_name"] = $request->shipping_name;
        $data["shipping_email"] = $request->shipping_email;
        $data["shipping_phone"] = $request->shipping_phone;
        $data["post_code"] = $request->post_code;
        $data["division_id"] = $request->division_id;
        $data["district_id"] = $request->district_id;
        $data["state_id"]  = $request->state_id;
        $data["notes"] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_method == "stripe") {
            return view('stripe_payment', compact('data', 'cartTotal'));
        } else if ($request->payment_method == "card") {
            return view('card_payment', compact('data', 'cartTotal'));
        } else if ($request->payment_method == "cash") {
            return view('cash_payment', compact('data', 'cartTotal'));
        }
    }

    //-------------------CHECKOUT------------------------------//
    public function stripePay(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = Cart::total();
        }
        \Stripe\Stripe::setApiKey('sk_test_51JwkalSEqHOWfRwCKKhz31WWUVSbzdTZ3PxflY6yvXvkMfh4z5MqXp08TNC9urRctSeaVA54Ot6lpaqPSR3Scr4F00jidrsoyf');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'inr',
            'description' => 'Easy Online Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now()
        ]);
        $carts = Cart::content();
        foreach ($carts as $cartItem) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cartItem->id,
                'color' => $cartItem->options->color,
                'size' => $cartItem->options->size,
                'qty' => $cartItem->qty,
                'price' => $cartItem->price,
                'created_at' => Carbon::now()
            ]);
        }
        $order_data = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $order_data->invoice_no,
            'amount' => $order_data->amount,
            'name' => $order_data->name,
            'email' => $order_data->email
        ];
        Mail::to($request->email)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Placed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('dashboard')->with($notification);
    }
    public function cashPay(Request $request){
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = Cart::total();
        }
     
        // dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',
            'currency' => 'INR',
            'amount' => $total_amount,

            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now()
        ]);
        $carts = Cart::content();
        foreach ($carts as $cartItem) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cartItem->id,
                'color' => $cartItem->options->color,
                'size' => $cartItem->options->size,
                'qty' => $cartItem->qty,
                'price' => $cartItem->price,
                'created_at' => Carbon::now()
            ]);
        }
        $order_data = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $order_data->invoice_no,
            'amount' => $order_data->amount,
            'name' => $order_data->name,
            'email' => $order_data->email
        ];
        Mail::to($request->email)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Placed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('dashboard')->with($notification);
    }
}
