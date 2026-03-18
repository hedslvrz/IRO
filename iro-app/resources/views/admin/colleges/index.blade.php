<x-layouts::app.sidebar>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Manage Colleges') }}
            </h2>
            {{-- Add New Button --}}
            <a href="{{ route('colleges.create') }}" class="inline-flex items-center bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New College
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message for Success --}}
            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Data Table Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">College Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Slug</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{-- Loop through colleges passed from the controller --}}
                            @forelse ($colleges as $college)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $college->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $college->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $college->slug }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        {{-- Edit Button --}}
                                        <a href="{{ route('colleges.edit', $college->id) }}" class="text-blue-600 hover:text-blue-900 mr-4 inline-flex items-center">
                                            Edit
                                        </a>

                                        {{-- Delete Button (Must be a form to use DELETE method securely) --}}
                                        <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this college? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        No colleges found. Click "Add New College" to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination Links (if you have many colleges) --}}
                    @if($colleges->hasPages())
                        <div class="mt-4">
                            {{ $colleges->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layouts::app.sidebar>
