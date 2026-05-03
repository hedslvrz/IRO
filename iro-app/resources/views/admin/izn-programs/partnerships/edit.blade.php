<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Edit Partnership Highlight') }}
        </h2>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-gray-800">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('izn-programs.partnerships.update', $partnership->id) }}" id="submit-btn" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                            <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition" value="{{ old('title', $partnership->title) }}">
                            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Story / Description</label>
                            <textarea name="description" id="description" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition">{{ old('description', $partnership->description) }}</textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Media</label>
                                @if($partnership->image_path)
                                    <img src="{{ asset('storage/' . $partnership->image_path) }}" alt="Current Image" class="h-48 w-full md:w-3/4 object-contain bg-black border rounded-md mb-4 shadow-sm">
                                @elseif($partnership->video_path)
                                    <video class="h-48 w-full md:w-3/4 object-contain bg-black border rounded-md mb-4 shadow-sm" controls>
                                        <source src="{{ asset('storage/' . $partnership->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <p class="text-sm text-gray-500 mb-4 italic">No media currently uploaded.</p>
                                @endif

                            <label for="image" class="block text-sm font-medium text-gray-700 mt-4">Upload New Image (Leaves current if empty)</label>
                            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-800 hover:file:bg-gray-300 transition cursor-pointer">
                            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('izn-programs.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
                            <button type="submit" class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-6 rounded-md shadow-sm transition">Update Highlight</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
