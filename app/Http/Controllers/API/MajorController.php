<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Major;

class MajorController extends Controller
{
    /**
     * Get all active majors for career form dropdown
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $majors = Major::where('is_active', true)
                ->select('id', 'name_ar', 'name_en')
                ->orderBy('name_en')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Majors retrieved successfully',
                'data' => $majors
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve majors',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}