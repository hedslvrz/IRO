<x-layouts::app.sidebar>
    <flux:main>

        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Manage IZN Programs') }}
            </h2>
            {{-- Add New Button --}}
            <a href="{{ route('izn-certifications.create') }}" class="inline-flex items-center bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Certification
            </a>
        </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Logo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($certifications as $cert)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($cert->logo_path)
                                            <img src="{{ asset('storage/' . $cert->logo_path) }}" alt="Logo" class="h-10 w-10 rounded-md object-cover border">
                                        @else
                                            <span class="text-gray-400 text-xs">No Logo</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $cert->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $cert->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('izn-certifications.edit', $cert->id) }}" class="text-blue-600 hover:text-blue-900 mr-4 inline-flex items-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('izn-certifications.destroy', $cert->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this certification?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        No certifications found. Click "Add Certification" to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if($certifications->hasPages())
                        <div class="mt-4">{{ $certifications->links() }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</flux:main>
</x-layouts::app.sidebar>
