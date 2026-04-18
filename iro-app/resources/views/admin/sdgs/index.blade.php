<x-layouts::app.sidebar>
    <flux:main>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Manage Sustainability Goals (SDGs)') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message for Success --}}
            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b-2 border-[#990000] pb-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Manage Sustainability Goals</h1>
                <p class="text-gray-600 mt-1">Manage all sustainability goals and their associated topics.</p>
            </div>
        </div>

            {{-- Data Table Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">

                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider w-16">SDG #</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider w-32">Image</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Title & Overview</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($sdgs as $sdg)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-lg font-bold text-[#990000]">{{ $sdg->sdg_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($sdg->image_path)
                                            <img src="{{ asset('storage/' . $sdg->image_path) }}" alt="SDG {{ $sdg->sdg_number }}" class="w-16 h-16 object-cover rounded shadow-sm">
                                        @else
                                            <span class="text-xs text-gray-400 italic">No image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900 mb-1">{{ $sdg->title }}</div>
                                        <div class="text-xs text-gray-500 line-clamp-2">{{ $sdg->overview }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.sdgs.edit', $sdg->id) }}" class="inline-flex items-center bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-900 px-3 py-1.5 rounded-md transition duration-150">
                                            Edit & Manage Topics
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        No SDGs found in the database. Please run your seeder.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</flux:main>
</x-layouts::app.sidebar>
