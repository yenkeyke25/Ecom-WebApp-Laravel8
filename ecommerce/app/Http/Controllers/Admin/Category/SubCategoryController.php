<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SubCategory()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();

        return view('admin.category.subcategory', compact('subcategories', 'categories'));
    }

    public function AddSubCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Sub-Category name has been inserted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteSubcategory($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Sub-Category has been Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditSubCategory($id)
    {
        $subcategories = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();

        return view('admin.category.edit_subcategory', compact('subcategories', 'categories'));
    }


    public function UpdateSubCategory(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Sub-Category has been Updated!',
            'alert-type' => 'success'
        );
        return Redirect()->route('sub.categories')->with($notification);
    }
}