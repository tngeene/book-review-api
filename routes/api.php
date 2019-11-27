<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('auth/register', 'AuthController@register');

Route::post('auth/login', 'AuthController@login');
Route::group(['middleware'=>'jwt.auth'], function(){
    Route::get('auth/user','AuthController@user');
    Route::get('auth/logout', 'AuthController@logout');
});
Route::group(['middleware'=>'jwt.refresh'],function(){
    Route::get('auth/refresh','AuthController@refresh');
});

Route::get('user', 'AuthController@getAuthUser');



// Books

Route::apiResource('books', 'BookController');
Route::apiResource('posts', 'PostController');

// Ratings

Route::post('books/{book}/ratings', 'RatingController@store')->middleware('auth:api');


