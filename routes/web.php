<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::view('/', 'home')->name('home');

Route::get('user/{user}', 'UserController@show')->name('user');
