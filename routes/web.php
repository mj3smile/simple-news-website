<?php

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

Route::get('/', 'NewsController@index');
Route::get('/category/{category}', 'NewsController@viewNewsbyCategory');
Route::get('/headline', 'NewsController@viewHeadlineNews');
Route::get('/search', 'NewsController@viewSearchResult');
Route::post('/news/{news_title}', 'NewsController@viewNewsDetail');
