<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\NewsArticleController;
use App\Models\Sdg;

Route::view('/', 'iro')->name('home');
Route::view('/iro','iro')->name('iro.home');
Route::view('/about','about')->name('about');
Route::view('/izn','izn-program')->name('izn');
Route::view('/academics', 'academics')->name('academics');
Route::view('/academics/program', 'academic-program')->name('academics-program');
Route::view('/intl-networks','international-networks')->name('intl-net');
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

// Sustainability Route
Route::get('/sustainability', function () {
    // Eager load topics to prevent N+1 query problems and sort by SDG number
    $sdgs = Sdg::with('topics')->orderBy('sdg_number')->get();
    return view('sustainability', compact('sdgs'));
})->name('sustainability');

// Admin Sustainability Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Existing: Route::resource('colleges', CollegeController::class);
    Route::resource('sdgs', \App\Http\Controllers\Admin\SdgController::class);
    // Route to handle adding topics specifically
    Route::post('sdgs/{sdg}/topics', [\App\Http\Controllers\Admin\SdgController::class, 'storeTopic'])->name('sdgs.topics.store');
    Route::put('sdg-topics/{topic}', [\App\Http\Controllers\Admin\SdgController::class, 'updateTopic'])->name('sdgs.topics.update');
    Route::delete('sdg-topics/{topic}', [\App\Http\Controllers\Admin\SdgController::class, 'destroyTopic'])->name('sdgs.topics.destroy');
});





require __DIR__.'/settings.php';
