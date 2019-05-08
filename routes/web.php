<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','DashboardController@index');

Route::resource('products','ProductController');
