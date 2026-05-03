<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IznCertification;
use App\Models\IznPartnership;

class IznProgramController extends Controller
{
    public function index()
    {
        // Get all data for both tables
        $certifications = IznCertification::latest()->get();
        $partnerships = IznPartnership::latest()->get();

        return view('admin.izn-programs.index', compact('certifications', 'partnerships'));
    }
}
