<?php

namespace App\Livewire\Admin;

use App\Models\AcademicProgram;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AcademicProgramEditor extends Component
{
    public AcademicProgram $program;

    public function mount(AcademicProgram $program)
    {
        $this->program = $program;
    }

    public function render()
    {
        return view('livewire.admin.academic-program-editor');
    }
}
?>

<div>
    <div>
    <div class="flex items-center justify-between mb-8">
        <div>
            <flux:heading size="2xl">Academics Management</flux:heading>
            <flux:subheading>Manage accredited categories and their specific academic programs.</flux:subheading>
        </div>

        <flux:button variant="primary" icon="plus">Add Category</flux:button>
    </div>

    <div class="space-y-8">
        @forelse($categories as $category)
            <flux:card>
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <div>
                        <flux:heading size="lg">{{ $category->name }}</flux:heading>
                        <flux:text class="text-sm text-gray-500">{{ $category->description }}</flux:text>
                    </div>
                    <div class="flex gap-2">
                        <flux:button size="sm" variant="ghost" icon="pencil">Edit</flux:button>
                        <flux:button size="sm" variant="primary" icon="plus">Add Program</flux:button>
                    </div>
                </div>

                @if($category->programs->count() > 0)
                    <flux:table>
                        <flux:columns>
                            <flux:column>Program Title</flux:column>
                            <flux:column>Status</flux:column>
                            <flux:column>Actions</flux:column>
                        </flux:columns>

                        <flux:rows>
                            @foreach($category->programs as $program)
                                <flux:row>
                                    <flux:cell class="font-medium">{{ $program->title }}</flux:cell>
                                    <flux:cell>
                                        <flux:badge color="{{ $program->is_active ? 'green' : 'gray' }}">
                                            {{ $program->is_active ? 'Active' : 'Hidden' }}
                                        </flux:badge>
                                    </flux:cell>
                                    <flux:cell>
                                        <flux:button href="{{ route('admin.academics.edit', $program->id) }}" size="sm" variant="ghost">Manage Sections</flux:button>
                                    </flux:cell>
                                </flux:row>
                            @endforeach
                        </flux:rows>
                    </flux:table>
                @else
                    <flux:text class="text-sm text-gray-400 italic py-4">No programs added under this category yet.</flux:text>
                @endif
            </flux:card>
        @empty
            <flux:card class="text-center py-12">
                <flux:heading size="lg" class="mb-2">No Accredited Programs Found</flux:heading>
                <flux:text class="mb-4">Get started by adding your first accreditation category (e.g., Level III Re-Accredited).</flux:text>
                <flux:button variant="primary" icon="plus">Add First Category</flux:button>
            </flux:card>
        @endforelse
    </div>
</div>
</div>
