<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarterRequestController;

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
Route::resource("barterRequests", BarterRequestController::class);
