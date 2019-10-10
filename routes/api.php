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

Route::post('register', 'AuthController@register');

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('user', 'AuthController@getAuthUser');



// Books

Route::apiResource('books', 'BookController');
Route::post('books','BookController@store');
Route::apiResource('posts', 'PostController');

// Ratings

Route::post('books/{book}/ratings', 'RatingController@store')->middleware('auth:api');


