<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAccept;
class OrderController extends Controller
{
  public function checkout(Request $request) {
    $cart = Session::get('cart');
    $order = new Order;
    $order->cart = serialize($cart); //pakeiciam objekta i stringa
    Auth::user()->orders()->save($order);
    Mail::to($request->user())->send(new OrderAccept($cart));
    Session::forget('cart');
    return redirect()->route('home')->with(['message'=>'Aciu, kad perkat.']);
  }
  public function profile() {
    $orders = Auth::user()->orders();
    $orders->transform(function($order, $key) {
    $order->cart = unserialize($order->cart);
    return $order;
  }    );
  return view('user.profile', compact('orders'));  
}
}
