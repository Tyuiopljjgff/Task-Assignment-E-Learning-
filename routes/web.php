<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AcademicLevelController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\CareerSubmissionController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect /dashboard to /admin/dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Student & Academic Management
    Route::resource('students', StudentController::class);
    Route::resource('academic-levels', AcademicLevelController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('news', NewsController::class);
    Route::resource('majors', MajorController::class);

    // Career Submissions
    Route::resource('career-submissions', CareerSubmissionController::class)->only(['index', 'show', 'destroy']);
    Route::get('career-submissions/{careerSubmission}/download-cv', [CareerSubmissionController::class, 'downloadCv'])->name('career-submissions.download-cv');
    Route::patch('career-submissions/{careerSubmission}/status', [CareerSubmissionController::class, 'updateStatus'])->name('career-submissions.update-status');

   
});

require __DIR__.'/auth.php';
