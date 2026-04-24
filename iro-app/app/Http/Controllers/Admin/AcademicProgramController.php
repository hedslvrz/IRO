<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicProgram; // Make sure to import the model
use App\Models\College;         // You might need this for the create view
use Illuminate\Http\Request;
use Illuminate\Support\Str;     // Make sure to import Str for the slug


class AcademicProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $colleges = \App\Models\College::all();
        $selectedCollegeId = $request->query('college_id'); // Grabs the ID if they clicked "Add to this college"

        return view('admin.colleges.academic-programs.create', compact('colleges', 'selectedCollegeId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'title' => 'required|string',
            'overview' => 'required|string',
            'eligibility' => 'nullable|array',
            'structure' => 'nullable|array',
            'quick_facts' => 'nullable|array', // Added this based on our previous setup
            'opportunities' => 'nullable|string',
            // Add any other fields you want the admin to fill out
        ]);

        // Automatically generate a URL-friendly slug (e.g., "BS Computer Science" -> "bs-computer-science")
        $validated['slug'] = Str::slug($validated['title']);

        // Save to the database
        AcademicProgram::create($validated);

        // Redirect back to the admin table with a success message
        return redirect()->route('academic-programs.index')->with('success', 'Program added successfully!');
    }

    /**
     * Display the specified resource.
     */
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
