<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use Illuminate\Support\Str;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
class ProductController extends Controller
{
    public function getIndex(){
        $Products = Product::all();
        return view('shop.index',['Products'=>$Products]);
    }

    public function getAddToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);
        return redirect('/');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shoppingcart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckOut(){
        if(!Session::has('cart')){
            return view('shop.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);
    }

    public function postCheckOut(Request $request){
        if(!Session::has('cart')){
            return redirect('shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_ruN6vJEvaqtmyJ8tJyaeKvDX');
        $request->input('stripeToken');
        try{
            $Charge = Charge::create(array(
                "amount" => $cart->totalPrice*100,
                "currency"=> "usd",
                "source"=> $request->input('stripeToken'),
                "description"=> "Test Charge"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $Charge->id;

            Auth::user()->orders()->save($order);
        }catch (\Exception $e){
            return redirect('checkout')->with('error',$e->getMessage());
        }
        Session::forget('cart');
        return redirect('/')->with('success','Successfully Purchased products！');
    }
}
