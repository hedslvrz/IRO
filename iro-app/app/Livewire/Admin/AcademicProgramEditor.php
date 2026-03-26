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
