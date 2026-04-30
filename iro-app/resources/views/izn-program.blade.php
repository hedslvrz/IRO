<x-layouts::app.iro-sidebar>

    {{-- PAGE HEADER BANNERS --}}
    <div class="bg-red-900 py-14 border-b-4 border-red-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-red-950 opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">IZN Programs</h1>
            <p class="mt-4 text-red-100 text-lg md:text-xl max-w-2xl font-medium">
                Discover our Global Rankings and explore the dynamic international partnerships of Western Mindanao State University.
            </p>
        </div>
    </div>

    {{-- MAIN CONTENT WITH SECONDARY SIDEBAR --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col md:flex-row gap-10">

        {{-- SECONDARY SIDEBAR (Left Column) --}}
        <aside class="md:w-1/4 shrink-0">
            <div class="sticky top-24 bg-white rounded-xl shadow-sm border border-gray-200 p-5 border-t-4 border-t-red-700">
                <h3 class="font-bold text-gray-900 mb-4 px-3 uppercase tracking-wider text-xs">On this page</h3>

                <nav class="flex flex-col space-y-1">
                    <a href="#global-rankings" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        Global Rankings
                    </a>
                    <a href="#partnerships" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        Partnerships
                    </a>
                </nav>
            </div>
        </aside>

        {{-- CONTENT AREA (Right Column) --}}
        <main class="md:w-3/4 space-y-20">

            {{-- SECTION 1: IRO SEALS & CERTIFICATIONS --}}
            <section id="global-rankings" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">Global Rankings & Certifications</h2>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Western Mindanao State University's commitment to internationalization is recognized globally. Explore the prestigious rankings and certifications awarded to our institution, reflecting our dedication to quality assurance and global excellence.
                </p>

                {{-- Certifications Cards Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    @forelse($certifications as $cert)
                        {{-- Card: Padding reduced to p-6, gap reduced to gap-4 --}}
                        <div class="bg-white border-2 border-red-100 rounded-2xl p-6 flex flex-col items-center text-center gap-4 hover:border-red-400 hover:shadow-lg transition duration-300 group">

                            {{-- Seal/Logo Container (Reduced from w-40 to w-32 for a cleaner fit) --}}
                            <div class="w-32 h-32 shrink-0 bg-transparent flex items-center justify-center p-1">
                                @if($cert->logo_path)
                                    <img src="{{ asset('storage/' . $cert->logo_path) }}" alt="{{ $cert->name }} Seal" class="w-full h-full object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="{{ asset('images/wmsu-seal.png') }}" alt="WMSU Seal" class="w-full h-full object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-500">
                                @endif
                            </div>

                            {{-- Text Content (Font sizes scaled down slightly to match the new image size) --}}
                            <div class="flex flex-col justify-start w-full">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2 group-hover:text-red-800 transition px-2 line-clamp-2">
                                    {{ $cert->name }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed px-2">
                                    {{ $cert->description }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-10 col-span-1 md:col-span-2 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                            No certifications or seals have been added yet.
                        </p>
                    @endforelse

                </div>
            </section>

            {{-- SECTION 2: PARTNERSHIPS (Videos & Clips) --}}
            <section id="partnerships" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">Partnerships</h2>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Watch the highlights of our international collaborations, MoU signings, and cultural exchange programs with partner universities around the globe.
                </p>

                {{-- Video Gallery Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Video Item: US Travel Report_Sir Mario.mp4 --}}
                    <div class="group cursor-pointer">
                        {{-- Video Thumbnail Area --}}
                        <div class="relative w-full aspect-video bg-gray-900 rounded-xl overflow-hidden shadow-sm group-hover:shadow-lg transition duration-300">
                            {{-- Use a placeholder or extract a thumbnail image to represent the video --}}
                            <div class="absolute inset-0 bg-cover bg-center opacity-70 group-hover:scale-105 transition duration-500" style="background-image: url('{{ asset('images/us_travel_thumbnail.jpg') }}');"></div>
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition duration-300"></div>

                            {{-- Play Button Overlay --}}
                            <a href="{{ asset('videos/US Travel Report_Sir Mario.mp4') }}" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-red-600/90 text-white rounded-full flex items-center justify-center backdrop-blur-sm group-hover:bg-red-700 group-hover:scale-110 transition duration-300">
                                    <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </a>
                        </div>
                        {{-- Video Title/Info --}}
                        <div class="mt-4">
                            <h4 class="font-bold text-gray-900 group-hover:text-red-700 transition">US Travel Report</h4>
                            <p class="text-sm text-gray-500 mt-1">Video Clip</p>
                        </div>
                    </div>

                    {{-- Add more video items here if you have more videos --}}

                </div>
            </section>

        </main>
    </div>

</x-layouts::app.iro-sidebar>
