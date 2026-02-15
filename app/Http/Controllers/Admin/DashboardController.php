<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\AcademicLevel;
use App\Models\Testimonial;
use App\Models\News;
use App\Models\Major;
use App\Models\CareerSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'students' => Student::count(),
            'academic_levels' => AcademicLevel::count(),
            'testimonials' => Testimonial::count(),
            'news' => News::count(),
            'majors' => Major::count(),
            'career_submissions' => CareerSubmission::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}