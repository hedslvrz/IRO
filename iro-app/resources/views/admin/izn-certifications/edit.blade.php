<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('Edit Certification') }}
        </h2>


    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('izn-certifications.update', $certification->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT') {{-- Required for update requests --}}

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Certification Name</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" value="{{ old('name', $certification->name) }}">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Short Description</label>
                            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('description', $certification->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Logo</label>
                            @if($certification->logo_path)
                                <img src="{{ asset('storage/' . $certification->logo_path) }}" alt="Current Logo" class="h-24 w-24 object-contain border rounded-md mb-2">
                            @else
                                <p class="text-sm text-gray-500 mb-2">No logo currently uploaded.</p>
                            @endif

                            <label for="logo" class="block text-sm font-medium text-gray-700 mt-4">Upload New Seal / Logo (Leaves current if empty)</label>
                            <input type="file" name="logo" id="logo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition">
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('izn-certifications.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow-sm transition">Update Certification</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</flux:main>
</x-layouts::app.sidebar>
