<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function getIndex(){
        $Products = Product::all();
        return view('shop.index',['Products'=>$Products]);
    }
}
