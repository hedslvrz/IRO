<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Add Partnership Highlight') }}
        </h2>


    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-gray-800">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('izn-programs.partnerships.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="document.getElementById('submit-btn').disabled = true; document.getElementById('submit-btn').innerText = 'Processing...';">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                            <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition" value="{{ old('title') }}">
                            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Story / Description</label>
                            <textarea name="description" id="description" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Media Selection --}}
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Select Media Type</label>

                            <div class="flex space-x-6 mb-4">
                                <label class="flex items-center">
                                    <input type="radio" name="media_type" value="image" class="form-radio text-red-600" checked onchange="toggleMediaInput()">
                                    <span class="ml-2 text-sm text-gray-700">Image</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="media_type" value="video" class="form-radio text-red-600" onchange="toggleMediaInput()">
                                    <span class="ml-2 text-sm text-gray-700">Video (MP4)</span>
                                </label>
                            </div>

                            {{-- Image Input --}}
                            <div id="image-input-group">
                                <label for="image" class="block text-sm font-medium text-gray-700 mt-2">Upload Image</label>
                                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-800 hover:file:bg-gray-300 transition cursor-pointer">
                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Video Input (Hidden by default) --}}
                            <div id="video-input-group" class="hidden">
                                <label for="video" class="block text-sm font-medium text-gray-700 mt-2">Upload Video</label>
                                <input type="file" name="video" id="video" accept="video/mp4,video/x-m4v,video/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-800 hover:file:bg-gray-300 transition cursor-pointer">
                                <p class="text-xs text-gray-500 mt-1">Max size: 50MB.</p>
                                @error('video') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('izn-programs.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
                            <button type="submit" class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-6 rounded-md shadow-sm transition">Post Highlight</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Javascript to toggle inputs --}}
    <script>
        function toggleMediaInput() {
            const mediaType = document.querySelector('input[name="media_type"]:checked').value;
            const imageGroup = document.getElementById('image-input-group');
            const videoGroup = document.getElementById('video-input-group');

            if (mediaType === 'image') {
                imageGroup.classList.remove('hidden');
                videoGroup.classList.add('hidden');
            } else {
                imageGroup.classList.add('hidden');
                videoGroup.classList.remove('hidden');
            }
        }

        // Run on load in case of validation errors returning old data
        document.addEventListener('DOMContentLoaded', toggleMediaInput);
    </script>
</flux:main>
</x-layouts::app.sidebar>
