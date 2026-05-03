<x-layouts::app.sidebar>
    {{-- Move the slot OUTSIDE of flux:main so Laravel renders it properly --}}
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Edit SDG ') . $sdg->sdg_number . ': ' . $sdg->title }}
        </h2>
    </x-slot>

    <flux:main>
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">

                {{-- 1. FIXED BACK BUTTON: Moved into the main body so it's guaranteed to show --}}
                <div>
                    <a href="{{ route('admin.sdgs.index') }}" class="inline-flex items-center text-sm font-semibold text-gray-600 hover:text-[#990000] transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to SDGs List
                    </a>
                </div>

                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 text-red-700 rounded-r-md shadow-sm">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Main SDG Edit Form --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Main SDG Information</h3>

                        <form action="{{ route('admin.sdgs.update', $sdg->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $sdg->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="overview" class="block text-sm font-medium text-gray-700">Overview</label>
                                <textarea name="overview" id="overview" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ old('overview', $sdg->overview) }}</textarea>
                            </div>

                            <div x-data="{ imagePreview: null }">
                                <label for="image" class="block text-sm font-medium text-gray-700">Update Image (Optional)</label>

                                {{-- The @change event captures the file and creates a temporary URL to display it --}}
                                <input type="file" name="image" id="image" accept="image/*"
                                       @change="imagePreview = $event.target.files.length ? URL.createObjectURL($event.target.files[0]) : null"
                                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">

                                {{-- 1. PREVIEW OF NEWLY SELECTED IMAGE --}}
                                <div x-show="imagePreview" x-cloak style="display: none;" class="mt-4 p-4 bg-red-50 rounded-md border border-red-200 inline-block">
                                    <p class="text-xs text-red-700 font-semibold uppercase tracking-wider mb-2">New Image Preview</p>
                                    <img :src="imagePreview" alt="Preview" class="w-32 h-32 object-cover rounded border border-red-300 shadow-sm">
                                </div>

                                {{-- 2. CURRENT SAVED IMAGE (Automatically hides if a new image is selected) --}}
                                @if($sdg->image_path)
                                    <div x-show="!imagePreview" class="mt-4 p-4 bg-gray-50 rounded-md border border-gray-200 inline-block">
                                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-2">Current Image</p>
                                        <div class="flex items-start gap-4">
                                            <img src="{{ asset('storage/' . $sdg->image_path) }}" alt="Current Image" class="w-32 h-32 object-cover rounded border border-gray-300 shadow-sm">

                                            {{-- The Checkbox to remove the image --}}
                                            <div class="mt-2">
                                                <label class="inline-flex items-center cursor-pointer group">
                                                    <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500 cursor-pointer">
                                                    <span class="ml-2 text-sm text-red-600 font-medium group-hover:text-red-800 transition-colors">
                                                        Remove current image
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-md shadow-sm transition">
                                    Save SDG Updates
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- SDG Topics Management --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-gray-700">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Manage Programs / Topics for this SDG</h3>

                        {{-- List Existing Topics --}}
                        <div class="mb-8 grid gap-4">
                            @forelse($sdg->topics as $topic)
                                {{-- 2. FIXED INLINE EDITING (using Alpine x-data) --}}
                                <div x-data="{ editing: false }" class="p-4 bg-gray-50 border border-gray-200 rounded-lg">

                                    {{-- Read-Only View --}}
                                    <div x-show="!editing" class="flex items-start justify-between">
                                        <div>
                                            <h4 class="font-bold text-[#990000]">{{ $topic->title }}</h4>
                                            <p class="text-sm text-gray-600 mt-1">{{ $topic->description }}</p>
                                        </div>
                                        <div class="ml-4 shrink-0 flex gap-2">
                                            <button @click="editing = true" type="button" class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1 rounded text-sm transition font-medium border border-blue-100">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.sdgs.topics.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Delete this topic?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded text-sm transition font-medium border border-red-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Edit Form (Hidden by default until 'Edit' is clicked) --}}
                                    <div x-show="editing" x-cloak style="display: none;">
                                        <form action="{{ route('admin.sdgs.topics.update', $topic->id) }}" method="POST" class="space-y-3">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <input type="text" name="title" value="{{ $topic->title }}" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                            </div>
                                            <div>
                                                <textarea name="description" rows="2" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ $topic->description }}</textarea>
                                            </div>
                                            <div class="flex justify-end gap-2">
                                                <button @click="editing = false" type="button" class="text-gray-600 hover:text-gray-900 bg-gray-200 px-4 py-1.5 rounded text-sm transition font-medium">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="text-white bg-[#990000] hover:bg-red-800 px-4 py-1.5 rounded text-sm transition font-medium">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            @empty
                                <p class="text-sm text-gray-500 italic">No topics added to this SDG yet.</p>
                            @endforelse
                        </div>

                        {{-- 3. FIXED DOUBLE SUBMIT PREVENTION (using Alpine @submit and :disabled) --}}
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-gray-700 mb-3">Add New Topic/Program</h4>
                            <form action="{{ route('admin.sdgs.topics.store', $sdg->id) }}" method="POST" class="space-y-4" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
                                @csrf
                                <div>
                                    <label for="topic_title" class="block text-sm font-medium text-gray-700">Topic Title</label>
                                    <input type="text" name="title" id="topic_title" placeholder="e.g., Global Public Health Research" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="topic_description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="topic_description" rows="2" placeholder="Describe the program or topic..." required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"></textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" :disabled="isSubmitting" :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-900'" class="bg-gray-800 text-white font-semibold py-2 px-6 rounded-md shadow-sm transition">
                                        <span x-show="!isSubmitting">Add Topic</span>
                                        <span x-show="isSubmitting" x-cloak style="display: none;">Adding...</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </flux:main>
</x-layouts::app.sidebar>
