<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){
        $data['cart'] = Cart::all();
        return view('frontend.cart.index',compact('data'));
    }


    public function addToCart(Request $request){ 
        $product = Product::where('id',$request->product_id)->first(); 
        $cart = Cart::create([
            'product_id'    =>request('product_id'),
            'user_id'       =>auth()->user()->id,
            'quantity'      =>request('quantity'),
            'price'         =>$product->offer_price,
            'total_amount'  =>$product->offer_price*request('quantity'),
        ]);
        // return back();
        return redirect(route('cart.index'))->with('status','Successfully Added into the cart.');
        // return redirect()->route('product.cart')->with('status','Successfully Added into the cart.');
        

    }
}
