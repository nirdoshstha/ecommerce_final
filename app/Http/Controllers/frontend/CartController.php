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
        return redirect(route('cart.index'))->with('status','Successfully Added into the cart.');
    }


    public function cartUpdate(){
        $cart = Cart::where('user_id',auth()->user()->id)
        ->where('product_id',request('product_id'))
        ->first();

        $grand_total =  $cart->product->offer_price * request('quantity');

        $cart->update(['quantity' => request('quantity')]);

        $cart->update(['total_amount' => $grand_total]);

        $sub_total = auth()->user()->carts()->sum('total_amount');

        return response()->json(['sub_total' => $sub_total]);
    }

    public function cartDelete(){
        $cart = Cart::where('user_id',auth()->id())
        ->where('product_id',request('product_id'))
        ->first();

        $cart->delete();
        $sub_total = auth()->user()->carts()->sum('total_amount');

        return response()->json(['sub_total' => $sub_total]);
    }



}
