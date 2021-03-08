<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $categories = Category::all();

        return view('admin.category.category', compact('categories'));
    }

    public function AddCategory(Request $request)
    {
        //validating data first
        $Datavalidation = $request->validate([
            'category_name' => 'required | unique:categories|max:255',

        ]);
        // inserting data using query builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // DB::table('categories')->insert($data);

        //inserting data using ORM also insert the date and time 
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        $notification = array(
            'message' => 'New category name has been inserted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category is deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Editcategory($id)
    {
        $deleteCategory = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('deleteCategory'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        //validating data first
        $Datavalidation = $request->validate([
            'category_name' => 'required|max:255',

        ]);
        $data = array();
        $data['category_name'] = $request->category_name;

        $updateCategory = DB::table('categories')->where('id', $id)->update($data);
        if ($updateCategory) {
            $notification = array(
                'message' => 'Category name Updated!',
                'alert-type' => 'success'
            );
            return Redirect()->route('categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing was Updated!',
                'alert-type' => 'warning'
            );
            return Redirect()->route('categories')->with($notification);
        }
    }
}