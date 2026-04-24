<div x-data="{ eligibilities: [''] }" class="mb-6">
    <label class="block text-gray-700 font-bold mb-2">Eligibility Requirements</label>

    <template x-for="(item, index) in eligibilities" :key="index">
        <div class="flex gap-2 mb-2">
            <input type="text" x-model="eligibilities[index]" name="eligibility[]" class="form-input w-full rounded-md border-gray-300" placeholder="e.g. Must be a 3rd year student">

            <button type="button" @click="eligibilities.splice(index, 1)" class="bg-red-500 text-white px-3 py-2 rounded">Remove</button>
        </div>
    </template>

    <button type="button" @click="eligibilities.push('')" class="bg-blue-500 text-white px-4 py-2 rounded text-sm mt-2">
        + Add Requirement
    </button>
</div>
