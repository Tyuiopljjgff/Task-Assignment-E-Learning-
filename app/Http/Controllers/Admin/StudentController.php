<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\AcademicLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('academicLevel')->latest()->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $academicLevels = AcademicLevel::where('is_active', true)->get();
        return view('admin.students.create', compact('academicLevels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'academic_level_id' => 'required|exists:academic_levels,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('students', 'public');
        }

        Student::create($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $academicLevels = AcademicLevel::where('is_active', true)->get();
        return view('admin.students.edit', compact('student', 'academicLevels'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'academic_level_id' => 'required|exists:academic_levels,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $validated['image'] = $request->file('image')->store('students', 'public');
        }

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Delete image if exists
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}