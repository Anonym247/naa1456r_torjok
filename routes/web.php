<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/start', 'CategoryController@index')->name('motion');
Route::get('/', function () { return view('home');})->name('home');
Route::get('/manage', 'ContentController@index')->name('manage');
Route::get('/manage/{id}', 'ContentController@nextLevelById');
Route::get('/manage/add/category/{id}', 'ContentController@makeCategoryAddingView')->name('add_category');
Route::get('/manage/add/article/{category_id}', function ($category_id) {
    return view('add_article', [
        'category_id' => $category_id
    ]);
})->name('add_article');
Route::get('/manage/edit/article/{article_id}', 'ContentController@makeArticleEditView')->name('edit_article');
Route::get('/manage/edit/category/{category_id}/', 'ContentController@makeCategoryEditView')->name('edit_category');
Route::get('/settings', 'ApplicationController@settings')->name('settings')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about_us');
})->name('about_us');
