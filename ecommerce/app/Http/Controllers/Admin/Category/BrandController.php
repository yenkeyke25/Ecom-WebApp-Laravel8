<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Brands()
    {

        $brands = Brands::all();

        return view('admin.category.brand', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        //validating data first
        $BrandValidation = $request->validate([
            'brand_name' => 'required | unique:brands|max:255',


        ]);
        // inserting data using query builder
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');


        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $imageUrl = $upload_path . $image_full_name;

            $success = $image->move($upload_path, $image_full_name);
            $data['brand_logo'] = $imageUrl;
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Brand Image has been inserted!',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);
        } else {
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Brand Image done!',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function DeleteBrand($id)
    {

        $brands = DB::table('brands')->where('id', $id)->first();
        $image = $brands->brand_logo;
        unlink($image);

        $data = DB::table('brands')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Selected Brand Deleted Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function EditBrand($id)
    {

        $brands = DB::table('brands')->where('id', $id)->first();


        return view('admin.category.edit_brand', compact('brands'));
    }

    public function UpdateBrand(Request $request, $id)
    {
        // inserting data using query builder
        $data = array();
        $old_image = $request->old_logo;
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');


        if ($image) {
            unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $imageUrl = $upload_path . $image_full_name;

            $success = $image->move($upload_path, $image_full_name);
            $data['brand_logo'] = $imageUrl;
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Brand Image has been inserted!',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);
        } else {
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Brand Image done!',
                'alert-type' => 'success'
            );

            return Redirect()->route('brands')->with($notification);
        }
    }
}