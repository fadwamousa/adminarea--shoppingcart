<?php


Route::get('/admin','DashboardController@index');

Route::resource('products','ProductController');
Route::resource('orders','OrderController');
Route::resource('users','UserController');


Route::get('admin/login','AdminUserController@index');
Route::post('admin/login','AdminUserController@store');
