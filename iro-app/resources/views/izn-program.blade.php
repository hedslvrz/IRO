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

                {{-- Dynamic Posts Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse($partnerships as $post)
                        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-xl hover:border-red-200 transition duration-300 group flex flex-col">

                            {{-- Post Featured Image or Video--}}
                            <div class="aspect-video bg-black overflow-hidden relative border-b border-gray-100 flex items-center justify-center group">
                                @if($post->image_path)
                                    {{-- Changed object-cover to object-contain so nothing is ever cropped --}}
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-700">
                                @elseif($post->video_path)
                                    {{-- Video is also object-contain --}}
                                    <video class="w-full h-full object-contain" controls preload="metadata">
                                        <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    {{-- Fallback --}}
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Post Content --}}
                            <div class="p-6 flex flex-col grow">
                                <h4 class="font-bold text-gray-900 text-lg mb-3 group-hover:text-red-700 transition line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <p class="text-sm text-gray-600 line-clamp-3 mb-4 leading-relaxed grow">
                                    {{ $post->description }}
                                </p>

                                {{-- Date Footer --}}
                                <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400 font-medium">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $post->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-12 col-span-1 md:col-span-2 lg:col-span-3 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            No partnership highlights have been posted yet.
                        </p>
                    @endforelse

                </div>
            </section>

        </main>
    </div>

</x-layouts::app.iro-sidebar>
