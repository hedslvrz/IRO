<x-layouts::app.iro-sidebar>

    {{-- PAGE HEADER BANNERS (Now using WMSU Crimson Red) --}}
    <div class="bg-red-900 py-14 border-b-4 border-red-600 relative overflow-hidden">
        {{-- Optional: A subtle background pattern or overlay can go here --}}
        <div class="absolute inset-0 bg-red-950 opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">About Us</h1>
            <p class="mt-4 text-red-100 text-lg md:text-xl max-w-2xl font-medium">
                Learn more about Western Mindanao State University and the mission of the International Relations Office.
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
                    {{-- Hover effects changed to WMSU Red --}}
                    <a href="#wmsu-profile" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        WMSU Profile
                    </a>
                    <a href="#vision-mission" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        Vision & Mission
                    </a>
                    <a href="#quality-policy" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        Quality Policy
                    </a>
                    <a href="#office-function" class="px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-red-50 hover:text-red-700 transition">
                        Office Function
                    </a>
                </nav>
            </div>
        </aside>

        {{-- CONTENT AREA (Right Column) --}}
        <main class="md:w-3/4 space-y-20">

            {{-- SECTION 1: WMSU Profile --}}
            <section id="wmsu-profile" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">WMSU Profile</h2>

                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4 mb-8">
                    <p>{!! nl2br(e($about->wmsu_profile ?? 'Profile information coming soon.')) !!}</p>
                </div>

                {{-- Show the Video Player ONLY if a video has been uploaded --}}
                @if(!empty($about->video_path))
                    <div class="mt-8 bg-gray-900 rounded-2xl overflow-hidden shadow-xl border-4 border-red-900 relative aspect-video group">
                        <video class="w-full h-full object-cover outline-none" controls preload="metadata">
                            <source src="{{ asset('storage/' . $about->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            </section>

            {{-- SECTION 2: VISION & MISSION --}}
            <section id="vision-mission" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-6 border-b-2 border-red-100 pb-3">Vision & Mission</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Vision Card --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition group hover:border-red-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-red-100 rounded-lg text-red-700 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-800 transition-colors">Our Vision</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            {{ $about->vision ?? 'Vision statement coming soon.' }}
                        </p>
                    </div>

                    {{-- Mission Card --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition group hover:border-red-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-red-100 rounded-lg text-red-700 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-800 transition-colors">Our Mission</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            {{ $about->mission ?? 'Mission statement coming soon.' }}
                        </p>
                    </div>
                </div>
            </section>

            {{-- SECTION 3: Quality Policy --}}
            <section id="quality-policy" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">Quality Policy</h2>

                {{-- Quote block tinted with subtle red --}}
                <div class="bg-red-50 border-l-4 border-red-600 p-6 rounded-r-lg shadow-sm">
                    <p class="italic text-gray-700 text-lg leading-relaxed text-center font-medium">
                        "{{ $about->quality_policy_1 ?? 'First policy statement.' }}"
                    </p>
                    <br>
                    <p class="italic text-gray-700 text-lg leading-relaxed text-center font-medium">
                        "{{ $about->quality_policy_2 ?? 'Second policy statement.' }}"
                    </p>
                </div>
            </section>

            {{-- SECTION 4: IRO Mandate & Pillars (Feature Row Layout) --}}
            <section id="office-function" class="scroll-mt-24 pt-12">

                {{-- Header & Mandate --}}
                <div class="text-center mb-16 px-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-red-900 mb-4 tracking-tight">What We Do</h2>
                    <div class="w-24 h-1.5 bg-red-600 mx-auto rounded-full mb-8"></div>
                    <div class="bg-gray-50 border-l-4 border-red-600 max-w-4xl mx-auto p-6 rounded-r-2xl shadow-sm text-left">
                        <p class="text-gray-700 text-lg leading-relaxed font-medium">
                            {{ $about->iro_mandate ?? 'The International Relations Office (IRO) is mandated to establish partnerships in support of WMSU as a Smart Research University, operating under the supervision of the Office of the President.' }}
                        </p>
                    </div>
                </div>

                {{-- The 3 Pillars (Horizontal Layout for Variable Lengths) --}}
                <div class="space-y-12">

                    {{-- Pillar 1: Functions --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 hover:border-red-200 transition-colors group flex flex-col md:flex-row gap-8 items-start">
                        <div class="md:w-1/3 shrink-0">
                            <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                                {{-- Briefcase Icon --}}
                                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Functions & Activities</h3>
                            <p class="text-sm text-gray-500 mt-2">The core operational responsibilities guiding our daily efforts.</p>
                        </div>

                        <div class="md:w-2/3">
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @if($about->iro_functions)
                                    @foreach(explode(PHP_EOL, $about->iro_functions) as $item)
                                        @if(trim($item))
                                            <li class="flex items-start text-base text-gray-600 bg-gray-50 p-4 rounded-xl border border-transparent hover:border-red-100 transition">
                                                <svg class="w-6 h-6 text-red-500 mr-3 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                <span class="leading-relaxed">{{ $item }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="text-gray-500 italic">Functions coming soon.</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Pillar 2: Programs (Reversed Layout for Visual Variety) --}}
                    <div class="bg-red-50 rounded-2xl shadow-inner border border-red-100 p-8 md:p-10 transition-colors group flex flex-col md:flex-row-reverse gap-8 items-start">
                        <div class="md:w-1/3 shrink-0">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:bg-red-600 transition-colors">
                                {{-- Globe Icon --}}
                                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Core Programs</h3>
                            <p class="text-sm text-gray-600 mt-2">Strategic initiatives connecting WMSU to the global academic community.</p>
                        </div>

                        <div class="md:w-2/3">
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @if($about->iro_programs)
                                    @foreach(explode(PHP_EOL, $about->iro_programs) as $item)
                                        @if(trim($item))
                                            <li class="flex items-start text-base text-gray-700 bg-white p-4 rounded-xl shadow-sm border border-transparent hover:border-red-200 transition">
                                                <svg class="w-6 h-6 text-red-600 mr-3 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                <span class="leading-relaxed">{{ $item }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="text-gray-500 italic">Programs coming soon.</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Pillar 3: Services --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 hover:border-red-200 transition-colors group flex flex-col md:flex-row gap-8 items-start">
                        <div class="md:w-1/3 shrink-0">
                            <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                                {{-- Hands/Service Icon --}}
                                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Services Provided</h3>
                            <p class="text-sm text-gray-500 mt-2">Comprehensive support ensuring seamless international collaboration.</p>
                        </div>

                        <div class="md:w-2/3">
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @if($about->iro_services)
                                    @foreach(explode(PHP_EOL, $about->iro_services) as $item)
                                        @if(trim($item))
                                            <li class="flex items-start text-base text-gray-600 bg-gray-50 p-4 rounded-xl border border-transparent hover:border-red-100 transition">
                                                <svg class="w-6 h-6 text-red-500 mr-3 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                <span class="leading-relaxed">{{ $item }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="text-gray-500 italic">Services coming soon.</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>

</x-layouts::app.iro-sidebar>




