<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;

class CartController extends Controller
{
    public function getCart(){
        $data['carts'] = ShoppingCart::all();
        $data['total'] = ShoppingCart::select('cart_price')->sum('cart_total');
        return view('frontend.cart',$data);
    }

    public function postAddCart(Request $req){
        $cart = new ShoppingCart;
        $cart->cart_name = $req->name;
        $cart->cart_price = $req->price;
        $cart->cart_img = $req->img;
        $cart->cart_qty = $req->qty;
        $cart->cart_total = $req->price;
        $cart->cart_prod_id = $req->prod_id;
        $cart->save();
        return back();
    }

    public function getUpdateCart(Request $req){
        $cart = ShoppingCart::find($req->rowID);
        $cart->cart_qty = $req->qty;
        $cart->cart_total = $req->qty * $cart->cart_price;
        $cart->save();
    }

    public function getDeleteCart($id){
        ShoppingCart::destroy($id);
        return back();
    }
    public function getDeleteAllCart(){
        ShoppingCart::truncate();
        return back();
    }


}
