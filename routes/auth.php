<?php

Route::resource('areas', 'AreasController');

Route::resource('sections', 'SectionsController');

Route::resource('models', 'ModelsController');

Route::resource('sizes', 'SizesController');

Route::resource('clients', 'ClientsController');

Route::resource('ads', 'AdsController');

Route::get('notes', [
    'uses' => 'NotesController@index',
    'as' => 'notes.index'
]);

Route::get('notes/create', [
   'uses' => 'NotesController@create',
   'as' => 'notes/create'
]);

Route::post('notes.store', [
    'uses' => 'NotesController@store',
    'as' => 'notes.store'
]);

Route::get('assigned-notes', [
    'uses' => 'AssignedNotesController@index',
    'as' => 'assigned-notes'
]);

Route::get('editions', [
    'uses' => 'EditionsController@index',
    'as' => 'editions.index'
]);

Route::post('editions.store', [
   'uses' => 'EditionsController@store',
   'as' => 'editions.store'
]);