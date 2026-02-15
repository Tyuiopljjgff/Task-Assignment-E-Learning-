<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\MajorController;
use App\Http\Controllers\API\CareerSubmissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| هنا جميع الـ API routes للواجهة العامة ولوحة التحكم
|
*/

// Public API Routes (واجهة عامة)
Route::prefix('v1')->group(function () {

    // Home Page APIs
    Route::get('/academic-levels', [HomeController::class, 'academicLevels']);
    Route::get('/testimonials', [HomeController::class, 'testimonials']);
    Route::get('/news', [HomeController::class, 'news']);

    // Careers Page APIs
    Route::get('/majors', [MajorController::class, 'index']);
    Route::post('/career-submissions', [CareerSubmissionController::class, 'store']);

   
});

