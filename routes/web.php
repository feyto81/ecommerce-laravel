<?php
use RealRashid\SweetAlert\Facades\Alert;
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
//frontend site
Route::get('/','HomeController@index');




//show category wise producthere
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');


//cart routes are here---
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');


//checkout routes are here===
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');

//customer login and logout are here---------------------
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout');

Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');
Route::get('/success-order/{order_id}','CheckoutController@success_order');
Route::get('/pending-order/{order_id}','CheckoutController@pending_order');


Route::get('/product/search','ProductController@cari')->name('product');






//Backend Site ....................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin_dashboard','AdminController@dashboard');

//Category related route
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');


//manufacture or brands routes are here

Route::get('/add-manufacture','ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');


//Product routes are here
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::post('/search-products','ProductController@search');


//Slider routes are here
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/edit-slider/{slider_id}','SliderController@edit_slider');
Route::post('/update-slider/slider_id}','SliderController@update_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');

//Profile
Route::get('/order','ProfileController@orders');
Route::get('/password/{id}','ProfileController@password');
Route::put('/updatePassword','ProfileController@updatepassword');

Route::get('/contact-us','HomeController@contact_us');
Route::post('/save-contact','HomeController@save_contact');
Route::get('/contact_customer','ContactController@contactscustomer');
Route::get('/delete-contact/{id}','ContactController@delete_contact');

Route::get('/customer-data','CustomerController@customer');
Route::get('/delete-customer/{customer_id}','CustomerController@delete_customer');

Route::get('/admin-data','AdminController@admin_data');
Route::get('/delete-admin/{admin_id}','AdminController@delete_admin');
Route::get('/add-admin','AdminController@add_admin');
Route::post('/save-admin','AdminController@save_admin');

Route::post('/save-subcriber','HomeController@save_subcriber');
Route::get('/subcriber-data','AdminController@subcriber_data');
Route::get('/edit-subcriber/{id}','AdminController@edit_subcriber');
Route::post('/update-subcriber/{id}','AdminController@update_subcriber');
Route::get('/delete-subcriber/{id}','AdminController@delete_subcriber');

Route::get('/setting-data','SettingController@setting_data');
Route::get('/edit-setting/{id}','SettingController@edit_setting');
Route::post('/update-setting/{id}','SettingController@update_setting');
Route::get('/delete-setting/{id}','SettingController@delete_setting');

Route::get('/api','CheckoutController@getBalance');