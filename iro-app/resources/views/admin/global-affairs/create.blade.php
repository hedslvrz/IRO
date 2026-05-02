<x-layouts::app.sidebar>
    <flux:main>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">Add Global Affairs Service</h2>


    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
            <div class="p-6">
                <form action="{{ route('global-affairs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="document.getElementById('submit-btn').disabled = true; document.getElementById('submit-btn').innerText = 'Saving...';">
                    @csrf

                    {{-- Core Information --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Core Information</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Service Title</label>
                            <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-200"></textarea>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-bold text-blue-900">External Links</h3>
                            <button type="button" onclick="addLinkRow()" class="text-xs bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">+ Add Link</button>
                        </div>

                        <div id="links-container" class="space-y-3">
                            <!-- JS will inject link rows here -->
                        </div>
                    </div>

                    {{-- Dynamic Files Section --}}
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-bold text-green-900">Downloadable Files</h3>
                            <button type="button" onclick="addFileRow()" class="text-xs bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">+ Add File</button>
                        </div>

                        <div id="files-container" class="space-y-3">
                            <!-- JS will inject file rows here -->
                        </div>
                    </div>

                    <script>
                        function addLinkRow() {
                            const container = document.getElementById('links-container');
                            const row = document.createElement('div');
                            row.className = "flex gap-4 items-end bg-white p-3 rounded border border-blue-200";
                            row.innerHTML = `
                                <div class="flex-1">
                                    <label class="block text-xs text-gray-600">Button Label</label>
                                    <input type="text" name="links[label][]" class="w-full text-sm border-gray-300 rounded" placeholder="e.g., Visit Portal">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-xs text-gray-600">URL</label>
                                    <input type="url" name="links[url][]" class="w-full text-sm border-gray-300 rounded" placeholder="https://...">
                                </div>
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 px-2 py-2">X</button>
                            `;
                            container.appendChild(row);
                        }

                        function addFileRow() {
                            const container = document.getElementById('files-container');
                            const row = document.createElement('div');
                            row.className = "flex gap-4 items-end bg-white p-3 rounded border border-green-200";
                            row.innerHTML = `
                                <div class="flex-1">
                                    <label class="block text-xs text-gray-600">Button Label</label>
                                    <input type="text" name="files[label][]" class="w-full text-sm border-gray-300 rounded" placeholder="e.g., Download Form A">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-xs text-gray-600">Upload File</label>
                                    <input type="file" name="files[upload][]" class="w-full text-sm text-gray-600">
                                </div>
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 px-2 py-2">X</button>
                            `;
                            container.appendChild(row);
                        }
                    </script>

                    <div class="flex items-center justify-end space-x-4 pt-4 mt-6 border-t border-gray-100">
                        <a href="{{ route('global-affairs.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors">
                            Cancel
                        </a>
                        <button id="submit-btn" type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow-sm transition-colors">
                            Save Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts::app.sidebar>
