<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

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

/* Index / List Books */
Route::get('/', [BookController::class, 'index']);

/* Top 10 Famous Authors */
Route::get('/authors', [BookController::class, 'author']);

/* Give Rating */
Route::get('/give-rating', [RatingController::class, 'index']);
Route::get('/get-books', [RatingController::class, 'getBooks']);
Route::post('/post-rating', [RatingController::class, 'postRating']);
