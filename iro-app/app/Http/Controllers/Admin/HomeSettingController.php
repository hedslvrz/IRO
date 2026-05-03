<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSetting;
use Illuminate\Support\Facades\Storage;

class HomeSettingController extends Controller
{
    public function edit()
    {
        // Fetch the first row, or create it if the database is empty
        $settings = HomeSetting::firstOrCreate(['id' => 1], [
            'hero_title' => 'Western Mindanao State University',
            'hero_subtitle' => 'International Relations Office',
            'hero_description' => 'Fostering global partnerships, advancing internationalization, and empowering the WMSU community through cross-cultural academic excellence.',
        ]);

        return view('admin.home-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = HomeSetting::first();

        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'seals_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB Max
            'org_chart_title' => 'required|string|max:255',
            'org_chart_description' => 'required|string',
            'org_chart_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // 10MB Max
        ]);

        // Handle Seals Image Upload
        if ($request->hasFile('seals_image')) {
            if ($settings->seals_image_path && Storage::disk('public')->exists($settings->seals_image_path)) {
                Storage::disk('public')->delete($settings->seals_image_path);
            }
            $settings->seals_image_path = $request->file('seals_image')->store('home/seals', 'public');
        }

        // Handle Org Chart Upload
        if ($request->hasFile('org_chart_image')) {
            if ($settings->org_chart_image_path && Storage::disk('public')->exists($settings->org_chart_image_path)) {
                Storage::disk('public')->delete($settings->org_chart_image_path);
            }
            $settings->org_chart_image_path = $request->file('org_chart_image')->store('home/org-chart', 'public');
        }

        // Update Text Fields
        $settings->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_description' => $request->hero_description,
            'org_chart_title' => $request->org_chart_title,
            'org_chart_description' => $request->org_chart_description,
        ]);

        return redirect()->back()->with('success', 'Home Page content updated successfully!');
    }
}
