<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class CartController extends Controller
{
    public function AddtoCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $data = array();

        if ($product->discount_price === NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->product_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);

            return Response::json(['success' => 'Product Added to your Cart.']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);
            return Response::json(['success' => 'Product Added to your Cart.']);
        }
    }

    public function CheckCart()
    {
        $content = Cart::content();

        return response()->json($content);
    }
}