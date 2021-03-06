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
Route::get('/','Front\HomeController@index');

Route::get('user/login','Front\SessionsController@index');
Route::post('user/login','Front\SessionsController@store');
Route::get('user/logout','Front\SessionsController@logout');
Route::get('user/register','Front\RegisterController@index');
Route::post('user/register','Front\RegisterController@store');

Route::get('/user/profile','Front\ProfileController@index');
Route::get('/user/order/{id}','Front\ProfileController@show');
Route::get('/cart','Front\CartController@index');
Route::post('/cart','Front\CartController@store')->name('cart');

//this is remove all cart items in the website
Route::get('empty',function(){
  Cart::instance('default')->destroy();
});
Route::delete('/cart/remove/{product}','Front\CartController@destroy');
Route::post('/cart/savelater/{product}','Front\CartController@savelater');

Route::delete('/save/remove/{product}','Front\SaveController@remove');

Route::post('/cart/move/{product}','Front\SaveController@move');
Route::get('checkout','CheckoutController@index');
Route::post('checkout','CheckoutController@store')->name('checkout');
