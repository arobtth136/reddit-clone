<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::view('/', 'post.index')->name('home');

Route::get('user/{user}', 'UserController@show')->name('user');
Route::resource('users', 'UserController');
Route::resource('post', 'PostController');
Route::resource('communities', 'CommunityController');
