<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IznCertification;
use Illuminate\Support\Facades\Storage;

class IznCertificationController extends Controller
{

    public function index()
    {
        $certifications = IznCertification::latest()->paginate(10);
        return view('admin.izn-certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.izn-certifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Validate image
        ]);

        $imagePath = null;
        if ($request->hasFile('logo')) {
            // Save inside storage/app/public/certifications
            $imagePath = $request->file('logo')->store('certifications', 'public');
        }

        IznCertification::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo_path' => $imagePath,
        ]);

        return redirect()->route('izn-certifications.index')->with('success', 'Certification added successfully.');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $certification = IznCertification::findOrFail($id);
        return view('admin.izn-certifications.edit', compact('certification'));
    }

    public function update(Request $request, string $id)
    {
        $certification = IznCertification::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

        $imagePath = $certification->logo_path;

        if ($request->hasFile('logo')) {
            // Delete old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Store new image
            $imagePath = $request->file('logo')->store('certifications', 'public');
        }

        $certification->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo_path' => $imagePath,
        ]);

        return redirect()->route('izn-certifications.index')->with('success', 'Certification updated successfully.');
    }

    public function destroy(string $id)
    {
        $certification = IznCertification::findOrFail($id);

        if ($certification->logo_path && Storage::disk('public')->exists($certification->logo_path)) {
            Storage::disk('public')->delete($certification->logo_path);
        }

        $certification->delete();
        return redirect()->route('izn-certifications.index')->with('success', 'Certification deleted successfully.');
    }
}
