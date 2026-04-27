<x-layouts::app.sidebar>
    <flux:main>

    <div class="flex items-center gap-4">
        <a href="{{ route('colleges.index') }}" class="text-gray-500 hover:text-red-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            Edit Program: {{ $program->title }}
        </h2>
    </div>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('academic-programs.update', $program->id) }}" method="POST" class="bg-white shadow-sm sm:rounded-lg p-6 border-t-4 border-red-700 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Program Title</label>
                        <input type="text" name="title" value="{{ old('title', $program->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Belongs to College</label>
                        <select name="college_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach($colleges as $college)
                                <option value="{{ $college->id }}" {{ $program->college_id == $college->id ? 'selected' : '' }}>
                                    {{ $college->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Degree Level</label>
                        <input type="text" name="degree_level" value="{{ old('degree_level', $program->degree_level) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., Undergraduate">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Overview</label>
                    <textarea name="overview" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('overview', $program->overview) }}</textarea>
                </div>

                <hr class="my-8">

                @php
                    // Safely encode the existing JSON data or provide an empty array
                    $currentEligibility = json_encode(old('eligibility', $program->eligibility ?? ['']));
                @endphp

                <div x-data="{ items: {{ $currentEligibility }} }">
                    <label class="block text-lg font-bold text-red-900 mb-2">Eligibility Requirements</label>
                    <p class="text-sm text-gray-500 mb-4">Add the requirements one by one below.</p>

                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" x-model="items[index]" name="eligibility[]" class="form-input w-full rounded-md border-gray-300 shadow-sm" placeholder="Must pass entrance exam...">
                            <button type="button" @click="items.splice(index, 1)" class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-md font-bold">X</button>
                        </div>
                    </template>

                    <button type="button" @click="items.push('')" class="mt-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-md border border-gray-300">
                        + Add Requirement
                    </button>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-200 mt-8">
                    <button type="button"
                            onclick="if(confirm('Are you sure you want to permanently delete this program?')) { document.getElementById('delete-program-form').submit(); }"
                            class="text-red-600 hover:text-red-800 font-bold px-4 py-2 hover:bg-red-50 rounded-md transition-colors">
                        Delete Program
                    </button>

                    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow transition-colors">
                        Save Program Updates
                    </button>
                </div>
            </form>

            {{-- Hidden Delete Form --}}
            <form id="delete-program-form" action="{{ route('academic-programs.destroy', $program->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>

        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
