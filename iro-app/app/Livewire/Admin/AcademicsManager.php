<?php

namespace App\Livewire\Admin;

use App\Models\AccreditedProgram;
use App\Models\AcademicProgram;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AcademicsManager extends Component
{
    public function render()
    {
        return view('livewire.admin.academics-manager', [
            'categories' => AccreditedProgram::with('programs')->orderBy('id')->get()
        ]);
    }
}
