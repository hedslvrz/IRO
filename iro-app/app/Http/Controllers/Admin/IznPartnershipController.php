<?php

namespace App\Http\Controllers\Admin;

use App\Models\IznPartnership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IznPartnershipController extends Controller
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
    public function create()
    {
        return view('admin.izn-programs.partnerships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Up to 5MB
            'video' => 'nullable|required_if:media_type,video|mimes:mp4,mov,ogg,qt|max:51200', // Up to 50MB
        ]);

        $imagePath = null;
        $videoPath = null;

        if ($request->hasFile('image')) {
            // Save inside storage/app/public/partnerships
            $imagePath = $request->file('image')->store('partnerships', 'public');
        } elseif ($request->media_type === 'video' && $request->hasFile('video')) {
            $videoPath = $request->file('video')->store('partnerships/videos', 'public');
        }

        IznPartnership::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('izn-programs.index')
            ->with('success', 'Partnership highlight created successfully!');
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
        $partnership = IznPartnership::findOrFail($id);
        return view('admin.izn-programs.partnerships.edit', compact('partnership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $partnership = IznPartnership::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:51200',
        ]);

        $imagePath = $partnership->image_path;
        $videoPath = $partnership->video_path;

        if ($request->media_type === 'image') {
            if ($request->hasFile('image')) {
                if ($imagePath && Storage::disk('public')->exists($imagePath)) Storage::disk('public')->delete($imagePath);
                $imagePath = $request->file('image')->store('partnerships/images', 'public');
            }
            // If they switched from video to image, delete the old video
            if ($videoPath && Storage::disk('public')->exists($videoPath)) {
                Storage::disk('public')->delete($videoPath);
                $videoPath = null;
            }
        }
        // If they switch to video, or upload a new video
        elseif ($request->media_type === 'video') {
            if ($request->hasFile('video')) {
                if ($videoPath && Storage::disk('public')->exists($videoPath)) Storage::disk('public')->delete($videoPath);
                $videoPath = $request->file('video')->store('partnerships/videos', 'public');
            }
            // If they switched from image to video, delete the old image
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                $imagePath = null;
            }
        }

        $partnership->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('izn-programs.index')
            ->with('success', 'Partnership highlight updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partnership = IznPartnership::findOrFail($id);

        // Delete the image file from storage if it exists
        if ($partnership->image_path && Storage::disk('public')->exists($partnership->image_path)) {
            Storage::disk('public')->delete($partnership->image_path);
        }
        if ($partnership->video_path && Storage::disk('public')->exists($partnership->video_path)) {
            Storage::disk('public')->delete($partnership->video_path);
        }

        $partnership->delete();

        return redirect()->route('izn-programs.index')
            ->with('success', 'Partnership highlight deleted successfully!');
    }
}
