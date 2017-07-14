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

Route::post('noticias-asignadas.submit-note/{id}', [
    'uses' => 'AssignedNotesController@submitNote',
    'as' => 'assigned-notes.submit-note'
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

Route::get('publicidades-activas', [
    'uses' => 'ActiveAdsController@index',
    'as' => 'active-ads.index'
]);

Route::get('publicidades-activas.edit/{id}', [
    'uses' => 'ActiveAdsController@edit',
    'as' => 'active-ads.edit'
]);

Route::post('publicidades-activas.update/{id}', [
    'uses' => 'ActiveAdsController@update',
    'as' => 'active-ads.update'
]);

Route::get('paginas-activas', [
    'uses' => 'ActivePagesController@index',
    'as' => 'active-pages.index'
]);

Route::get('paginas-activas.edit/{id}', [
    'uses' => 'ActivePagesController@edit',
    'as' => 'active-pages.edit'
]);

Route::post('paginas-activas.update/{id}', [
    'uses' => 'ActivePagesController@update',
    'as' => 'active-pages.update'
]);

Route::get('paginas-activas.add-notes/{id}', [
    'uses' => 'ActivePagesController@addNotes',
    'as' => 'active-pages.add-notes'
]);

Route::post('paginas-activas.update-notes/{id}', [
    'uses' => 'ActivePagesController@updateNotes',
    'as' => 'active-pages.update-notes'
]);

Route::post('paginas-activas.added-notes/{id}', [
    'uses' => 'ActivePagesController@addedNotes',
    'as' => 'active-pages.added-notes'
]);

Route::get('fotos-paginas', [
    'uses' => 'PhotoPagesController@index',
    'as' => 'photo-pages.index'
]);

Route::get('fotos-paginas.show-notes/{id}', [
    'uses' => 'PhotoPagesController@showNotes',
    'as' => 'photo-pages.show-notes'
]);

Route::get('fotos-paginas.photo-note/{id}', [
    'uses' => 'PhotoPagesController@photoNote',
    'as' => 'photo-pages.photo-note'
]);

Route::post('fotos-paginas.store/{id}', [
    'uses' => 'PhotoPagesController@store',
    'as' => 'photo-pages.store'
]);

Route::post('fotos-paginas.added-photos/{id}', [
    'uses' => 'PhotoPagesController@addedPhotos',
    'as' => 'photo-pages.added-photos'
]);

Route::get('paginas-listas-para-disenar', [
    'uses' => 'DesignerController@index',
    'as' => 'ready-pages-to-design.index'
]);

Route::get('paginas-listas-para-disenar.show-page/{id}', [
    'uses' => 'DesignerController@showPage',
    'as' => 'ready-pages-to-design.show-page'
]);

Route::post('paginas-listas-para-disenar.store/{id}', [
    'uses' => 'DesignerController@store',
    'as' => 'ready-pages-to-design.store'
]);

Route::post('paginas-listas-para-disenar.designed/{id}', [
    'uses' => 'DesignerController@designed',
    'as' => 'ready-pages-to-design.designed'
]);

Route::get('paginas-disenadas', [
    'uses' => 'DesignedPagesController@index',
    'as' => 'designed-pages.index'
]);

Route::get('paginas-disenadas.show-page/{id}', [
    'uses' => 'DesignedPagesController@showPage',
    'as' => 'designed-pages.show-page'
]);

Route::get('paginas-disenadas.download-page/{id}', [
    'uses' => 'DesignedPagesController@downloadPage',
    'as' => 'designed-pages.download-page'
]);

Route::post('paginas-disenadas.reviewed/{id}', [
    'uses' => 'DesignedPagesController@reviewed',
    'as' => 'designed-pages.reviewed'
]);

Route::post('paginas-disenadas.reviewed-ready/{id}', [
    'uses' => 'DesignedPagesController@reviewedReady',
    'as' => 'designed-pages.reviewed-ready'
]);

Route::get('paginas-revisadas', [
    'uses' => 'ReviewedPagesController@index',
    'as' => 'reviewed-pages.index'
]);

Route::get('paginas-revisadas.download-page/{id}', [
    'uses' => 'ReviewedPagesController@downloadPage',
    'as' => 'reviewed-pages.download-page'
]);

Route::post('paginas-revisadas.printed/{id}', [
    'uses' => 'reviewedPagesController@printed',
    'as' => 'reviewed-pages.printed'
]);

Route::resource('albumes', 'AlbumsController', [
    'names' => 'albums',
    'parameters' => [
        'albumes' => 'album'
    ]
]);

Route::get('imagenes.create/{id}', [
    'uses' => 'ImagesController@create',
    'as' => 'images.create'
]);

Route::post('imagenes.store', [
    'uses' => 'ImagesController@store',
    'as' => 'images.store'
]);

Route::get('imagenes.destroy/{id}', [
    'uses' => 'ImagesController@destroy',
    'as' => 'images.destroy'
]);

Route::post('imagenes.postMove', [
    'uses' => 'ImagesController@postMove',
    'as' => 'images.postMove'
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
