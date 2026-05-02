<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">Edit Global Affairs Service</h2>


    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
            <div class="p-6">
                <form action="{{ route('global-affairs.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="document.getElementById('submit-btn').disabled = true; document.getElementById('submit-btn').innerText = 'Updating...';">
                    @csrf
                    @method('PUT')

                    {{-- Core Information --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Core Information</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Service Title</label>
                            <input type="text" name="title" required value="{{ old('title', $service->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">{{ old('description', $service->description) }}</textarea>
                        </div>
                    </div>

                    {{-- EXISTING ATTACHMENTS (Read & Delete Only) --}}
                    @if($service->attachments->count() > 0)
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                            <h3 class="text-md font-bold text-gray-900 mb-3">Current Attachments</h3>
                            <p class="text-xs text-gray-500 mb-4">Check the box next to any item you wish to permanently remove upon saving.</p>

                            <div class="space-y-3">
                                @foreach($service->attachments as $attachment)
                                    <div class="flex items-center justify-between bg-white p-3 border {{ $attachment->type == 'link' ? 'border-blue-200' : 'border-green-200' }} rounded-md shadow-sm">
                                        <div class="flex items-center space-x-3">
                                            {{-- Icon based on type --}}
                                            @if($attachment->type == 'link')
                                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-bold uppercase tracking-wider">Link</span>
                                            @else
                                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold uppercase tracking-wider">File</span>
                                            @endif

                                            <div class="flex flex-col">
                                                <span class="text-sm font-bold text-gray-800">{{ $attachment->label }}</span>
                                                @if($attachment->type == 'link')
                                                    <a href="{{ $attachment->path_or_url }}" target="_blank" class="text-xs text-blue-600 hover:underline truncate max-w-xs">{{ $attachment->path_or_url }}</a>
                                                @else
                                                    <a href="{{ asset('storage/' . $attachment->path_or_url) }}" target="_blank" class="text-xs text-green-600 hover:underline truncate max-w-xs">View Uploaded File</a>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Delete Checkbox --}}
                                        <label class="flex items-center space-x-2 text-sm text-red-600 hover:bg-red-50 px-3 py-2 rounded cursor-pointer transition">
                                            <input type="checkbox" name="remove_attachments[]" value="{{ $attachment->id }}" class="form-checkbox text-red-600 border-red-300 rounded focus:ring-red-500 h-5 w-5">
                                            <span class="font-semibold">Remove</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- ADD NEW LINKS --}}
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-bold text-blue-900">Add New External Links</h3>
                            <button type="button" onclick="addLinkRow()" class="text-xs bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 shadow-sm">+ Add New Link</button>
                        </div>
                        <div id="links-container" class="space-y-3">
                            <!-- JS will inject link rows here -->
                        </div>
                    </div>

                    {{-- ADD NEW FILES --}}
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-bold text-green-900">Add New Downloadable Files</h3>
                            <button type="button" onclick="addFileRow()" class="text-xs bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 shadow-sm">+ Add New File</button>
                        </div>
                        <div id="files-container" class="space-y-3">
                            <!-- JS will inject file rows here -->
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('global-affairs.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
                        <button id="submit-btn" type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow-sm transition">
                            Update Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Reusable JS for dynamic rows --}}
    <script>
        function addLinkRow() {
            const container = document.getElementById('links-container');
            const row = document.createElement('div');
            row.className = "flex gap-4 items-end bg-white p-3 rounded border border-blue-200 shadow-sm";
            row.innerHTML = `
                <div class="flex-1">
                    <label class="block text-xs text-gray-600 mb-1">Button Label</label>
                    <input type="text" name="links[label][]" class="w-full text-sm border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Visit Portal">
                </div>
                <div class="flex-1">
                    <label class="block text-xs text-gray-600 mb-1">URL</label>
                    <input type="url" name="links[url][]" class="w-full text-sm border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="https://...">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-white bg-red-500 hover:bg-red-600 px-3 py-2 rounded text-sm font-bold shadow-sm transition">X</button>
            `;
            container.appendChild(row);
        }

        function addFileRow() {
            const container = document.getElementById('files-container');
            const row = document.createElement('div');
            row.className = "flex gap-4 items-end bg-white p-3 rounded border border-green-200 shadow-sm";
            row.innerHTML = `
                <div class="flex-1">
                    <label class="block text-xs text-gray-600 mb-1">Button Label</label>
                    <input type="text" name="files[label][]" class="w-full text-sm border-gray-300 rounded focus:ring-green-500 focus:border-green-500" placeholder="e.g., Download Form A">
                </div>
                <div class="flex-1">
                    <label class="block text-xs text-gray-600 mb-1">Upload New File</label>
                    <input type="file" name="files[upload][]" class="w-full text-sm text-gray-600 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer transition">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-white bg-red-500 hover:bg-red-600 px-3 py-2 rounded text-sm font-bold shadow-sm transition">X</button>
            `;
            container.appendChild(row);
        }
    </script>
</flux:main>
</x-layouts::app.sidebar>
