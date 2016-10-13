<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
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

}
