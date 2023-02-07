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
use App\Http\Controllers\API\AuthController;

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

Route::resource('authors',AuthorController::class);

Route::resource('genres',GenreController::class);

Route::resource('books',BookController::class);

//prikaz knjiga za odredjene pisce
Route::get('books/author/{id}', [BookAuthorController::class, 'index']);

//prikaz knjiga za odredjeni zanr
Route::get('books/genre/{id}', [BookGenrerController::class, 'index']);

//prikaz knjiga za odredjenog usera
Route::get('books/user/{id}', [BookUserController::class, 'index']);

//dodavanje user-a u sistem
Route::post('/register', [AuthController::class, 'register']);

//logovanje korisnika
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    //ovim rutama ne moze da pristupi korisnik ako nije autorizovan

    Route::get('/logout',[AuthController::class,'logout']);

    Route::resource('/books',BookController::class)->only('store','update','destroy');

});


