<?php

Route::resource('areas', 'AreasController', [
    'names' => 'areas',
    'parameters' => [
        'areas' => 'area'
    ]
]);

Route::resource('secciones', 'SectionsController', [
    'names' => 'sections',
    'parameters' => [
        'secciones' => 'seccion'
    ]
]);

Route::resource('modelos', 'ModelsController', [
    'names' => 'models',
    'parameters' => [
        'modelos' => 'modelo'
    ]
]);

Route::resource('tamanos', 'SizesController', [
    'names' => 'sizes',
    'parameters' => [
        'tamanos' => 'tamano'
    ]
]);

Route::resource('clientes', 'ClientsController', [
    'names' => 'clients',
    'parameters' => [
        'clientes' => 'cliente'
    ]
]);

Route::resource('publicidades', 'AdsController', [
    'names' => 'ads',
    'parameters' => [
        'publicidades' => 'publicidad'
    ]
]);

Route::get('noticias', [
    'uses' => 'NotesController@index',
    'as' => 'notes.index'
]);

Route::get('notes.create', [
   'uses' => 'NotesController@create',
   'as' => 'notes.create'
]);

Route::post('notes.store', [
    'uses' => 'NotesController@store',
    'as' => 'notes.store'
]);

Route::get('noticias-asignadas', [
    'uses' => 'AssignedNotesController@index',
    'as' => 'assigned-notes.index'
]);

Route::get('ediciones', [
    'uses' => 'EditionsController@index',
    'as' => 'editions.index'
]);

Route::post('editions.store', [
   'uses' => 'EditionsController@store',
   'as' => 'editions.store'
]);
