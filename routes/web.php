<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', 'NewsController@index');
$router->get('/category/{category}', 'NewsController@viewNewsbyCategory');
$router->get('/headline', 'NewsController@viewHeadlineNews');
$router->get('/search', 'NewsController@viewSearchResult');
$router->get('/news/{news_title}', 'NewsController@viewNewsDetail');
