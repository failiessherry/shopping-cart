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
Route::group(['prefix'=>'user'],function (){
    Route::get('signup','UserController@getSignup');
    Route::post('signup','UserController@postSignup');

    Route::get('profile','UserController@getProfile');
});

