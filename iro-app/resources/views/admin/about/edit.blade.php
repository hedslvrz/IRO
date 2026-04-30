<x-layouts::app.sidebar>
<flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Manage About Us Page') }}
        </h2>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- The Form --}}
                    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        {{-- WMSU Profile --}}
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">WMSU Profile</h3>
                            {{-- Notice the $about->wmsu_profile here. This guarantees the current saved state is visible! --}}
                            <textarea name="wmsu_profile" rows="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('wmsu_profile', $about->wmsu_profile) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Note: Use Enter/Return to create paragraph breaks.</p>
                        </div>

                        {{-- Vision & Mission --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Vision</h3>
                                <textarea name="vision" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('vision', $about->vision) }}</textarea>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Mission</h3>
                                <textarea name="mission" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('mission', $about->mission) }}</textarea>
                            </div>
                        </div>

                        {{-- Quality Policy --}}
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Quality Policy</h3>
                            <div class="space-y-4">
                                <textarea name="quality_policy_1" rows="3" placeholder="First paragraph..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('quality_policy_1', $about->quality_policy_1) }}</textarea>
                                <textarea name="quality_policy_2" rows="3" placeholder="Second paragraph..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('quality_policy_2', $about->quality_policy_2) }}</textarea>
                            </div>
                        </div>

                        {{-- IRO Mandate & Pillars --}}
                        <div class="mt-8 border-t-2 border-gray-100 pt-6">
                            <h3 class="text-xl font-extrabold text-red-900 mb-6">IRO Mandate & Pillars</h3>

                            {{-- Mandate (Intro) --}}
                            <div class="mb-6">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Office Mandate & Supervision</label>
                                <textarea name="iro_mandate" rows="4" placeholder="The IRO is generally mandated to..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('iro_mandate', $about->iro_mandate) }}</textarea>
                            </div>

                            {{-- The 3 Pillars (Grid) --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Functions & Activities</label>
                                    <textarea name="iro_functions" rows="8" placeholder="Enter one function per line..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('iro_functions', $about->iro_functions) }}</textarea>
                                    <p class="text-xs text-gray-500 mt-1">e.g., Leads/assists in partnership...</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Programs</label>
                                    <textarea name="iro_programs" rows="8" placeholder="Enter one program per line..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('iro_programs', $about->iro_programs) }}</textarea>
                                    <p class="text-xs text-gray-500 mt-1">e.g., Faculty and Student Exchange...</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Services Provided</label>
                                    <textarea name="iro_services" rows="8" placeholder="Enter one service per line..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('iro_services', $about->iro_services) }}</textarea>
                                    <p class="text-xs text-gray-500 mt-1">e.g., Travel assistance, Campus tours...</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 border-t-2 border-gray-100 pt-6">
                            <h3 class="text-xl font-extrabold text-red-900 mb-6">Promotional Video</h3>

                            <div class="mb-6 bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <label class="block text-sm font-bold text-gray-700 mb-4">Current Video</label>

                                @if($about->video_path)
                                    <div class="mb-4 w-full max-w-md rounded-lg overflow-hidden border-2 border-gray-300 shadow-sm">
                                        <video class="w-full h-auto" controls>
                                        <source src="{{ asset('storage/' . $about->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500 mb-6 italic">No promotional video uploaded yet.</p>
                                @endif

                                <label for="video" class="block text-sm font-bold text-gray-700 mb-2">Upload New Video (MP4)</label>
                                <input type="file" name="video" id="video" accept="video/mp4,video/x-m4v,video/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition cursor-pointer">
                                <p class="text-xs text-gray-500 mt-2">Maximum file size: 50MB. Select a new file to replace the current video.</p>
                                @error('video') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Save Button (Restored!) --}}
                        <div class="flex justify-end pt-8 mt-8 border-t border-gray-100">
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-8 rounded-md shadow-md transition duration-200 transform hover:-translate-y-0.5">
                                Save All Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
