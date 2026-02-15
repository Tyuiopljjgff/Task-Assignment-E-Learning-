<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    
    public function index()
    {
        $majors = Major::latest()->paginate(10);
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        return view('admin.majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        Major::create($validated);

        return redirect()->route('admin.majors.index')
            ->with('success', 'Major created successfully.');
    }

    public function show(Major $major)
    {
        return view('admin.majors.show', compact('major'));
    }

    public function edit(Major $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    public function update(Request $request, Major $major)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $major->update($validated);

        return redirect()->route('admin.majors.index')
            ->with('success', 'Major updated successfully.');
    }

    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()->route('admin.majors.index')
            ->with('success', 'Major deleted successfully.');
    }
}