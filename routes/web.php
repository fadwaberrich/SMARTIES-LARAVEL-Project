<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

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
Route::get('/category',[CategoryController::class,'show'])->name('showCategory');
Route::get('/category/form',[CategoryController::class,'form'])->name('formCategory');
Route::post('/category',[CategoryController::class,'add'])->name('addCategory');
Route::get('/category/{category}/edit',[CategoryController::class,'edit'])->name('formEditCategory');
Route::put('/category/{category}/update',[CategoryController::class,'update'])->name('EditCategory');
Route::delete('/category/{category}/destroy',[CategoryController::class,'destroy'])->name('DeleteCategory');
Route::get('/category/search',[CategoryController::class,'search'])->name('searchCategory');