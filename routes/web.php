<?php

use App\Post;

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

Route::get('/index', 'PostsController@index');

Route::get('/insert', function() {
    DB::insert('insert into posts(title, body) values(?, ?)', ['PHP with laravel', 'laravel is awesome']);

    DB::insert('insert into posts(title, body) values(?, ?)', ['php', 'awesome']);
});

Route::get('/read', function () {
    $results = DB::select('select * from posts where id = ?', [2]);

    foreach($results as $post) {
        return $post->body;
    }

    
}); 

Route::get('/update', function() {
    DB::update('update posts set title = "update title"');
    DB::update('update posts set title = "example title" where id = ?', [2]);


    $posts = DB::select('select * from posts');

    foreach($posts as $post) {
        return $post->title;
    }
});

Route::get('/delete', function() {
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});

// Route::get('/find', function() {
//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->title;
//     }
// });

Route::get('/find', function() {
    $post = Post::find(2);

    return $post->title;
});

Route::get('/basicinsert', function() {
    $post = new Post;

    $post->title = "new Eloquent title";
    $post->body = "wow eloquent";

    $post->save();
});

Route::get('/create', function() {
    Post::create([
        'title' => 'hi! laravel',
        'body' => 'php is easy',
    ]);
});

// Route::get('/update/content', function() {
//     Post::where('id', 2) ->first();

//     Post::update([
//         'title' => 'laravel',
//         'body' => 'php is very easy'
//     ]); 
// });


Route::get('/softdelete', function() {
    Post::find(1)->delete();
});

Route::get('/readsoftdelete', function() {
    $post = Post::onlyTrashed()->whereNotNull('id')->get();

    dd($post);
});