<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookAuthorController;
use App\Http\Controllers\BookGenrerController;
use App\Http\Controllers\BookUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//prikaz svih usera
//Route::get('/users', [UserController::class, 'index']);
//prikaz uzer-a po id-u
//Route::resource('users/{id}', UserController::class);
Route::resource('users',UserController::class);

// //prikaz svih pisaca
// Route::get('/authors', [AuthorController::class, 'index']);
// //prikaz pisaca po id-u
// Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::resource('authors',AuthorController::class);

// //prikaz svih zanrova
// Route::get('/genre',[GenreController::class, 'index']);
// //prikaz zanrova po id-u
// Route::get('/genre/{id}',[GenreController::class, 'show']);
Route::resource('genres',GenreController::class);

// //prikaz svih knjiga
// Route::get('/books',[BookController::class, 'index']);
// //prikaz knjige po id-u
// Route::get('/books/{id}',[BookController::class, 'show']);
Route::resource('books',BookController::class);

//prikaz knjiga za odredjene pisce
Route::get('books/author/{id}', [BookAuthorController::class, 'index']);

//prikaz knjiga za odredjeni zanr
Route::get('books/genre/{id}', [BookGenrerController::class, 'index']);

//prikaz knjiga za odredjenog usera
Route::get('books/user/{id}', [BookUserController::class, 'index']);