<?php

use Illuminate\Support\Facades\Route;
use Scriptotek\GoogleBooks\GoogleBooks;
use Illuminate\Support\Facades\Auth;
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

Route::get('/test', function () {
$books = new GoogleBooks(['key' => 'AIzaSyCH451IMHdF0ZCxf4PdDjuYpCljskDRjB4']);
dd($books->volumes->search('php'));
});

Route::get('/gas', function () {
    $books = new GoogleBooks(['key' => 'AIzaSyCH451IMHdF0ZCxf4PdDjuYpCljskDRjB4']);
    foreach ($books->volumes->search('Hello world') as $vol) {
        echo $vol->title . "\n";
    }
});


Auth::routes();

Route::get('/', 'BookController@index')->name('books.index');
Route::get('books/{id}', 'BookController@show')->name('books.show');
Route::get('mybooks', 'BookController@mybooks')->name('mybooks');

Route::post('like', 'likeController@like');
Route::post('unlike', 'likeController@unlike');
