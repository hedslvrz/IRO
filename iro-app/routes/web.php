<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsArticleController;
use App\Models\Sdg;

Route::view('/', 'iro')->name('home');
Route::view('/iro','iro')->name('iro.home');
Route::view('/about','about')->name('about');
Route::view('/academics', 'academics')->name('academics');
Route::view('/intl-networks','international-networks')->name('intl-net');
Route::view('/global-affairs','global-affairs')->name('global-affairs');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('colleges', \App\Http\Controllers\Admin\CollegeController::class)->middleware('auth');
});

    Route::get('/about', function () {
        // Grab the data, or create an empty instance so the page doesn't crash if empty
        $about = \App\Models\About::firstOrCreate(['id' => 1]);
        return view('about', compact('about'));
    })->name('about');

// 1. Update your public route to pass data (Replace your Route::view('/izn'...))
Route::get('/izn', function () {
    $certifications = \App\Models\IznCertification::all();
    $partnerships = \App\Models\IznPartnership::latest()->get();
    return view('izn-program', compact('certifications', 'partnerships'));
})->name('izn');
Route::middleware(['auth', 'verified'])->prefix('admin/izn-programs')->name('izn-programs.')->group(function () {

    // The Unified Index Page
    Route::get('/', [\App\Http\Controllers\Admin\IznProgramController::class, 'index'])->name('index');

    // Certification Actions (Create, Store, Edit, Update, Destroy)
    Route::resource('certifications', \App\Http\Controllers\Admin\IznCertificationController::class)->except(['index']);

    // Partnership Actions (Create, Store, Edit, Update, Destroy)
    Route::resource('partnerships', \App\Http\Controllers\Admin\IznPartnershipController::class)->except(['index']);
});

// 2. Add the Admin resource to your authenticated group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('colleges', \App\Http\Controllers\Admin\CollegeController::class);

// 2. Add the Admin routes inside your auth middleware group
Route::middleware(['auth', 'verified'])->group(function () {
    // ... existing routes ...

    // About Us Admin Routes
    Route::get('manage-about', [\App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('about.edit');
    Route::put('manage-about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
});

    // New Admin Route for IZN Certifications
    Route::resource('izn-certifications', \App\Http\Controllers\Admin\IznCertificationController::class);
});

// Notice the {slug} parameter added to the program route!
Route::get('/academics', [\App\Http\Controllers\PublicController::class, 'academics'])->name('academics');
Route::get('/academics/program/{slug}', [\App\Http\Controllers\PublicController::class, 'academicProgram'])->name('academics-program');

// Inside Admin Middleware group, add:
Route::resource('academic-programs', \App\Http\Controllers\Admin\AcademicProgramController::class);

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
