<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    // Show the single form to edit the About page
    public function edit()
    {
        // Get the first record, or create an empty one if it doesn't exist yet
        $about = About::firstOrCreate(['id' => 1]);

        return view('admin.about.edit', compact('about'));
    }

    // Save the changes
    public function update(Request $request)
    {
        $about = About::first();

        $request->validate([
            'wmsu_profile' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'quality_policy_1' => 'nullable|string',
            'quality_policy_2' => 'nullable|string',
            'iro_mandate' => 'nullable|string',
            'iro_functions' => 'nullable|string',
            'iro_programs' => 'nullable|string',
            'iro_services' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:51200',
        ]);

        $data = $request->except('video'); // Get all text data

        // Handle the video upload
        if ($request->hasFile('video')) {
            // Delete the old video if it exists so we don't clutter the server
            if ($about->video_path && Storage::disk('public')->exists($about->video_path)) {
                Storage::disk('public')->delete($about->video_path);
            }
            // Store the new video
            $data['video_path'] = $request->file('video')->store('about_videos', 'public');
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Us page updated successfully!');
    }
}
