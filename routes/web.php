<?php

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
//Route to get all data
Route::get('/', 'ShortUrlConverterController@getAllShortUrl');
//Route to show form
Route::get('url-convert', 'ShortUrlConverterController@createUrlConvert');
//Route to save data
Route::post('url-convert', 'ShortUrlConverterController@saveUrlConvert');
//Route to redirect to respective url
Route::get('{url}', 'ShortUrlConverterController@getUrl');


