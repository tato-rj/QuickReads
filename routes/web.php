<?php

Route::get('/', 'HomeController@admin');

Route::get('/stories', 'StoriesController@index');
Route::get('/stories/add', 'StoriesController@create');
Route::get('/authors/add', 'AuthorsController@create');
Route::get('/categories/add', 'CategoriesController@create');

// App Routes
Route::get('/app/stories', 'StoriesController@app');
Route::get('/app/categories', 'CategoriesController@app');
Route::get('/app/authors', 'AuthorsController@app');

Route::post('/stories', 'StoriesController@store');

Route::post('/authors', 'AuthorsController@store');

Route::post('/categories', 'CategoriesController@store');
