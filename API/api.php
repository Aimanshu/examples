<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('posts', 'API\PostAPIController');

Route::get('posts', 'API\PostAPIController@index');
Route::get('posts/{article}', 'API\PostAPIController@show');
Route::post('posts', 'API\PostAPIController@store');
Route::put('posts/{article}', 'API\PostAPIController@update');
Route::delete('posts/{article}', 'API\PostAPIController@delete');


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});