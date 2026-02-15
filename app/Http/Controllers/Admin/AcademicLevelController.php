<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicLevelController extends Controller
{
    public function index()
    {
        $academicLevels = AcademicLevel::latest()->paginate(10);
        return view('admin.academic-levels.index', compact('academicLevels'));
    }

    public function create()
    {
        return view('admin.academic-levels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle file upload
        if ($request->hasFile('icon')) {
            // تخزين الصورة في المسار 'academic_icons' ضمن disk 'public'
            $validated['icon'] = $request->file('icon')->store('academic_icons', 'public');
        }

        AcademicLevel::create($validated);

        return redirect()->route('admin.academic-levels.index')
            ->with('success', 'Academic Level created successfully.');
    }

    public function show(AcademicLevel $academicLevel)
    {
        return view('admin.academic-levels.show', compact('academicLevel'));
    }

    public function edit(AcademicLevel $academicLevel)
    {
        return view('admin.academic-levels.edit', compact('academicLevel'));
    }

    public function update(Request $request, AcademicLevel $academicLevel)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Update file if uploaded
        if ($request->hasFile('icon')) {
            // حذف الصورة القديمة إن وجدت
            if ($academicLevel->icon) {
                Storage::disk('public')->delete($academicLevel->icon);
            }

            // تخزين الصورة الجديدة
            $validated['icon'] = $request->file('icon')->store('academic_icons', 'public');
        }

        $academicLevel->update($validated);

        return redirect()->route('admin.academic-levels.index')
            ->with('success', 'Academic Level updated successfully.');
    }

    public function destroy(AcademicLevel $academicLevel)
    {
        // Delete file if exists
        if ($academicLevel->icon) {
            Storage::disk('public')->delete($academicLevel->icon);
        }

        // Delete record
        $academicLevel->delete();

        return redirect()->route('admin.academic-levels.index')
            ->with('success', 'Academic Level deleted successfully.');
    }
}
