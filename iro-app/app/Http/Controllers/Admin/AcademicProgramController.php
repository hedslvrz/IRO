<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicProgram; // Make sure to import the model
use App\Models\College;         // You might need this for the create view
use Illuminate\Http\Request;
use Illuminate\Support\Str;     // Make sure to import Str for the slug
use Illuminate\Support\Facades\Storage;


class AcademicProgramController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $colleges = \App\Models\College::all();
        $selectedCollegeId = $request->query('college_id'); // Grabs the ID if they clicked "Add to this college"

        return view('admin.colleges.academic-programs.create', compact('colleges', 'selectedCollegeId'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'title' => 'required|string|max:255',
            'degree_level' => 'nullable|string',
            'overview' => 'required|string',
            'eligibility' => 'nullable|array',
            'structure' => 'nullable|array',
            'quick_facts' => 'nullable|array',
        ]);

        // Generate the URL slug
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

        // Save to database
        \App\Models\AcademicProgram::create($validated);

        // Redirect back to the main Manage Colleges page!
        return redirect()->route('colleges.index')->with('success', 'New Program added successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // Find the specific program
        $program = \App\Models\AcademicProgram::findOrFail($id);

        // Get all colleges so the admin can change the program's assigned college if needed
        $colleges = \App\Models\College::all();

        return view('admin.colleges.academic-programs.edit', compact('program', 'colleges'));
    }

    public function update(Request $request, string $id)
    {
        $program = \App\Models\AcademicProgram::findOrFail($id);

        $validated = $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:academic_programs,slug,' . $id,
            'category' => 'nullable|string',
            'degree_level' => 'nullable|string',
            'overview' => 'nullable|string',
            'opportunities' => 'nullable|string',
            // Arrays for our JSON columns
            'eligibility' => 'nullable|array',
            'structure' => 'nullable|array',
            'quick_facts' => 'nullable|array',
        ]);

        $validated['slug'] = $request->slug ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->title);

        $program->update($validated);

        return redirect()->back()->with('success', 'Academic Program updated successfully!');
    }

    public function destroy(string $id)
    {
        $program = \App\Models\AcademicProgram::findOrFail($id);
        $program->delete();

        // After deleting the program, send the admin back to the main Manage Colleges page
        return redirect()->route('colleges.index')->with('success', 'Academic Program deleted successfully.');
    }
}
