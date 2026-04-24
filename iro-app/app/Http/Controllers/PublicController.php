<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\AcademicProgram;

class PublicController extends Controller
{
    // Loads the main /academics page (with the list of colleges)
    public function academics()
    {
        // Get all colleges with their associated programs
        $colleges = College::with('programs')->orderBy('name', 'asc')->get();
        return view('academics', compact('colleges'));
    }

    // Loads the specific /academics/program/{slug} page
    public function academicProgram($slug)
    {
        // Find the program in the database matching the slug in the URL
        $program = AcademicProgram::where('slug', $slug)->firstOrFail();

        // Pass that specific $program variable to the view!
        return view('academic-program', compact('program'));
    }
}
