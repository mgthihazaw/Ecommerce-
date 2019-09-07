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
});

//User Route
Route::get('/','IndexController@index');
Route::get('/product/{url}','IndexController@products')->name('category.products');
Route::get('/product-details/{id}','IndexController@product')->name('productDetails');
Route::get('/product-size/{id}','IndexController@getSizeFromProduct');


