<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;


use App\Http\Controllers\BarterRequestController;
use App\Http\Controllers\EventController;
use  App\Http\Controllers\AnnonceController;

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
//Route::get('/category/search',[CategoryController::class,'search'])->name('searchCategory');

####annonce

#Route::get('/Annonce/form',[AnnonceController::class,'form'])->name('formAnnonce');
#Route::get('/Annonce/showAnnonce',[AnnonceController::class,'showAnnonce'])->name('showAnnonce');
#Route::post('/Annonces',[AnnonceController::class,'store'])->name('addAnnonce');

Route::get('/annonces/search', [AnnonceController::class,'search'])->name('Search');
//Route::get('/annonces/showBack', [AnnonceController::class,'showBack'])->name('annonces.showBack');


Route::get('/annonces/Back', [AnnonceController::class, 'Back'])->name('Back');
Route::delete('/annonces/{annonce}/destroyBack',[AnnonceController::class, 'destroyBack'])->name('destroyBack');

Route::resource('annonces', AnnonceController::class);