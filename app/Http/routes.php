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

Route::get('/', function () {
    return view('crawler_test');
});

/* Auth */
Route::get('login', function () {
    return view('auth/login');
});
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('register', function () {
    return view('auth/register');
});
Route::post('register', 'Auth\AuthController@postRegister');


Route::get('crawl', 'CrawlerController@crawl');
Route::post('crawl', 'CrawlerController@crawl');

Route::resource('category', 'CategoryController');
Route::resource('brand', 'BrandController');
Route::resource('product', 'ProductController');
Route::resource('site', 'SiteController');