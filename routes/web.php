<?php

use App\Community;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'PostController@index')->name('home');

Route::get('/auto/post/{post}', function ($value){
   $community = Community::where('name', $value)->first();
   return view('communities.show', compact('community'));
});
Route::get('user/{user}', 'UserController@show')->name('user');
Route::post('community/{community}/join', 'CommunityController@join_community')->name('community.join');
Route::resource('users', 'UserController');
Route::resource('post', 'PostController');
Route::resource('communities', 'CommunityController');
