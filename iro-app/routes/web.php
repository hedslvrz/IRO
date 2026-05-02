<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\GlobalAffairController;
use App\Models\Sdg;

Route::view('/about','about')->name('about');
Route::view('/academics', 'academics')->name('academics');
Route::view('/intl-networks','international-networks')->name('intl-net');
Route::view('/global-affairs','global-affairs')->name('global-affairs');

Route::get('/', function () {
    $settings = \App\Models\HomeSetting::firstOrCreate(['id' => 1]);
    return view('iro', compact('settings'));
})->name('home');

Route::get('/iro', function () {
    $settings = \App\Models\HomeSetting::firstOrCreate(['id' => 1]);
    return view('iro', compact('settings'));
})->name('iro.home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/dashboard', function () {
        // 1. Count Global Affairs (We know this table exists!)
        $servicesCount = \App\Models\GlobalAffair::count();

        // 2. Count the others (Using null coalescing / class_exists to prevent errors if you haven't made these models yet)
        $partnershipsCount = class_exists(\App\Models\IznPartnership::class) ? \App\Models\IznPartnership::count() : 0;
        $certificationsCount = class_exists(\App\Models\IznCertification::class) ? \App\Models\IznCertification::count() : 0;

        // Assuming you will name your news model 'News' or 'Article' later
        $newsCount = class_exists(\App\Models\NewsArticle::class) ? \App\Models\NewsArticle::count() : 0;

        // Pass all these counts to the dashboard view
        return view('dashboard', compact(
            'servicesCount',
            'partnershipsCount',
            'certificationsCount',
            'newsCount'
        ));
    })->name('dashboard');
    
    Route::resource('colleges', \App\Http\Controllers\Admin\CollegeController::class)->middleware('auth');
    Route::get('admin/home-settings', [\App\Http\Controllers\Admin\HomeSettingController::class, 'edit'])->name('home-settings.edit');
    Route::put('admin/home-settings', [\App\Http\Controllers\Admin\HomeSettingController::class, 'update'])->name('home-settings.update');
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

Route::prefix('admin')->group(function () {
        Route::resource('global-affairs', \App\Http\Controllers\Admin\GlobalAffairController::class);
    });

// 2. Add the Admin resource to your authenticated group
Route::middleware(['auth', 'verified'])->group(function () {
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

Route::get('/global-affairs', function () {
    $services = \App\Models\GlobalAffair::with('attachments')->latest()->get();

    return view('global-affairs', compact('services'));
})->name('global-affairs');

require __DIR__.'/settings.php';
