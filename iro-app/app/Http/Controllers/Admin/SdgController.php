<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sdg;
use App\Models\SdgTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SdgController extends Controller
{

    public function index()
    {
        $sdgs = Sdg::orderBy('sdg_number')->get();
        return view('admin.sdgs.index', compact('sdgs'));
    }


    public function edit(Sdg $sdg)
    {
        $sdg->load('topics');
        return view('admin.sdgs.edit', compact('sdg'));
    }

    public function update(Request $request, Sdg $sdg)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'image' => 'nullable|image|max:2048', // max 2MB
            'remove_image' => 'nullable|boolean',
        ]);

        // 1. Handle explicit image removal
        if ($request->has('remove_image') && $request->remove_image) {
            if ($sdg->image_path) {
                Storage::disk('public')->delete($sdg->image_path);
                $sdg->update(['image_path' => null]);
            }
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($sdg->image_path) {
                Storage::disk('public')->delete($sdg->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('sdg_images', 'public');
        }
        // Clean up the array before updating the model
        unset($validated['remove_image'], $validated['image']);

        $sdg->update($validated);

        return redirect()->back()->with('success', 'SDG updated successfully.');
    }

    // Add a new topic
    public function storeTopic(Request $request, Sdg $sdg)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $sdg->topics()->create($validated);

        return redirect()->back()->with('success', 'Topic added successfully.');
    }

    // Delete a topic
    public function destroyTopic(SdgTopic $topic)
    {
        $topic->delete();
        return redirect()->back()->with('success', 'Topic removed.');
    }

    // Update an existing topic
    public function updateTopic(Request $request, SdgTopic $topic)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $topic->update($validated);

        return redirect()->back()->with('success', 'Topic updated successfully.');
    }
}
