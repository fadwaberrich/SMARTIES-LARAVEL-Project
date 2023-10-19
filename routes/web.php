<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarterRequestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ReportController;


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
Route::resource('forms', FormController::class);
Route::resource('reports', ReportController::class);
Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/forms/{form}/create-report', [ReportController::class, 'create'])->name('reports.create');
Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

