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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('snippets/create', 'SnippetController@create')->name('snippets.create');
    Route::get('snippets/{snippet}', 'SnippetController@show')->name('snippets.show');
    Route::get('snippets/{type}', 'SnippetController@index')->name('snippets');
    Route::post('snippets', 'SnippetController@store')->name('snippets.store');

    Route::resource('users', 'UserController');
    Route::put('users/{user}/password', 'UserController@update_password')->name('users.update_password');


    Route::post('users/{user}/avatars', 'UserAvatarController@store')->name('users.avatars.store');

});

