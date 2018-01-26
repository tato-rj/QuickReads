<?php

Auth::routes();

Route::get('/', 'HomeController@leftlane');

Route::get('/quickreads', 'HomeController@admin')->name('home');

// Stories
Route::get('/quickreads/stories/add', 'StoriesController@create');
Route::get('/quickreads/stories/edit', 'StoriesController@select');
Route::get('/quickreads/stories/edit/{story}', 'StoriesController@edit');
Route::get('/quickreads/stories/delete', 'StoriesController@delete');

// Comments
Route::post('/quickreads/stories/comments', 'CommentsController@store');

// Ratings
Route::post('/quickreads/stories/ratings', 'RatingsController@store');

Route::post('/quickreads/stories', 'StoriesController@store');
Route::patch('/quickreads/stories/{story}', 'StoriesController@update');
Route::delete('/quickreads/stories/{story}', 'StoriesController@destroy');

// Authors
Route::get('/quickreads/authors/add', 'AuthorsController@create');
Route::get('/quickreads/authors/edit', 'AuthorsController@select');
Route::get('/quickreads/authors/edit/{author}', 'AuthorsController@edit');
Route::get('/quickreads/authors/delete', 'AuthorsController@delete');

Route::post('/quickreads/authors', 'AuthorsController@store');
Route::patch('/quickreads/authors/{author}', 'AuthorsController@update');
Route::delete('/quickreads/authors/{author}', 'AuthorsController@destroy');

// Categories
Route::get('/quickreads/categories/add', 'CategoriesController@create');
Route::get('/quickreads/categories/edit', 'CategoriesController@select');
Route::get('/quickreads/categories/edit/{category}', 'CategoriesController@edit');
Route::get('/quickreads/categories/delete', 'CategoriesController@delete');

Route::post('/quickreads/categories', 'CategoriesController@store');
Route::patch('/quickreads/categories/{category}', 'CategoriesController@update');
Route::delete('/quickreads/categories/{category}', 'CategoriesController@destroy');

// App Routes
Route::get('/quickreads/app/stories', 'StoriesController@app');
Route::get('/quickreads/app/stories/text', 'StoriesController@text');
Route::get('/quickreads/app/categories', 'CategoriesController@app');
Route::get('/quickreads/app/authors', 'AuthorsController@app');
Route::get('/quickreads/app/users', 'UsersController@app');
