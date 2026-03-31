<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\NewsArticleController;

Route::view('/', 'iro')->name('home');
Route::view('/iro','iro')->name('iro.home');
Route::view('/about','about')->name('about');
Route::view('/izn','izn-program')->name('izn');
Route::view('/academics', 'academics')->name('academics');
Route::view('/academics/program', 'academic-program')->name('academics-program');
Route::view('/intl-networks','international-networks')->name('intl-net');
Route::view('/sustainability','sustainability')->name('sustainability');
Route::view('/global-affairs','global-affairs')->name('global-affairs');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('colleges', \App\Http\Controllers\Admin\CollegeController::class)->middleware('auth');
});

// Routes for article management
Route::get('/news', [NewsArticleController::class, 'publicIndex'])->name('news.index'); //Public News Landing Page
Route::get('/news/{news:slug}', [NewsArticleController::class, 'show'])->name('news.article');

// Admin Routes (Protected by Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    // Admin CMS routes for News
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', NewsArticleController::class);
    });
});




require __DIR__.'/settings.php';
