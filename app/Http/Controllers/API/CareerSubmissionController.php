<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CareerSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerSubmissionController extends Controller
{
    /**
     * Store a new career submission
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'job_position' => 'required|string|max:255',
            'years_experience' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ], [
            'job_position.required' => 'Job position is required',
            'years_experience.required' => 'Years of experience is required',
            'major_id.required' => 'Major is required',
            'major_id.exists' => 'Selected major does not exist',
            'full_name.required' => 'Full name is required',
            'phone.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'cv.required' => 'CV file is required',
            'cv.mimes' => 'CV must be a PDF or Word document',
            'cv.max' => 'CV file size must not exceed 5MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store CV file
            $cvPath = $request->file('cv')->store('cvs', 'public');
            
            // Create career submission
            $submission = CareerSubmission::create([
                'job_position' => $request->job_position,
                'years_experience' => $request->years_experience,
                'major_id' => $request->major_id,
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'cv_path' => $cvPath,
                'status' => 'pending'
            ]);

            // Load major relationship
            $submission->load('major:id,name_ar,name_en');

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully. We will contact you soon.',
                'data' => $submission
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}