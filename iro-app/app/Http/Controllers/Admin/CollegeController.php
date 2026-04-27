<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::with('programs')->orderBy('name', 'asc')->get();
        return view('admin.colleges.index', compact ('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $slug = $request->slug ? \Illuminate\support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->name);
        College::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
        ]);
        return redirect()->route('colleges.index')->with('success', 'College created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the specific college or throw a 404 error
        $college = College::findOrFail($id);

        // Pass it to the edit view
        return view('admin.colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            // For the slug, we must tell Laravel to ignore THIS specific college's ID
            // when checking if the slug is unique, otherwise it will error on itself!
            'slug' => 'nullable|string|max:255|unique:colleges,slug,' . $id,
            'description' => 'required|string',
        ]);

        // 2. Find the college
        $college = College::findOrFail($id);

        // 3. Format the slug
        $slug = $request->slug ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->name);

        // 4. Update the database record
        $college->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
        ]);

        // 5. Redirect back to the table with a success message
        return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
    }

    public function destroy(string $id)
    {
        // 1. Find the college by its ID (will throw a 404 error if it doesn't exist)
        $college = College::findOrFail($id);

        // 2. Delete it from the database
        $college->delete();

        // 3. Redirect back to the table with a success message
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
    }
}
