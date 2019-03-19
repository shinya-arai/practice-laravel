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

// Route::get('/index', 'PostsController@index');

Route::get('/insert', function() {
    // DB::insert('insert into posts(title, body) values(?, ?)', ['PHP with laravel', 'laravel is awesome']);

    DB::insert('insert into posts(title, body) values(?, ?)', ['php', 'awesome']);
});