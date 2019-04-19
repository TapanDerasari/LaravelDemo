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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('customer', 'CustomerController@index')->name('customer');
Route::get('customer/create', 'CustomerController@create')->name('customer.create');
Route::post('customer/save', 'CustomerController@store')->name('customer.add');
Route::get('customer/list', 'CustomerController@listcustomer')->name('customer.list');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');