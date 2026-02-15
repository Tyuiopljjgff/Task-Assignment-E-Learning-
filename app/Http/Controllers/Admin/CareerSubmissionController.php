<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerSubmissionController extends Controller
{
     
    public function index()
    {
        $submissions = CareerSubmission::with('major')->latest()->paginate(10);
        return view('admin.career-submissions.index', compact('submissions'));
    }

    public function show(CareerSubmission $careerSubmission)
    {
        return view('admin.career-submissions.show', compact('careerSubmission'));
    }

    public function destroy(CareerSubmission $careerSubmission)
    {
        if ($careerSubmission->cv_path) {
            Storage::disk('public')->delete($careerSubmission->cv_path);
        }

        $careerSubmission->delete();

        return redirect()->route('admin.career-submissions.index')
            ->with('success', 'Career submission deleted successfully.');
    }

    public function downloadCv(CareerSubmission $careerSubmission)
    {
        if ($careerSubmission->cv_path && Storage::disk('public')->exists($careerSubmission->cv_path)) {
            return Storage::disk('public')->download($careerSubmission->cv_path);
        }

        return redirect()->back()->with('error', 'CV file not found.');
    }

    public function updateStatus(Request $request, CareerSubmission $careerSubmission)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,rejected',
        ]);

        $careerSubmission->update($validated);

        return redirect()->route('admin.career-submissions.index')
            ->with('success', 'Status updated successfully.');
    }
}