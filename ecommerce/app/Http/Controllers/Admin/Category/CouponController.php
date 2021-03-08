<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupons()
    {
        $coupons = DB::table('coupons')->get();

        return view('admin.coupons.coupon', compact('coupons'));
    }

    public function AddCoupons(Request $request)
    {
        $coupons = $request->validate([
            'coupon' => 'required | unique:coupons| max:255',


        ]);

        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;

        DB::table('coupons')->insert($data);
        $notification = array(
            'message' => 'Coupon has been inserted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function DeleteCoupon($id)
    {

        DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Coupon has been Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id)
    {

        $CouponData = DB::table('coupons')->where('id', $id)->first();

        return view('admin.coupons.edit_coupon', compact('CouponData'));
    }

    public function UpdateCoupon(Request $request, $id)
    {
        //validating data first
        $Datavalidation = $request->validate([
            'coupon' => 'required|max:255',

        ]);
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;

        DB::table('coupons')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Coupon has been Updated!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.coupons')->with($notification);
    }
}