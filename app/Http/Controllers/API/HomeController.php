<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AcademicLevel;
use App\Models\Testimonial;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Get all active academic levels
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function academicLevels()
    {
        try {
            $levels = AcademicLevel::where('is_active', true)
                ->select('id', 'name_ar', 'name_en', 'icon')
                ->orderBy('id')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Academic levels retrieved successfully',
                'data' => $levels
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve academic levels',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get active testimonials
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function testimonials()
    {
        try {
            $testimonials = Testimonial::where('is_active', true)
                ->select('id', 'student_name_ar', 'student_name_en', 'course_ar', 'course_en', 'text_ar', 'text_en', 'image', 'color')
                ->latest()
                ->take(6)
                ->get()
                ->map(function ($testimonial) {
                    // Add full URL for images
                    if ($testimonial->image) {
                        $testimonial->image_url = asset('storage/' . $testimonial->image);
                    }
                    return $testimonial;
                });

            return response()->json([
                'success' => true,
                'message' => 'Testimonials retrieved successfully',
                'data' => $testimonials
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve testimonials',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get active news items
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function news()
    {
        try {
            $news = News::where('is_active', true)
                ->select('id', 'title_ar', 'title_en', 'description_ar', 'description_en', 'image', 'date')
                ->latest('date')
                ->take(6)
                ->get()
                ->map(function ($item) {
                    // Add full URL for images
                    if ($item->image) {
                        $item->image_url = asset('storage/' . $item->image);
                    }
                    return $item;
                });

            return response()->json([
                'success' => true,
                'message' => 'News retrieved successfully',
                'data' => $news
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}