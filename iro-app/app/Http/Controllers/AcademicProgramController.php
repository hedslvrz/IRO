<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicProgramController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Find the program by its slug, and load its category and sections
        $program = AcademicProgram::with(['category', 'sections' => function($query) {
            $query->orderBy('id');
        }])->where('slug', $slug)->firstOrFail();

        // Return the dynamic view we set up earlier
        return view('academic-program', compact('program'));
    }
}
