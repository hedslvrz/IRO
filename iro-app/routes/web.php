<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollegeController;

Route::view('/', 'iro')->name('home');
Route::view('/iro','iro')->name('iro.home');
Route::view('/about','about')->name('about');
Route::view('/izn','izn-program')->name('izn');
Route::view('/academics', 'academics')->name('academics');
Route::view('/intl-networks','international-networks')->name('intl-net');
Route::view('/sustainability','sustainability')->name('sustainability');
Route::view('/news','news')->name('news');
Route::view('/news/article', 'news-article')->name('news.article');
Route::view('/global-affairs','global-affairs')->name('global-affairs');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('colleges', \App\Http\Controllers\Admin\CollegeController::class)->middleware('auth');
});

require __DIR__.'/settings.php';
