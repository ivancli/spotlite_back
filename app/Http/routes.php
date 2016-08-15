<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/', function(){
//    return view('crawler_test');
//});

Route::get('/', ['uses'=> 'RoutingController@index']);

/* Auth */
Route::get('login', function(){
    return view('auth/login');
});



Route::get('crawl', ['uses' => 'CrawlerController@crawl']);
Route::post('crawl', ['uses' => 'CrawlerController@crawl']);

Route::resource('category', 'CategoryController');
Route::resource('brand', 'BrandController');
Route::resource('product', 'ProductController');
Route::resource('site', 'SiteController');