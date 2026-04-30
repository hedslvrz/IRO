<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Add New Certification') }}
        </h2>


    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('izn-certifications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Certification Name</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition" value="{{ old('name') }}" placeholder="e.g., QS Stars University Rating">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Short Description</label>
                            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 transition" placeholder="A brief description of this seal/certification...">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Image Upload & Live Preview Section (Matching Edit Page Style) --}}
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Seal / Logo Preview</label>

                            {{-- Container where the preview will appear --}}
                            <div id="image-preview-container" class="h-32 w-32 bg-white border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center mb-4 overflow-hidden transition-all duration-300">
                                <img id="image-preview" src="#" alt="Image Preview" class="hidden h-full w-full object-contain p-2">
                                <span id="placeholder-text" class="text-xs text-gray-400 text-center px-2">No image selected</span>
                            </div>

                            <label for="logo" class="block text-sm font-medium text-gray-700 mt-4">Upload Seal / Logo</label>
                            <input type="file" name="logo" id="logo" accept="image/*" onchange="previewImage(event)" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition cursor-pointer">
                            <p class="text-xs text-gray-500 mt-2">Recommended: PNG with transparent background.</p>
                            @error('logo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('izn-certifications.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow-sm transition">Save Certification</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Small JavaScript snippet to make the image preview work instantly --}}
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder-text');
            const container = document.getElementById('image-preview-container');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Show the image
                    placeholder.classList.add('hidden'); // Hide the text

                    // Change border style so it looks uploaded
                    container.classList.remove('border-dashed');
                    container.classList.add('border-solid', 'border-gray-200');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                // Reset if user cancels file selection
                preview.src = '#';
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
                container.classList.add('border-dashed');
                container.classList.remove('border-solid', 'border-gray-200');
            }
        }
    </script>
</flux:main>
</x-layouts::app.sidebar>
