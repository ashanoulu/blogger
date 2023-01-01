<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
Route::group(['prefix' => 'v1', 'middleware' => ['jwt.auth']], function () {
    Route::get('categories', 'BlogController@getCategories');
    Route::get('age-groups/{category_id}', 'BlogController@getAgeGroup');
    Route::post('new-post', 'BlogController@addBlogPost');
    Route::get('posts', 'BlogController@getAllPost');
    Route::get('posts/{user_id}', 'BlogController@getAllPost');
    Route::get('post/{post_id}', 'BlogController@getPost');
    Route::get('post/{post_id}/{mode}', 'BlogController@getPost');
    Route::delete('post/{post_id}', 'BlogController@deletePost');
    Route::put('post/{post_id}', 'BlogController@addBlogPost');
});

