<?php


Route::get('/admin','DashboardController@index');

Route::resource('products','ProductController');
Route::resource('orders','OrderController');
