<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class WishListController extends Controller
{

    public function AddWishList($id)
    {


        // adding wishlist with ajax call for preventing the page to relaod

        $user_id = Auth::id();
        $check_wishlist = DB::table('wishlists')
            ->where('user_id', $user_id)->where('product_id', $id)
            ->first();
        $data = array(
            'user_id' => $user_id,
            'product_id' => $id
        );

        if (Auth::check()) {
            if ($check_wishlist) {

                return Response::json(['error' => 'product is already in your wishlist.']);
            } else {
                DB::table('wishlists')->insert($data);
                return Response::json(['success' => 'product Added to your WishList.']);
            }
        } else {
            return Response::json(['error' => 'Please Login first into your Account']);
        }
    }
}