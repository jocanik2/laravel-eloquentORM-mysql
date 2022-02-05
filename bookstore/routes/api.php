<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


Route::get('/authors', [AuthorController::class, 'index']);
//Route::resource('users', UserController::class);
Route::get('/users', [UserController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);

Route::get('/authors/search/{full_name}', [AuthorController::class, 'search']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::delete('/users/destroy/{user_id}', [UserController::class, 'destroy']);
    Route::post('/books', [BookController::class, 'store']);
    Route::post('/authors', [AuthorController::class, 'store']);

});
