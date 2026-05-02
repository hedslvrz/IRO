<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">Edit Home Page Content</h2>


    <div class="py-12 max-w-5xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Whoops! There were some problems with your input.</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-sm sm:rounded-lg border-t-4 border-red-700">
            <div class="p-6">
                <form action="{{ route('home-settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="document.getElementById('submit-btn').disabled = true; document.getElementById('submit-btn').innerText = 'Saving...';">
                    @csrf
                    @method('PUT')

                    {{-- HERO SECTION --}}
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b pb-2 mb-4">1. Hero Section</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Main Title</label>
                                <input type="text" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Subtitle (Highlighted text)</label>
                                <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $settings->hero_subtitle) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="hero_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('hero_description', $settings->hero_description) }}</textarea>
                        </div>

                        {{-- Seals Upload --}}
                        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Accreditation Seals Image (Replaces the Button)</label>
                            @if($settings->seals_image_path)
                                <div class="mb-3">
                                    <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                                    <img src="{{ asset('storage/' . $settings->seals_image_path) }}" alt="Seals" class="h-16 object-contain bg-white border p-1">
                                </div>
                            @endif
                            <input type="file" name="seals_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer">
                            <p class="text-xs text-gray-500 mt-1">Upload a wide, transparent PNG (e.g., "IRO Seals.png"). Max 5MB.</p>
                        </div>
                    </div>

                    {{-- ORG CHART SECTION --}}
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b pb-2 mb-4">2. Organizational Chart Section</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Section Title</label>
                            <input type="text" name="org_chart_title" value="{{ old('org_chart_title', $settings->org_chart_title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Section Description</label>
                            <textarea name="org_chart_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('org_chart_description', $settings->org_chart_description) }}</textarea>
                        </div>

                        {{-- Org Chart Upload --}}
                        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Organizational Chart Image</label>
                            @if($settings->org_chart_image_path)
                                <div class="mb-3">
                                    <p class="text-xs text-gray-500 mb-1">Current Chart:</p>
                                    <img src="{{ asset('storage/' . $settings->org_chart_image_path) }}" alt="Org Chart" class="max-h-48 object-contain bg-white border p-1">
                                </div>
                            @endif
                            <input type="file" name="org_chart_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer">
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4 border-t border-gray-200 mt-6">
                        <button id="submit-btn" type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-8 rounded-md shadow-md transition">
                            Save Home Page Content
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</flux:main>
</x-layouts::app.sidebar>
