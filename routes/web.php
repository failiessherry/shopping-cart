<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','ProductController@getIndex');
Route::get('add-to-cart/{id}','ProductController@getAddToCart');
Route::get('shoppingcart','ProductController@getCart');
Route::get('checkout','ProductController@getCheckOut');
Route::post('checkout','ProductController@postCheckOut');
Route::group(['prefix'=>'user'],function (){
    Route::group(['middleware'=>'guest'],function (){
        Route::get('signup','UserController@getSignup');
        Route::post('signup','UserController@postSignup');
        Route::get('login','UserController@getLogin');
        Route::post('login','UserController@postLogin');
    });
    Route::group(['middleware'=>'auth'],function (){
        Route::get('profile','UserController@getProfile');
        Route::get('logout','UserController@getLogout');
    });
});

