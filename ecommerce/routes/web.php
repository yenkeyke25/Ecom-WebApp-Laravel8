<?php

use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\NewsLetter\NewsLetterController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
        return view('pages.index');
});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Password/Change', 'AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update', 'AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin section for routes
// categories route
Route::get('admin/categories', [CategoryController::class, 'category'])->name('categories');
// add category name route
Route::post('admin/add/categories', [CategoryController::class, 'AddCategory'])->name('add.category');
// delete category route 
Route::get('delete/category/{id}', [CategoryController::class, 'DeleteCategory']);
// edit category route 
Route::get('edit/category/{id}', [CategoryController::class, 'EditCategory']);

// update category route 
Route::post('update/category/{id}', [CategoryController::class, 'UpdateCategory']);

//Brands routes
//brands route 
Route::get('admin/brands', [BrandController::class, 'Brands'])->name('brands');

// add brand name route
Route::post('admin/add/brand', [BrandController::class, 'AddBrand'])->name('add.brand');
// delete brand route 
Route::get('delete/brand/{id}', [BrandController::class, 'DeleteBrand']);

// edit brand route 
Route::get('edit/brand/{id}', [BrandController::class, 'EditBrand']);
// update brand route 
Route::post('update/brand/{id}', [brandController::class, 'UpdateBrand']);


// Sub Categories route
// getsub sub-category route 
Route::get('admin/sub/category', [SubCategoryController::class, 'SubCategory'])->name('sub.categories');


// add subcategory name route
Route::post('admin/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

// delete subcategory route 
Route::get('delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory']);
// edit subcategory route 
Route::get('edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory']);

// update subcategory route 
Route::post('update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory']);

//Coupons route
Route::get('update/subcategory/coupon', [CouponController::class, 'Coupons'])->name('admin.coupons');
// add coupon route
Route::post('admin/add/coupons', [CouponController::class, 'AddCoupons'])->name('add.coupon');
// delete coupon route 
Route::get('delete/coupon/{id}', [CouponController::class, 'DeleteCoupon']);
// edit coupon route 
Route::get('edit/coupon/{id}', [CouponController::class, 'EditCoupon']);
// update coupon route 
Route::post('update/coupon/{id}', [CouponController::class, 'UpdateCoupon']);

//newsLetter route
Route::get('admin/newsletters', [NewsLetterController::class, 'NewsLetters'])->name('admin.newsletter');

//FrontEnd Route
Route::post('add/subscriptions/newsletters', [FrontEndController::class, 'AddNews'])->name('add.newsletter');
//delete newsletters subscribers
Route::get('delete/subcribers/{id}', [FrontEndController::class, 'DeleteSubscribers']);

//Products Routes starts
Route::get('admin/products/all', [ProductController::class, 'AllProducts'])->name('all.products');
Route::get('admin/products/add', [ProductController::class, 'AddProducts'])->name('add.products');
Route::post('admin/add/products', [ProductController::class, 'StoringProducts'])->name('store.products');

//get all subcategory with ajax call 
Route::get('get/subcategory/{category_id}', [ProductController::class, 'getSubCategory']);

//active and incative route to display and hide product
Route::get('inactive/products/{id}', [ProductController::class, 'InactiveProduct']);
Route::get('active/products/{id}', [ProductController::class, 'ActiveProduct']);

//delete product from all product table
Route::get('delete/products/{id}', [ProductController::class, 'DeleteProduct']);

//view product in admin table 
Route::get('show/products/{id}', [ProductController::class, 'ShowProducts']);
//edit product route
Route::get('edit/products/{id}', [ProductController::class, 'EditProducts']);

//update products with no photos route
Route::post('update/products/withnophoto/{id}', [ProductController::class, 'NoPhotoProductsUpdate']);

//update products with no photos route
Route::post('update/products/photos/{id}', [ProductController::class, 'UpdateProductsPhoto']);
// Blogs route
Route::get('blog/category/list', [PostController::class, 'BlogCategory'])->name('add.blog.categorylist');
//add blog route
Route::post('admin/add/blog', [PostController::class, 'AddBlog'])->name('add.blog.category');

//delete blog route
Route::get('delete/blog/{id}', [PostController::class, 'DeleteBlog']);
//edit blog route
Route::get('edit/blog/{id}', [PostController::class, 'EditBlog']);

// update blog cat route
Route::post('update/blogs/category/{id}', [PostController::class, 'UpdateBlog']);

// Blogs route
Route::get('admin/add/post', [PostController::class, 'AddBlogPost'])->name('add.blogpost');
//add blog route// Blogs route
Route::get('admin/all/post', [PostController::class, 'AllBlogPost'])->name('all.blogpost');
//sotre the data for post route
Route::post('admin/store/post', [PostController::class, 'StorePost'])->name('store.posts');

//delete post route 
Route::get('delete/post/{id}', [PostController::class, 'DeletePost']);
//edit post 
Route::get('edit/post/{id}', [PostController::class, 'EditPost']);

//update post 
Route::post('update/posts/{id}', [PostController::class, 'UpdatePosts']);

// delcaring wishlist route 
Route::get('add/wishlist/{id}', [WishListController::class, 'AddWishList']);

// delcaring route add to cart route 
Route::get('add/addtocart/{id}', [CartController::class, 'AddtoCart']);
Route::get('checkcart', [CartController::class, 'CheckCart']);