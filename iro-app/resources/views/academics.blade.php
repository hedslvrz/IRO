<x-layouts::app.iro-sidebar>

    @php
        // 1. Fetch the data at the top
        $accreditedCategories = \App\Models\AccreditedProgram::with('programs')->orderBy('order_index')->get();
    @endphp

    {{-- PAGE HEADER BANNERS --}}
    <div class="bg-red-900 py-14 border-b-4 border-red-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-red-950 opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">Accredited Programs</h1>
            <p class="mt-4 text-red-100 text-lg md:text-xl max-w-3xl mx-auto font-medium">
                Western Mindanao State University (WMSU) stands as a beacon of inclusive and transformative education, offering 83 courses that are truly for the masses.
            </p>
        </div>
    </div>

    {{-- MAIN CONTENT: ACADEMIC ACCORDIONS --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="mb-10 text-center">
            <h2 class="text-2xl font-bold text-red-900">Explore Our Colleges</h2>
            <p class="text-gray-600 mt-2">Click on any college to view the specific accredited programs offered.</p>
        </div>

        {{-- Single Column Stack for Accordions --}}
        <div class="flex flex-col space-y-4">

            @foreach($accreditedCategories as $category)

        <flux:heading size="xl" class="mb-4">{{ $category->name }}</flux:heading>
        <flux:subheading class="mb-6">{{ $category->description }}</flux:subheading>

        <div class="grid gap-6 md:grid-cols-3 mb-12">

            @foreach($category->programs as $program)

                <a href="{{ route('academics.show', $program->slug) }}" class="group">
                    <flux:card class="transition-all hover:border-[#990000] hover:shadow-md">
                        <flux:heading size="lg">{{ $program->title }}</flux:heading>
                        <flux:text class="line-clamp-2 mt-2">{{ $program->short_description }}</flux:text>
                    </flux:card>
                </a>

            @endforeach
        </div>
    @endforeach

        </div>
    </div>

</x-layouts::app.iro-sidebar>
