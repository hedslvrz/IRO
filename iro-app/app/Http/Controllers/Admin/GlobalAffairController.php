<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GlobalAffair;
use Illuminate\Support\Facades\Storage;

class GlobalAffairController extends Controller
{
    public function index()
    {
        $services = GlobalAffair::with('attachments')->latest()->get();
        return view('admin.global-affairs.index', compact('services'));
    }

    public function create()
    {
        return view('admin.global-affairs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // 1. Create the main Service
    $service = GlobalAffair::create([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    // 2. Save any Links safely
    $links = $request->input('links', []);
    if (isset($links['url']) && is_array($links['url'])) {
        foreach ($links['url'] as $index => $url) {
            if (!empty($url)) {
                // Safely check if the label exists at this index. If not, default to 'View Link'
                $label = !empty($links['label'][$index]) ? $links['label'][$index] : 'View Link';

                $service->attachments()->create([
                    'type' => 'link',
                    'label' => $label,
                    'path_or_url' => $url,
                ]);
            }
        }
    }

    // 3. Save any Files safely
    // Grab labels from the standard text input bag
    $fileLabels = $request->input('files.label', []);
    // Grab actual files from the file upload bag
    $fileUploads = $request->file('files.upload', []);

    if (is_array($fileUploads)) {
        foreach ($fileUploads as $index => $file) {
            if ($file && $file->isValid()) {
                $path = $file->store('global_affairs/files', 'public');

                // Safely check if a matching label exists. If not, default to 'Download File'
                $label = !empty($fileLabels[$index]) ? $fileLabels[$index] : 'Download File';

                $service->attachments()->create([
                    'type' => 'file',
                    'label' => $label,
                    'path_or_url' => $path,
                ]);
            }
        }
    }

    return redirect()->route('global-affairs.index')->with('success', 'Service added successfully!');
    }

    public function edit(string $id)
    {
        $service = GlobalAffair::findOrFail($id);
        return view('admin.global-affairs.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = GlobalAffair::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Notice we don't strictly require files or links here, as they are optional
        ]);

        // 1. Update the Main Service
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // 2. Handle Deletions of Existing Attachments
        // If the admin checked any "Remove" boxes, delete them from DB and Storage
        if ($request->has('remove_attachments')) {
            $attachmentsToDelete = $service->attachments()->whereIn('id', $request->remove_attachments)->get();

            foreach ($attachmentsToDelete as $attachment) {
                // If it's a file, delete the actual file from the public storage first
                if ($attachment->type === 'file' && \Illuminate\Support\Facades\Storage::disk('public')->exists($attachment->path_or_url)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($attachment->path_or_url);
                }
                // Then delete the record from the database
                $attachment->delete();
            }
        }

        // 3. Save any NEW Links safely (Exactly like the store method)
        $links = $request->input('links', []);
        if (isset($links['url']) && is_array($links['url'])) {
            foreach ($links['url'] as $index => $url) {
                if (!empty($url)) {
                    $label = !empty($links['label'][$index]) ? $links['label'][$index] : 'View Link';
                    $service->attachments()->create([
                        'type' => 'link',
                        'label' => $label,
                        'path_or_url' => $url,
                    ]);
                }
            }
        }

        // 4. Save any NEW Files safely (Exactly like the store method)
        $fileLabels = $request->input('files.label', []);
        $fileUploads = $request->file('files.upload', []);

        if (is_array($fileUploads)) {
            foreach ($fileUploads as $index => $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('global_affairs/files', 'public');
                    $label = !empty($fileLabels[$index]) ? $fileLabels[$index] : 'Download File';

                    $service->attachments()->create([
                        'type' => 'file',
                        'label' => $label,
                        'path_or_url' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('global-affairs.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(string $id)
    {
        $service = GlobalAffair::findOrFail($id);

        if ($service->file_path && Storage::disk('public')->exists($service->file_path)) {
            Storage::disk('public')->delete($service->file_path);
        }

        $service->delete();
        return redirect()->route('global-affairs.index')->with('success', 'Service deleted successfully!');
    }
}
