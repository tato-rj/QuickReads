<?php

Route::get('/', function () {
    return view('pages/dashboard');
});

Route::get('/stories', 'StoriesController@index');
Route::get('/stories/add', 'StoriesController@create');
Route::get('/authors/add', 'AuthorsController@create');
Route::get('/categories/add', 'CategoriesController@create');

Route::post('/stories', 'StoriesController@store');

Route::post('/authors', 'AuthorsController@store');

Route::post('/categories', 'CategoriesController@store');
