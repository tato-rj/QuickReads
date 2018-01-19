<?php

Route::get('/', 'HomeController@admin');

// Stories
Route::get('/stories/add', 'StoriesController@create');
Route::get('/stories/edit', 'StoriesController@select');
Route::get('/stories/edit/{story}', 'StoriesController@edit');

Route::post('/stories', 'StoriesController@store');
Route::patch('/stories/{story}', 'StoriesController@update');

// Authors
Route::get('/authors/add', 'AuthorsController@create');
Route::get('/authors/edit', 'AuthorsController@select');
Route::get('/authors/edit/{author}', 'AuthorsController@edit');

Route::post('/authors', 'AuthorsController@store');
Route::patch('/authors/{author}', 'AuthorsController@update');

// Categories
Route::get('/categories/add', 'CategoriesController@create');
Route::get('/categories/edit', 'CategoriesController@select');
Route::get('/categories/edit/{category}', 'CategoriesController@edit');

Route::post('/categories', 'CategoriesController@store');
Route::patch('/categories/{category}', 'CategoriesController@update');

// App Routes
Route::get('/app/stories', 'StoriesController@app');
Route::get('/app/categories', 'CategoriesController@app');
Route::get('/app/authors', 'AuthorsController@app');
