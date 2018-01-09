<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function ajaxAdd(Request $request) {
      $id = $request->id;
      $dish = Dish::findOrFail($id);
      // $request->session()->flush();
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($dish, $id);
      $request->session()->put('cart', $cart);// galima ir taip rasyti Session::put('cart', $cart);
      echo json_encode($cart);// arba  return json_encode($cart);
    }
    public function ajaxFlush() {
      Session::flush();
    }
    public function index() {
      $cart = Session::has('cart') ? Session::get('cart') :null;
      return view('cart.index', compact('cart'));
    }

    public function deleteByOne(Request $request, $id) {
      $oldCart = Session::has('cart') ? Session::get('cart') :null;
      // dd($oldCart);
      $cart = new Cart($oldCart);
      $cart->deleteByOne($id);
      $request->session()->put('cart', $cart);
      return view('cart.index', compact('cart'));
    }
    public function deleteAll(Request $request, $id) {
      $id= $request->id
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $quatity = $cart->deleteAll($id);
      $request->session()->put('cart', $cart);
      return view('cart.index', compact('cart'));
    }
    public function deleteCart(){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->deleteAll();
      $request->session()->forget('cart');
      return view('cart.index', compact('cart'));
    }
}
