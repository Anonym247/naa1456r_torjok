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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'categories'] , function () {
    Route::get('/{id}', 'CategoryController@nextLevel');
    Route::get('/delete/{id}', 'CategoryController@destroy');
    Route::post('/', 'CategoryController@create')->name('create_category');
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/{id}', 'ArticleController@getArticleById');
    Route::get('/delete/{id}', 'ArticleController@destroy');
    Route::post('/add/{category_id}', 'ArticleController@create');
});

Route::post('settings', 'ApplicationController@setConfiguration')->name('configure');
