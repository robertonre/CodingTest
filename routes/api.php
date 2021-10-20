<?php

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
// list all phone books
Route::get('/phone-books',[App\Http\Controllers\PhoneBooksController::class, 'index']);
// store new phone book
Route::Post('/store-phone-book',[App\Http\Controllers\PhoneBooksController::class, 'store']);
//show 
Route::get('/show-phone-book/{id}',[App\Http\Controllers\PhoneBooksController::class, 'show']);
// update
Route::put('/update-phone-book/{id}',[App\Http\Controllers\PhoneBooksController::class, 'update']);
//delete
Route::delete('/delete-phone-book/{id}',[App\Http\Controllers\PhoneBooksController::class, 'destroy']);
// in ASC order 
Route::get('/phone-books-order',[App\Http\Controllers\PhoneBooksController::class, 'orderData']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
