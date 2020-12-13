<?php

use Illuminate\Support\Facades\Route;

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
//Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');


//Users
Route::get('/login', 'LoginController@login');
Route::get('/sign-up', 'LoginController@sign_up');
Route::post('/Dang-nhap', 'LoginController@postlogin');
Route::post('/Dang-ki', 'LoginController@postregister');
Route::get('/log-out', 'LoginController@logout');

//Danh mục
Route::get('/danh-muc/{id}', 'PagesController@category_child');
Route::get('/mobile/{slug}', 'PagesController@mobile_brand');
Route::get('/laptop/{slug}', 'PagesController@mobile_brand');
Route::get('/pc/{slug}', 'PagesController@mobile_brand');
Route::get('chi-tiet-san-pham/{id}', 'PagesController@pro_details')->name('chi-tiet');
Route::get('search','PagesController@search');




//***Backend***
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//Ajax
Route::post('/search-ajax', 'AjaxController@search_ajax');
Route::post('/search-ajax-index', 'AjaxController@search_ajax_index');






//Category
Route::get('/add-category', 'CategoryController@add_category');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');
Route::get('/delete-category/{id}', 'CategoryController@delete_category');
Route::post('/update-category/{id}', 'CategoryController@update_category');
Route::get('/danh-muc-con/{id}', 'CategoryController@danh_muc');


//brand
Route::get('/add-brand', 'BrandController@add_brand');
Route::get('/all-brand', 'BrandController@all_brand');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/edit-brand/{slug}', 'BrandController@edit_brand');
Route::get('/delete-brand/{slug}', 'BrandController@delete_brand');
Route::post('/update-brand/{id}', 'BrandController@update_brand');
Route::get('/san-pham-thuong-hieu/{id}', 'BrandController@danh_muc');
//Customer
Route::get('/all-customer', 'CustomerController@all_customer');


//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/edit-product/{pro_slug}', 'ProductController@edit_product');
Route::get('/delete-product/{pro_slug}', 'ProductController@delete_product');
Route::post('/update-product/{pro_slug}', 'ProductController@update_product');
Route::get('/detail-products/{pro_slug}', 'ProductController@detail_products');
Route::get('/add-detail-products','ProductController@add_detail_products');
Route::post('/save-detail-product', 'ProductController@save_detail_product');

//Order
Route::get('/all-order', 'OrderController@all_order');
Route::get('active/{id}', 'OrderController@active');
Route::get('/delete-order/{id}', 'OrderController@delete_order');
Route::get('/detail-order/{order_id}', 'OrderController@detail_order');

//Cart

Route::post('/add-cart-ajax', 'CartController@add_cart_ajax')->name('ajax');
Route::get('/show-cart', 'CartController@cart');
Route::post('/update-cart-ajax', 'CartController@update_cart');
Route::get('/delete-cart/{session_id}', 'CartController@delete_cart');
Route::get('/delete-all-ajax', 'CartController@delete_all_cart');
Route::get('checkout', 'CheckoutController@checkout');
Route::post('check-out', 'CheckoutController@check_out');

