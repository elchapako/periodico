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

Route::get('noticias-asignadas.edit/{id}', [
    'uses' => 'AssignedNotesController@edit',
    'as' => 'assigned-notes.edit'
]);

Route::post('noticias-asignadas.update/{id}', [
    'uses' => 'AssignedNotesController@update',
    'as' => 'assigned-notes.update'
]);

Route::post('noticias-asignadas.correction/{id}', [
    'uses' => 'AssignedNotesController@correction',
    'as' => 'assigned-notes.correction'
]);

Route::get('revisando-noticias', [
    'uses' => 'ReviewingNotesController@index',
    'as' => 'reviewing-notes.index'
]);

Route::get('revisando-noticias.edit/{id}', [
    'uses' => 'ReviewingNotesController@edit',
    'as' => 'reviewing-notes.edit'
]);

Route::post('revisando-noticias.update/{id}', [
    'uses' => 'ReviewingNotesController@update',
    'as' => 'reviewing-notes.update'
]);

Route::post('revisando-noticias.corrected/{id}', [
    'uses' => 'ReviewingNotesController@corrected',
    'as' => 'reviewing-notes.corrected'
]);

Route::get('noticias-corregidas', [
    'uses' => 'CorrectedNotesController@index',
    'as' => 'corrected-notes.index'
]);

Route::get('noticias-corregidas.edit/{id}', [
    'uses' => 'CorrectedNotesController@edit',
    'as' => 'corrected-notes.edit'
]);

Route::post('noticias-corregidas.update/{id}', [
    'uses' => 'CorrectedNotesController@update',
    'as' => 'corrected-notes.update'
]);

Route::get('ediciones', [
    'uses' => 'EditionsController@index',
    'as' => 'editions.index'
]);

Route::post('editions.store', [
   'uses' => 'EditionsController@store',
   'as' => 'editions.store'
]);

Route::get('reportes', [
   'uses' => 'ReportsController@index',
   'as'   => 'reports.index'
]);
