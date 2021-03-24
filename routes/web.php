<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');


Route::resource('portafolio', 'App\Http\Controllers\ProjectController')->names('projects')->parameters(['portafolio' => 'project']);

Route::post('/contact', 'App\Http\Controllers\MessageController@store')->name('message.store');
Route::view('/contact', 'contact')->name('contact');

Auth::routes();