<div>
    <div class="flex items-center justify-between mb-8">
        <div>
            <flux:button href="{{ route('admin.academics') }}" variant="ghost" icon="arrow-left" class="mb-2 -ml-3">Back to Programs</flux:button>
            <flux:heading size="2xl">Manage Sections: {{ $program->title }}</flux:heading>
            <flux:subheading>Add, edit, or rearrange the sections shown on the public page for this program.</flux:subheading>
        </div>

        <flux:button variant="primary" icon="plus">Add New Section</flux:button>
    </div>

    <div class="space-y-4">
        @forelse($program->sections as $section)
            <flux:card class="flex justify-between items-center group">
                <div>
                    <flux:heading size="lg">{{ $section->section_title }}</flux:heading>
                    <flux:text class="text-sm text-gray-500">Order: {{ $section->order_index }}</flux:text>
                </div>
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <flux:button size="sm" variant="ghost" icon="pencil">Edit</flux:button>
                    <flux:button size="sm" variant="danger" icon="trash">Delete</flux:button>
                </div>
            </flux:card>
        @empty
            <flux:card class="text-center py-12">
                <flux:heading size="lg" class="mb-2">No Sections Found</flux:heading>
                <flux:text class="mb-4">This program currently has an empty page. Add a section like "Overview" or "Curriculum" to get started.</flux:text>
                <flux:button variant="primary" icon="plus">Add First Section</flux:button>
            </flux:card>
        @endforelse
    </div>
</div>
