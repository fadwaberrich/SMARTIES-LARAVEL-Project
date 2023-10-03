<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/front', function () {
    return view('front/layout');
});
Route::get('/back', function () {
    return view('back/layout');
});

Route::resource('review-ratings', ReviewController::class);
Route::get('review-ratings/{id}/edit', 'ReviewController@edit')->name('review-ratings.edit');
Route::resource('products', ProductController::class);
