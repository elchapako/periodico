<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'HomeController@index');

    Route::resource('areas', 'AreasController');

    Route::resource('sections', 'SectionsController');

    Route::resource('models', 'ModelsController');

    Route::resource('sizes', 'SizesController');

    Route::resource('clients', 'ClientsController');

    Route::resource('ads', 'AdsController');

});

