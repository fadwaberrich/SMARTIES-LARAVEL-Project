<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\VenueController;



use App\Http\Controllers\CategoryController;


use App\Http\Controllers\BarterRequestController;
use App\Http\Controllers\EventController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('front/layout');
});
Route::get('/back', function () {
    return view('back/layout');
})->name('back');

Route::get('/category', [CategoryController::class, 'show'])->name('showCategory');
Route::get('/category/form', [CategoryController::class, 'form'])->name('formCategory');
Route::post('/category', [CategoryController::class, 'add'])->name('addCategory');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('formEditCategory');
Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('EditCategory');
Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('DeleteCategory');
Route::get('/category/search', [CategoryController::class, 'search'])->name('searchCategory');
Route::get('/products/{product}/reviews', [ProductController::class, 'showReviews'])->name('products.reviews');
Route::resource("barterRequests", BarterRequestController::class);
Route::resource('events', EventController::class);
Route::get('/products/create/{annonce_id}', 'ProductController@create')->name('products.create');
Route::resource('products', ProductController::class);
Route::middleware('auth')->group(function () {
    Route::resource('annonces', AnnonceController::class);
});
Route::resource('venuess', VenueController::class);

Route::middleware('auth')->group(function () {
    Route::resource('review-ratings', ReviewController::class);
});

Route::get('/annonces/Back', [AnnonceController::class, 'Back'])->name('Back');
Route::delete('/annonces/{annonce}/destroyBack', [AnnonceController::class, 'destroyBack'])->name('destroyBack');

Route::resource('annonces', AnnonceController::class);

require __DIR__ . '/auth.php';