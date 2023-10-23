<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\VenueController;
use App\http\Controllers\ForumController;
use App\http\Controllers\CommentForumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarterRequestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\ResponseController;

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

Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/forms/{form}/create-report', [FormController::class, 'createReport'])->name('forms.create-report');
Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');



Route::get('/category', [CategoryController::class, 'show'])->name('showCategory');
Route::get('/category/form', [CategoryController::class, 'form'])->name('formCategory');
Route::post('/category', [CategoryController::class, 'add'])->name('addCategory');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('formEditCategory');
Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('EditCategory');
Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('DeleteCategory');
Route::get('/category/search', [CategoryController::class, 'search'])->name('searchCategory');
Route::get('/products/{product}/reviews', [ProductController::class, 'showReviews'])->name('products.reviews');

Route::get('eventsfront', [EventController::class, 'index2']) ->name('events.index2');
Route::get('/products/create/{annonce_id}', 'ProductController@create')->name('products.create');
Route::get('/user-announcements', [AnnonceController::class,'ShowUserAnnouncements'])->name('user.announcements');
Route::get('/front/forms', [FormController::class, 'frontIndex'])->name('front.forms.index');


Route::get('/annonces/generatePDF', [AnnonceController::class,'generatePDF'])->name('generatePDF');
Route::get('/annonces/search', [AnnonceController::class,'search'])->name('Search');
Route::delete('/annonces/{annonce}/destroyBack', [AnnonceController::class, 'destroyBack'])->name('destroyBack');
Route::get('/annonces/Back', [AnnonceController::class, 'Back'])->name('Back');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

///***************************** */
///  svp  7otou les ressources lkol lhne 5ater 9a3din yebloquou f les routes lfou9/////
Route::resource("forum", ForumController::class);
Route::resource("commentforum", CommentForumController::class);
Route::resource('review-ratings', ReviewController::class);
Route::resource("barterRequests", BarterRequestController::class);
Route::resource('forms', FormController::class);
Route::resource('reports', ReportController::class);
Route::resource('venuess', VenueController::class);
Route::resource('annonces', AnnonceController::class);
Route::resource("barterRequests", BarterRequestController::class);
Route::resource('events', EventController::class);
Route::resource('products', ProductController::class);
Route::resource("responses", ResponseController::class);
Route::middleware('auth')->group(function () {
    Route::resource('annonces', AnnonceController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('review-ratings', ReviewController::class);
});
require __DIR__ . '/auth.php';