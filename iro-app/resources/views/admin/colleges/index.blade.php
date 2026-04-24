<x-layouts::app.sidebar>
    <flux:main>
        <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Manage Colleges & Programs') }}
            </h2>
            {{-- Add New College Button --}}
            <a href="{{ route('colleges.create') }}" class="inline-flex items-center bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New College
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col space-y-4">
                @forelse($colleges as $college)
                    <details class="group bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden [&_summary::-webkit-details-marker]:hidden">

                        {{-- DROPDOWN HEADER (College Info & Actions) --}}
                        <summary class="flex items-center justify-between cursor-pointer p-5 bg-white hover:bg-gray-50 transition-colors duration-200">
                            <div class="flex items-center gap-4">
                                <div class="p-2.5 bg-red-100 rounded-lg text-red-700 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-lg">{{ strtoupper($college->name) }}</h3>
                                    <div class="flex items-center gap-3 mt-1 text-sm">
                                        <a href="{{ route('colleges.edit', $college->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit College Info</a>
                                        <span class="text-gray-300">|</span>
                                        <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure? This will delete the college AND all programs inside it.');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete College</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Expand Icon --}}
                            <span class="transition-transform duration-300 group-open:-rotate-180">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" width="24" class="text-gray-500"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>

                        {{-- DROPDOWN CONTENT (Programs List) --}}
                        <div class="px-7 py-5 border-t border-gray-100 bg-gray-50">
                            @if($college->programs->count() > 0)
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6">
                                    @foreach($college->programs as $program)
                                        <li>
                                            {{-- Links directly to the Edit Program page! --}}
                                            <a href="{{ route('academic-programs.edit', $program->id) }}" class="flex items-center text-[15px] font-medium text-gray-700 hover:text-red-700 hover:translate-x-1 transition-all duration-200">
                                                <svg class="w-4 h-4 mr-2.5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                {{ $program->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 text-sm italic">No programs added to this college yet.</p>
                            @endif

                            {{-- Add Program Button specifically for this college --}}
                            <div class="mt-5 pt-4 border-t border-gray-200">
                                <a href="{{ route('academic-programs.create', ['college_id' => $college->id]) }}" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-red-900">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Add New Program to {{ $college->name }}
                                </a>
                            </div>
                        </div>
                    </details>
                @empty
                    <div class="text-center py-10 bg-white rounded-xl border border-gray-200">
                        <p class="text-gray-500 mb-4">No colleges found.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
