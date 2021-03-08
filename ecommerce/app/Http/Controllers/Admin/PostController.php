<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Blogcategory()
    {
        $blogCategory = DB::table('post_category')->get();

        return view('admin.blogs.category.index', compact('blogCategory'));
    }

    public function AddBlog(Request $request)
    {
        $validateBlog = $request->validate([
            'category_name_in' => 'required| max:255',
            'category_name_en' => 'required| max:255'

        ]);

        $data = array();
        $data['category_name_in'] = $request->category_name_in;
        $data['category_name_en'] = $request->category_name_en;

        DB::table('post_category')->insert($data);

        $notification = array(
            'message' => 'Blog category inserted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteBlog($id)
    {
        DB::table('post_category')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Blog category Deleted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditBlog($id)
    {
        $editBlogs = DB::table('post_category')->where('id', $id)->first();

        return view('admin.blogs.category.edit', compact('editBlogs'));
    }



    public function UpdateBlog(Request $request, $id)
    {

        $data = array();
        $data['category_name_in'] = $request->category_name_in;
        $data['category_name_en'] = $request->category_name_en;

        DB::table('post_category')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Blog category edited successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('add.blog.categorylist')->with($notification);
    }


    public function AddBlogPost()
    {
        $blogCategories = DB::table('post_category')->get();
        return view('admin.blogs.addBlog', compact('blogCategories'));
    }

    public function AllBlogPost()
    {
        $posts = DB::table('posts')
            ->join('post_category', 'posts.category_id', 'post_category.id')
            ->select('posts.*', 'post_category.category_name_en')
            ->get();

        // return response()->json($post);
        return view('admin.blogs.allBlog', compact('posts'));
    }
    public function StorePost(Request $request)
    {

        $validatePost = $request->validate([

            'post_title_in' => 'required| max:255',
            'post_title_en' => 'required| max:255',
        ]);
        $data = array();

        $data['post_title_in'] = $request->post_title_in;
        $data['post_title_en'] = $request->post_title_en;
        $data['category_id'] = $request->category_id;
        $data['details_in'] = $request->detail_in;
        $data['details_en'] = $request->detail_en;


        $post_image = $request->file('post_image');
        if ($post_image) {
            $image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('public/media/posts/' . $image_name);
            $data['image'] = 'public/media/posts/' . $image_name;

            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post inserted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $data['post_image'] = '';
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post inserted successfully with no image!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function DeletePost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;
        unlink($image);
        DB::table('posts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Post Deleted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditPost($id)
    {
        $post =  DB::table('posts')->where('id', $id)->first();
        $catPosts = DB::table('post_category')->get();

        return view('admin.blogs.editBlog', compact('post', 'catPosts'));
    }

    public function UpdatePosts(Request $request, $id)
    {
        $data = array();

        $data['post_title_in'] = $request->post_title_in;
        $data['post_title_en'] = $request->post_title_en;
        $data['category_id'] = $request->category_id;
        $data['details_in'] = $request->detail_in;
        $data['details_en'] = $request->detail_en;

        $old_image = $request->old_image;
        $post_image = $request->file('post_image');
        if ($post_image) {
            unlink($old_image);
            $image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('public/media/posts/' . $image_name);
            $data['image'] = 'public/media/posts/' . $image_name;

            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post updated successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        } else {
            $data['image'] = $old_image;
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post inserted successfully with no image!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        }
    }
}