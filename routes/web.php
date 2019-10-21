<?php

//ADMIN Route

Route::get('/admin/register', function () {
    
    return view('admin.auth.register');
});

Route::match(['get','post'],'/admin/login','AdminController@login')->name('login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    // Route::get('/', function () { return view('admin.home'); });
    Route::get('admin/setting', 'AdminController@setting')->name('setting');
    Route::get('/admin/checkPassword','AdminController@chkPassword');
    Route::post('/admin/changePassword','AdminController@changePassword')->name('changePassword');
    Route::resource('/category','CategoryController');
    Route::resource('/products','ProductController');
    Route::resource('products.productImages','ProductImageController');
    Route::resource('products.productAttributes','ProductAttributeController');
    Route::resource('/coupons','CouponController');
    Route::resource('/banners','BannerController');
});

//User Route
Route::group(['middleware'=> ['frontlogin']] ,function(){
    Route::match(['GET','POST'],'/account','UserController@account');
    Route::post('/update-user-password','UserController@updatepassword');
    Route::get('/user-checkPassword','UserController@checkpassword');
    Route::match(['GET','POST'],'/checkout','CheckoutController@checkout');
});

Route::match(['GET','POST'],'/login-register','UserController@register');
Route::post('/user-login','UserController@login');
Route::get('/user-logout','UserController@logout');


Route::get('/','IndexController@index');
Route::get('/product/{url}','IndexController@products')->name('category.products');
Route::get('/product-details/{id}','IndexController@product')->name('productDetails');
Route::get('/product-size/{id}','IndexController@getSizeFromProduct');

Route::get('/add-cart','IndexController@showCart');
Route::post('/add-cart','IndexController@addToCart');
Route::get('/remove-cart/{id}','IndexController@removeCart');

Route::get('/increase-item-cart/{id}','IndexController@increaseCart');
Route::get('/decrease-item-cart/{id}','IndexController@decreaseCart');
//Apply Coupon
Route::post('/cart/apply-coupon','IndexController@applyCoupon');




