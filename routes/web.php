<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MoviesController@index')->name('movie.index');
Route::get('/movies', 'MoviesController@index')->name('movie.index');
Route::get('/movies/{id}', 'MoviesController@show')->name('movie.show');
// Route::view('/movie', 'show');
//
Route::get('/actors', 'ActorsController@index')->name('actor.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');
Route::get('/actor/{id}', 'ActorsController@show')->name('actor.show');

Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

Route::get('/tv', 'TvShowController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvShowController@show')->name('tv.show');