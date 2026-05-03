<x-layouts::app.sidebar>
    <flux:main>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('colleges.index') }}" class="text-gray-500 hover:text-red-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Add New College') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Form validation errors --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4">
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('colleges.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">College Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                   placeholder="e.g., College of Engineering">
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">
                                Custom URL Slug <span class="text-gray-400 font-normal">(Optional - will auto-generate if left blank)</span>
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                   placeholder="e.g., college-of-engineering">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                      placeholder="Brief overview of the college...">{{ old('description') }}</textarea>
                        </div>

                        <div class="flex justify-end pt-4 border-t border-gray-100">
                            <a href="{{ route('colleges.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-3">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Save College
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
