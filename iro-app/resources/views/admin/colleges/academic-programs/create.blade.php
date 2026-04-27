<x-layouts::app.sidebar>
    <flux:main>

        <div class="flex items-center gap-4">
            <a href="{{ route('colleges.index') }}" class="text-gray-500 hover:text-red-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                Add New Academic Program
            </h2>
        </div>
    
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4">
                    <ul class="list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('academic-programs.store') }}" method="POST" class="bg-white shadow-sm sm:rounded-lg p-6 border-t-4 border-red-700 space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Program Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="e.g., BS Computer Science">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Belongs to College</label>
                        <select name="college_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Select a College --</option>
                            @foreach($colleges as $college)
                                {{-- Pre-select the college if the admin clicked "Add New Program to [College]" --}}
                                <option value="{{ $college->id }}" {{ (old('college_id', $selectedCollegeId ?? '') == $college->id) ? 'selected' : '' }}>
                                    {{ $college->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Degree Level</label>
                        <input type="text" name="degree_level" value="{{ old('degree_level') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., Undergraduate">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Overview</label>
                    <textarea name="overview" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="Describe the program...">{{ old('overview') }}</textarea>
                </div>

                <hr class="my-8">

                {{-- We start with one blank input array item: [''] --}}
                <div x-data="{ items: [''] }">
                    <label class="block text-lg font-bold text-red-900 mb-2">Eligibility Requirements</label>
                    <p class="text-sm text-gray-500 mb-4">Add the requirements one by one below.</p>

                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" x-model="items[index]" name="eligibility[]" class="form-input w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., Must pass entrance exam...">
                            <button type="button" @click="items.splice(index, 1)" class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-md font-bold">X</button>
                        </div>
                    </template>

                    <button type="button" @click="items.push('')" class="mt-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-md border border-gray-300">
                        + Add Requirement
                    </button>
                </div>

                <div class="flex items-center justify-end pt-6 border-t border-gray-200 mt-8">
                    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-md shadow transition-colors">
                        Save New Program
                    </button>
                </div>
            </form>

        </div>
    </div>
    </flux:main>
</x-layouts::app.sidebar>
