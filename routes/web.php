<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//home route

Route::get('/home', 'HomeController@index')->name('home');

//game routes

Route::get('games/add', 'GameController@create')->name('games.add');

Route::post('games/store', 'GameController@store')->name('games.store');

Route::get('games/show/{game}', 'GameController@show')->name('games.show');

Route::get('games/edit/{game}', 'GameController@edit')->name('games.edit');

Route::put('games/update/{game}', 'GameController@update')->name('games.update');

Route::delete('games/delete/{game}', 'GameController@destroy')->name('games.delete');

// chat routes

Route::post('chats/store', 'ChatController@store')->name('chats.store');

Route::delete('chats/delete/{chat}', 'ChatController@destroy')->name('chats.delete');
