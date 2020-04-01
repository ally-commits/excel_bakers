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

Route::get('/', 'HomePageController@index')->name('homePage');
Route::get('/product/{id}', 'HomePageController@getProduct')->name('product');

Auth::routes();

Route::get('/profile/{active}', 'HomeController@index')->name('profile');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('payment', 'PaymentController@eventOrderGen');
Route::post('payment/status', 'PaymentController@paymentCallback');
Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/cart/clear-all', 'CartController@forget')->name('clearAllCart');
Route::get('/cart/increment/{id}', 'CartController@increment')->name('cartIncrement');
Route::get('/cart/decrement/{id}', 'CartController@decrement')->name('cartDncrement');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cartRemove');
Route::post('/edit-profile','HomeController@editProfile')->name('editProfile');
Route::post('/add-address','HomeController@addAddress')->name('addAddress');
Route::get('/del-address/{id}','HomeController@deleteAddress')->name('deleteAddress'); 
Route::get('/profile/{active}/cancel-order/{id}','HomeController@cancelOrder')->name('cancelOrder');
Route::get('/profile/{active}/invoice/{id}','HomeController@invoice')->name('invoice');
Route::get('/profile/{active}/invoice/{id}','HomeController@invoice')->name('invoice');
Route::post('/user/review', 'HomeController@review');

Route::get('/admin', 'ProductController@admin');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/add-product', function() {return view('admin.addProduct');});
    Route::post('/add-product','AdminProductController@addProduct')->name('admin.addProduct');
    Route::post('/update-product','AdminProductController@updateProduct')->name('admin.updateProduct');
    Route::get('/view-product','AdminProductController@viewProduct')->name('admin.viewProduct');
    Route::get('/delete-product/{id}','AdminProductController@deleteProduct')->name('admin.deleteProduct');

    Route::get('/view-users','AdminController@viewUsers')->name('admin.viewUsers');
    Route::get('/view-orders','AdminController@viewOrders')->name('admin.viewOrders');
    Route::get('/view-reviews','AdminController@viewReviews')->name('admin.viewReviews');
    Route::get('/delete-review/{id}','AdminController@del')->name('admin.deleteReview');

    Route::get('/approve-order/{id}','AdminController@approveOrder')->name('admin.approveOrder');
    Route::get('/cancel-order/{id}','AdminController@cancelOrder')->name('admin.cancelOrder');
});
