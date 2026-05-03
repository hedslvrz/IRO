<x-layouts::app.iro-sidebar>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Global Affairs & Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-red-900 py-14 border-b-4 border-red-600 relative overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">Global Affairs Services</h1>
            <p class="mt-4 text-red-100 text-lg max-w-2xl mx-auto font-medium">
                Discover the various internationalization opportunities, mobility programs, and official travel services offered by the WMSU IRO.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
                {{-- Refined WMSU Card --}}
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 border-t-4 border-t-red-800 flex flex-col relative overflow-hidden group">

                    {{-- Optional: Subtle watermark icon in the top right for depth --}}
                    <div class="absolute -right-6 -top-6 opacity-5 group-hover:opacity-10 transition-opacity duration-500 pointer-events-none">
                        <svg class="w-32 h-32 text-red-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>

                    <div class="p-6 md:p-8 flex flex-col grow z-10">

                        {{-- Header Area --}}
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 leading-snug group-hover:text-red-800 transition-colors duration-300">
                                {{ $service->title }}
                            </h3>
                        </div>

                        {{-- Description --}}
                        <p class="text-gray-600 leading-relaxed text-sm mb-8 grow">
                            {{ $service->description }}
                        </p>

                        {{-- Action Area (Refined Buttons) --}}
                        <div class="mt-auto space-y-3">

                            @foreach($service->attachments as $attachment)

                                @if($attachment->type === 'link')
                                    <a href="{{ $attachment->path_or_url }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-red-50 text-red-800 text-sm font-semibold rounded-lg hover:bg-red-800 hover:text-white transition-colors duration-300">
                                        {{ $attachment->label }}
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @endif

                                @if($attachment->type === 'file')
                                    <a href="{{ asset('storage/' . $attachment->path_or_url) }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:border-red-800 hover:text-red-800 transition-colors duration-300 shadow-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        {{ $attachment->label }}
                                    </a>
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full py-16 text-center text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    No records available at the moment.
                </div>
            @endforelse

        </div>
    </div>
</x-layouts::app.iro-sidebar>
