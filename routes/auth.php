<?php

Route::resource('areas', 'AreasController');

Route::resource('sections', 'SectionsController');

Route::resource('models', 'ModelsController');

Route::resource('sizes', 'SizesController');

Route::resource('clients', 'ClientsController');

Route::resource('ads', 'AdsController');

Route::resource('notes', 'NotesController');

Route::resource('assigned-notes', 'AssignedNotesController');