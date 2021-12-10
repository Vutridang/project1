<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('Home.layout.app');
});

Route::group(['middleware'=>'is_admin'],function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('category', 'Admin\CategorysController@index')->name('auth.category');
    Route::get('category/add', 'Admin\CategorysController@create')->name('auth.category.create');
    Route::post('category/add', 'Admin\CategorysController@store')->name('auth.category.create.post');
    Route::get('category/{id}', 'Admin\CategorysController@detail')->name('auth.category.detail');
    Route::post('category/{id}', 'Admin\CategorysController@update')->name('auth.category.update');
    Route::post('category/delete/{id}', 'Admin\CategorysController@delete')->name('auth.category.delete');

    Route::get('user', 'Admin\UsersController@index')->name('admin.user');
    Route::get('user/search', 'Admin\UsersController@search')->name('admin.user.search');
    Route::get('user/add', 'Admin\UsersController@create')->name('admin.user.create');
    Route::post('user/add', 'Admin\UsersController@store')->name('admin.user.create.post');
    Route::get('user/edit/{id}', 'Admin\UsersController@detail')->name('admin.user.edit');
    Route::post('user/edit/{id}', 'Admin\UsersController@update')->name('admin.user.update');
    Route::post('user/delete/{id}', 'Admin\UsersController@delete')->name('admin.user.delete');

    Route::get('customer', 'Admin\CustomersController@index')->name('admin.customer');
    Route::get('customer/search', 'Admin\CustomersController@search')->name('admin.customer.search');
    Route::post('customer/delete/{id}', 'Admin\CustomersController@delete')->name('admin.customer.delete');

    Route::get('product', 'Admin\ProductController@index')->name('admin.product');
    Route::get('product/search', 'Admin\ProductController@search')->name('admin.product.search');
    Route::get('product/add', 'Admin\ProductController@add')->name('admin.product.add');
    Route::post('product/add', 'Admin\ProductController@store')->name('admin.product.add.store');

    Route::get('product/edit/{id}', 'Admin\ProductController@detail')->name('admin.product.edit');
    Route::post('product/edit/{id}', 'Admin\ProductController@update')->name('admin.product.edit.post');

     Route::post('product/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');

     Route::get('order', 'Admin\OrderController@index')->name('admin.order');
     Route::get('order/search', 'Admin\OrderController@search')->name('admin.order.search');
     Route::get('order/confirm/{id}', 'Admin\OrderController@confirm')->name('admin.order.confirm');

     Route::get('order/detail/{id}', 'Admin\OrderController@detail')->name('admin.order.detail');
});

Route::get('login', 'Admin\AuthController@index')->name('auth.login.get');
Route::post('login', 'Admin\AuthController@postLogin')->name('auth.login.post');
Route::get('logout', 'Admin\AuthController@logOut')->name('auth.logout.get');