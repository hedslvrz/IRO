<x-layouts::app.sidebar>
    @php
    // 1. FORMAT QUICK FACTS
    $rawFacts = old('quick_facts', $program->quick_facts);
    $formattedFacts = [];

    if (!empty($rawFacts) && is_array($rawFacts)) {
        // Check if it's using the old format (e.g., ['Duration' => '1 Semester'])
        if (!isset($rawFacts[0]['label'])) {
            foreach ($rawFacts as $key => $value) {
                // If the key is an integer, it means it's messed up, skip it or handle differently
                if (!is_numeric($key)) {
                    $formattedFacts[] = ['label' => $key, 'value' => $value];
                }
            }
        } else {
            // It's already in the correct new format
            $formattedFacts = $rawFacts;
        }
    }

    // Fallback to one empty row if completely empty
    if (empty($formattedFacts)) {
        $formattedFacts = [['label' => '', 'value' => '']];
    }

    // 2. FORMAT STRUCTURE
    $rawStructure = old('structure', $program->structure);
    $formattedStructure = [];

    if (!empty($rawStructure) && is_array($rawStructure)) {
        $formattedStructure = $rawStructure;
    }

    if (empty($formattedStructure)) {
        $formattedStructure = [['phase' => '', 'details' => '']];
    }
@endphp
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

            <form action="{{ route('academic-programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm sm:rounded-lg p-6 border-t-4 border-red-700 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Program Title</label>
                        <input type="text" name="title" value="{{ old('title', $program->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2">Program Image</label>

                        @if($program->image)
                            <div class="mb-3">
                                <span class="text-sm text-gray-500 block mb-1">Current Image:</span>
                                <img src="{{ asset('storage/' . $program->image) }}" alt="Current Image" class="h-40 w-auto rounded-lg border border-gray-300 shadow-sm object-cover">
                            </div>
                        @endif

                        <input type="file" name="image" class="block w-full border rounded p-2 bg-white" accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Upload a new image to replace the current one. Leave blank to keep the existing image.</p>
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

                <div class="mb-6" x-data="{ phases: @js($formattedStructure) }">
                    <label class="block font-bold mb-2">Program Structure</label>

                    <template x-for="(item, index) in phases" :key="index">
                        <div class="border p-4 rounded mb-2 bg-gray-50">
                            <input type="text" x-model="item.phase" :name="`structure[${index}][phase]`" class="border p-2 rounded w-full mb-2">
                            <textarea x-model="item.details" :name="`structure[${index}][details]`" class="border p-2 rounded w-full"></textarea>
                            <button type="button" @click="phases.splice(index, 1)" class="text-red-600 text-sm mt-2">Remove Phase</button>
                        </div>
                    </template>

                    <button type="button" @click="phases.push({ phase: '', details: '' })" class="bg-gray-800 text-white px-4 py-2 rounded text-sm">
                        + Add Phase
                    </button>
                </div>

                <div class="mb-6" x-data="{ facts: @js($formattedFacts) }">
                    <label class="block font-bold mb-2">Quick Facts</label>

                    <template x-for="(fact, index) in facts" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" x-model="fact.label" :name="`quick_facts[${index}][label]`" class="border p-2 rounded w-1/3">
                            <input type="text" x-model="fact.value" :name="`quick_facts[${index}][value]`" class="border p-2 rounded w-2/3">
                            <button type="button" @click="facts.splice(index, 1)" class="bg-red-500 text-white px-3 rounded">Remove</button>
                        </div>
                    </template>

                    <button type="button" @click="facts.push({ label: '', value: '' })" class="bg-gray-800 text-white px-4 py-2 rounded text-sm">
                        + Add Quick Fact
                    </button>
                </div>

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

                <div class="mb-4">
                    <label class="block font-bold mb-1">Global Opportunities & Outcomes</label>
                    <textarea name="opportunities" class="...">{{ old('opportunities', $program->opportunities) }}</textarea>
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
