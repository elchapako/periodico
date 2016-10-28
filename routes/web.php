<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('areas', 'AreasController');

Route::resource('sections', 'SectionsController');

Route::resource('models', 'ModelsController');

Route::resource('sizes', 'SizesController');

Route::resource('clients', 'ClientsController');

Route::resource('ads', 'AdsController');
