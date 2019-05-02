<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Admin

Auth::routes();

Route::get('/admin/home', 'HomeController@index');
Route::get('/admin/home/{id}/delete', 'HomeController@deleteProduct');

Route::get('/admin/admins', "Admin\AdminController@index");
Route::get('/admin/admins/{id}/delete', "Admin\AdminController@delete");

Route::get('/admin/change-password','HomeController@showChangePasswordForm');
Route::post('/admin/change-password','HomeController@changePassword')->name('changePassword');

Route::get('/admin/category', "Admin\CategoryController@index");
Route::post('/admin/category', "Admin\CategoryController@post");
Route::get('/admin/category/{id}/api', "Admin\CategoryController@api");
Route::get('/admin/category/{id}/delete', "Admin\CategoryController@delete");

Route::get('/admin/sub_category/{id}', "Admin\SubCategoryController@index");
Route::post('/admin/sub_category/{id}', "Admin\SubCategoryController@post");
Route::get('/admin/sub_category/{id}/api', "Admin\SubCategoryController@api");
Route::get('/admin/sub_category/{id}/delete', "Admin\SubCategoryController@delete");

Route::get('/admin/product', "Admin\ProductController@index");
Route::get('/admin/product/{id}/delete', "Admin\ProductController@deleteproduct");
Route::get('/admin/product/product-entry', "Admin\ProductController@productentryindex");
Route::post('/admin/product/product-entry', "Admin\ProductController@productpost");

Route::get('/admin/sub_category/product/{id}', "Admin\ProductController@productindex");
Route::get('/admin/sub_category/product/{id}/delete', "Admin\ProductController@delete");

Route::get('/admin/product-entry/select/{id}', "Admin\ProductController@selectapi");

Route::get('/admin/product-entry/{id}', "Admin\ProductController@entryindex");
Route::post('/admin/product-entry/{id}', "Admin\ProductController@entrypost");
Route::get('/admin/product-entry/{id}/edit', "Admin\ProductController@edit");
Route::post('/admin/product-entry/{id}/edit', "Admin\ProductController@editpost");
Route::get('/admin/product-entry/{id}/editproduct', "Admin\ProductController@editproductentry");
Route::post('/admin/product-entry/{id}/editproduct', "Admin\ProductController@editproduct");
Route::get('/admin/product-entry/{id}/api', "Admin\ProductController@api");

Route::post('/admin/sub_category/{id}', "Admin\SubCategoryController@post");
Route::get('/admin/sub_category/{id}/api', "Admin\SubCategoryController@api");
Route::get('/admin/sub_category/{id}/delete', "Admin\SubCategoryController@delete");


Route::get('/admin/gallery', "Admin\GalleryImageController@index");
Route::post('/admin/gallery', "Admin\GalleryImageController@imagepost");
Route::get('/admin/gallery/{id}/delete', "Admin\GalleryImageController@delete");

Route::get('/admin/carousel', "Admin\CarouselImageController@index");
Route::post('/admin/carousel', "Admin\CarouselImageController@imagepost");
Route::get('/admin/carousel/{id}/delete', "Admin\CarouselImageController@delete");

Route::get('/admin/contact-info', "Admin\ContactInfoController@index");
Route::post('/admin/contact-info', "Admin\ContactInfoController@infopost");

Route::get('/admin/product/{id}/reviews', "Admin\ReviewController@index");
Route::get('/admin/reviews', "Admin\ReviewController@allReviews");
Route::get('/admin/reviews/{id}/new-reviews', "Admin\ReviewController@newReviews");

Route::get('/admin/about-us', "Admin\AboutUsController@index");
Route::post('/admin/about-us', "Admin\AboutUsController@post");

Route::get('/admin/title-image', "Admin\TitleImageController@index");
Route::post('/admin/title-image', "Admin\TitleImageController@post");



// website
Route::get('/', "ProductDisplayController@index");
Route::get('/product/{id}', "ProductDisplayController@productinfo");
Route::post('/product/{id}', "ProductDisplayController@reviewpost");
Route::get('/product/category/{id}', "ProductDisplayController@categoryproducts");
Route::get('/product/sub_category/{id}', "ProductDisplayController@subcategoryproducts");

Route::get('/gallery', "GalleryController@index");

Route::get('/about-us', "AboutUsController@index");














