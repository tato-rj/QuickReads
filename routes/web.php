<?php

Route::get('/', 'HomeController@admin');

// Stories
Route::get('/stories/add', 'StoriesController@create');
Route::get('/stories/edit', 'StoriesController@select');
Route::get('/stories/edit/{story}', 'StoriesController@edit');
Route::get('/stories/delete', 'StoriesController@delete');

// Comments
Route::post('/stories/comments', 'CommentsController@store');

// Ratings
Route::post('/stories/ratings', 'RatingsController@store');

Route::post('/stories', 'StoriesController@store');
Route::patch('/stories/{story}', 'StoriesController@update');
Route::delete('/stories/{story}', 'StoriesController@destroy');

// Authors
Route::get('/authors/add', 'AuthorsController@create');
Route::get('/authors/edit', 'AuthorsController@select');
Route::get('/authors/edit/{author}', 'AuthorsController@edit');
Route::get('/authors/delete', 'AuthorsController@delete');

Route::post('/authors', 'AuthorsController@store');
Route::patch('/authors/{author}', 'AuthorsController@update');
Route::delete('/authors/{author}', 'AuthorsController@destroy');

// Categories
Route::get('/categories/add', 'CategoriesController@create');
Route::get('/categories/edit', 'CategoriesController@select');
Route::get('/categories/edit/{category}', 'CategoriesController@edit');
Route::get('/categories/delete', 'CategoriesController@delete');

Route::post('/categories', 'CategoriesController@store');
Route::patch('/categories/{category}', 'CategoriesController@update');
Route::delete('/categories/{category}', 'CategoriesController@destroy');

// App Routes
Route::get('/app/stories', 'StoriesController@app');
Route::get('/app/categories', 'CategoriesController@app');
Route::get('/app/authors', 'AuthorsController@app');
Route::get('/app/users', 'UsersController@app');
