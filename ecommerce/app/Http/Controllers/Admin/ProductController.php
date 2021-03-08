<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AddProducts()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();

        return view('admin.products.add_products', compact('categories', 'brands'));
    }

    public function AllProducts()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();

        // return response()->json($product);
        return view('admin.products.all_products', compact('products'));
    }

    public function getSubCategory($category_id)
    {
        $subcategories = DB::table('subcategories')->where('category_id', $category_id)
            ->get();

        return json_encode($subcategories);
    }

    public function StoringProducts(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['discount_price'] = $request->discount_price;

        $data['product_quantity'] = $request->product_quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['product_price'] = $request->product_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['trend'] = $request->trend;
        $data['best_rated'] = $request->best_rated;

        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['byone_getone'] = $request->byone_getone;

        $data['status'] = 1;
        $image1 = $request->image_one;
        $image2 = $request->image_two;
        $image3 = $request->image_three;

        // return response()->json($data);
        if ($image1 && $image2 && $image3) {
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(300, 300)->save('public/media/products/' . $image1_name);
            $data['image_one'] = 'public/media/products/' . $image1_name;

            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(300, 300)->save('public/media/products/' . $image2_name);
            $data['image_two'] = 'public/media/products/' . $image2_name;

            $image3_name = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->resize(300, 300)->save('public/media/products/' . $image3_name);
            $data['image_three'] = 'public/media/products/' . $image3_name;

            $product = DB::table('products')->insert($data);

            $notification = array(
                'message' => 'Product inserted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function InactiveProduct($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product successfully change to inactive!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function ActiveProduct($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product successfully change to active!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $products = DB::table('products')->where('id', $id)->first();
        $image1 = $products->image_one;
        $image2 = $products->image_two;
        $image3 = $products->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        DB::table('products')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Product deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //show products method

    public function ShowProducts($id)
    {
        $viewProducts = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'subcategories.subcategory_name')
            ->where('products.id', $id)->first();
        return view('admin.products.show_products', compact('viewProducts'));


        //return response()->json($viewProducts);
    }

    public function EditProducts($id)
    {
        $products = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')->get();



        return view('admin.products.edit_products', compact('products', 'categories', 'brands', 'subcategories'));
    }

    public function NoPhotoProductsUpdate(Request $request, $id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['product_price'] = $request->product_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['trend'] = $request->trend;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['byone_getone'] = $request->byone_getone;

        $update = DB::table('products')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'message' => 'Product Updated Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.products')->with($notification);
        } else {
            $notification = array(
                'message' => 'Products details not Updated!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.products')->with($notification);
        }
    }

    //update product with photo

    public function UpdateProductsPhoto(Request $request, $id)
    {
        // inserting data using query builder
        $data = array();
        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $image1 = $request->file('image_one');
        $image2 = $request->file('image_two');
        $image3 = $request->file('image_three');



        if ($image1) {
            unlink($old_one);

            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image1->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/products/';
            $imageUrl = $upload_path . $image_full_name;

            $success = $image1->move($upload_path, $image_full_name);
            $data['image_one'] = $imageUrl;
            $products = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Products Image has been updated!',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.products')->with($notification);
        }
        if ($image2) {
            unlink($old_two);

            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image2->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/products/';
            $imageUrl = $upload_path . $image_full_name;

            $success = $image2->move($upload_path, $image_full_name);
            $data['image_two'] = $imageUrl;
            $products = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Products Image has been updated!',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.products')->with($notification);
        }
        if ($image3) {
            unlink($old_three);

            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image3->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/products/';
            $imageUrl = $upload_path . $image_full_name;

            $success = $image3->move($upload_path, $image_full_name);
            $data['image_three'] = $imageUrl;
            $products = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Products Image has been updated!',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.products')->with($notification);
        }
    }
}