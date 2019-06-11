<?php

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

/**
 * @author: TruongTC
 * @desc: Group Router Admin CP
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    /**
     * ---------------------------USER----------------------------------------------------------------------------------
     */
    // View List User
    Route::get('users.tct', 'UserController@index')->name('user.show');
    // Delete User By ID
    Route::get('delete-user.tct/{id}', 'UserController@delete')->name('user.delete');
    // Edit User By ID
    Route::get('edit-user.tct/{id}', 'UserController@getUserByID')->name('user.getUserByID');
    Route::post('edit-user.tct/{id}', 'UserController@editUserByID')->name('user.editUserByID');
    // Add User
    Route::get('add-user.tct', function(){
        // Tạo view cho trang thêm người dùng
        return view('admin.user.add_user');
    })->name('user.getAddUser');
    Route::post('add-user.tct', 'UserController@addUser')->name('user.addUser');
    /**
     * ---------------------------PRODUCT TYPE--------------------------------------------------------------------------
     */
    // View List Product Type
    Route::get('product-types.tct', 'ProductTypeController@index')->name('product_type.show');
    // Add product_type
    Route::get('add-product-type.tct', function(){
        //Tạo view trang thêm loại sản phẩm
        return view('admin.product_type.add');
    })->name('product_type.create');
    Route::post('add-product-type.tct', 'ProductTypeController@store')->name('product_type.store');
    // Edit product type
    Route::get('edit-product-type.tct/{id}', 'ProductTypeController@show')->name('product_type.edit');
    Route::post('edit-product-type.tct/{id}', 'ProductTypeController@update')->name('product_type.update');
    // Delete product type
    Route::get('delete-product-type.tct/{id}', 'ProductTypeController@destroy')->name('product_type.destroy');
    /**
     * ---------------------------PRODUCT-------------------------------------------------------------------------------
     */
    // Show all product
    Route::get('products.tct', 'ProductController@index')->name('product.index');
    // Add product
    Route::get('add-product.tct', 'ProductController@add')->name('product.add');
    Route::post('add-product.tct', 'ProductController@store')->name('product.store');
    // Edit product
    Route::get('edit-product.tct/{id}', 'ProductController@show')->name('product.show');
    Route::post('edit-product.tct/{id}', 'ProductController@update')->name('product.update');
    // Delete product
    Route::get('delete-product.tct/{id}', 'ProductController@destroy')->name('product.destroy');
    /**
     * ---------------------------PRODUCT DETAILS-----------------------------------------------------------------------
     */
    // Show all product details
    Route::get('product.tct/{id}', 'ProductDetailController@index')->name('product_detail.index');
    // Add product detail
    Route::get('add-product-detail.tct/{id}', 'ProductDetailController@create')->name('product_detail.add');
    Route::post('add-product-detail.tct/{id}', 'ProductDetailController@store')->name('product_detail.store');
    // Edit product detail
    Route::get('edit-product-detail.tct/{id}', 'ProductDetailController@show')->name('product_detail.show');
    Route::post('edit-product-detail.tct/{id}', 'ProductDetailController@update')->name('product_detail.update');
    // Delete product detail
    Route::get('delete-product-detail.tct/{id}', 'ProductDetailController@destroy')->name('product_detail.destroy');

    /**
     * ----------------------------PRODUCT IMAGE------------------------------------------------------------------------
     */
    // Show all product image
    Route::get('product-image.tct/{id}', 'ProductImageController@index')->name('product_image.index');
    // Add product image
    Route::get('add-product-image.tct/{id}', 'ProductImageController@create')->name('product_image.add');
    Route::post('add-product-image.tct/{id}', 'ProductImageController@store')->name('product_image.store');
    // Edit product detail
    Route::get('edit-product-image.tct/{id}', 'ProductImageController@show')->name('product_image.show');
    Route::post('edit-product-image.tct/{id}', 'ProductImageController@update')->name('product_image.update');
    // Delete product detail
    Route::get('delete-product-image.tct/{id}', 'ProductImageController@destroy')->name('product_image.destroy');
});

/**
 * --------------------------------CLIENT----------------------------------------------------------------------------
 */
// Show all product to homepage
Route::get('/', 'HomePageController@index')->name('home_page');
// Display products by category
Route::get('{slug}','HomePageController@showProductsByCategory')->name('category');
// View info product
Route::get('product/{slug}', 'HomePageController@showProduct')->name('product');

