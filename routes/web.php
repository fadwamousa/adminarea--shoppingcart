<?php

Route::group(['prefix'=>'admin'],function(){

  Route::group(['middleware'=>'auth:admin'],function(){

    Route::get('/','DashboardController@index');

    Route::resource('products','ProductController');
    Route::resource('orders','OrderController');
    Route::resource('users','UserController');

    //Admin Logout
    Route::get('logout','AdminUserController@logout');

  });
  //Admin routes

  Route::get('/login','AdminUserController@index');
  Route::post('/login','AdminUserController@store');

});


//Front Layouts routes
Route::get('/front','Front\HomeController@index');
