<x-layouts::app.iro-sidebar>

    <flux:main>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <a href="/academics" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-[#990000] mb-8 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Academic Programs
            </a>

            <div class="relative w-full h-75 md:h-100 rounded-3xl overflow-hidden shadow-lg mb-12 bg-gray-900 flex items-end bg-cover bg-center"
                style="background-image: url('{{ $program->image ? asset('storage/' . $program->image) : 'https://placehold.co/1200x500/990000/ffffff?text=No+Image' }}');">

                <div class="absolute inset-0 bg-black/50 bg-linear-to-t from-black via-black/60 to-transparent"></div>

                <div class="relative z-10 p-8 md:p-12 w-full">
                    <div class="flex flex-wrap gap-3 mb-4">
                        <span class="bg-[#990000] text-white text-xs font-bold uppercase tracking-wider py-1.5 px-4 rounded-full shadow-sm">
                            {{ $program->category }}
                        </span>
                        @if($program->degree_level)
                            <span class="bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-bold uppercase tracking-wider py-1.5 px-4 rounded-full shadow-sm">
                                {{ $program->degree_level }}
                            </span>
                        @endif
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight drop-shadow-md">
                        {{ $program->title }}
                    </h1>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <div class="lg:col-span-2 space-y-12">

                    <section>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-red-100 pb-2 flex items-center gap-3">
                            <svg class="w-7 h-7 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Program Overview
                        </h2>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            {{ $program['overview'] }}
                        </p>
                    </section>

                @if(!empty($program->structure))
                    <section x-data="{ activeTab: 0 }">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-red-100 pb-2 flex items-center gap-3">
                            <svg class="w-7 h-7 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            Program Structure
                        </h2>
                        <div class="space-y-3">
                            @foreach($program->structure as $index => $item)
                                <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                                    <button @click="activeTab === {{ $index }} ? activeTab = null : activeTab = {{ $index }}"
                                            class="w-full flex justify-between items-center p-5 text-left focus:outline-none hover:bg-gray-50 transition-colors">
                                        <span class="font-bold text-lg" :class="activeTab === {{ $index }} ? 'text-[#990000]' : 'text-gray-800'">
                                            {{ $item['phase'] }}
                                        </span>
                                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="activeTab === {{ $index }} ? 'rotate-180 text-[#990000]' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <div x-show="activeTab === {{ $index }}" x-collapse x-cloak>
                                        <div class="p-5 pt-0 text-gray-600 bg-white border-t border-gray-50">
                                            {{ $item['details'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if(!empty($program->eligibility))
                    <section>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-red-100 pb-2 flex items-center gap-3">
                            <svg class="w-7 h-7 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Eligibility & Requirements
                        </h2>
                        <ul class="space-y-4">
                            @foreach($program->eligibility as $req)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-[#990000] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <span class="text-gray-700 text-lg">{{ $req }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                @endif

                    <section class="bg-[#990000]/5 p-8 rounded-2xl border border-[#990000]/20">
                        <h2 class="text-2xl font-bold text-[#990000] mb-4 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Global Opportunities & Outcomes
                        </h2>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ $program->opportunities }}
                        </p>
                    </section>

                </div>

                <aside class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6">

                    @if(!empty($program->quick_facts))
                        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
                            <div class="bg-[#990000] py-4 px-6">
                                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    Program Quick Facts
                                </h3>
                            </div>
                            <div class="p-6">
                                <ul class="divide-y divide-gray-100">
                                    @if($program->quick_facts)
                                        @foreach($program->quick_facts as $key => $fact)
                                            <li class="py-3 flex flex-col">
                                                {{-- Check if it is the NEW format (an array) --}}
                                                @if(is_array($fact))
                                                    <span class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">{{ $fact['label'] }}</span>
                                                    <span class="text-gray-900 font-medium">{{ $fact['value'] }}</span>

                                                {{-- Otherwise, fall back to the OLD format --}}
                                                @else
                                                    <span class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">{{ $key }}</span>
                                                    <span class="text-gray-900 font-medium">{{ $fact }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif

                        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ready to expand your horizons?</h3>
                            <p class="text-sm text-gray-600 mb-6">Contact the International Relations Office or start your application today.</p>

                            @if($program->cta)
                                {{-- Primary Button (Only shows if primary_text and primary_url exist) --}}
                                @if(isset($program->cta['primary_text']) && isset($program->cta['primary_url']))
                                    <a href="{{ $program->cta['primary_url'] }}" class="block text-center w-full bg-[#990000] hover:bg-red-800 text-white font-bold py-3 px-4 rounded-xl shadow-md transition-colors mb-3">
                                        {{ $program->cta['primary_text'] }}
                                    </a>
                                @endif

                                {{-- Secondary Button (Only shows if secondary_text and secondary_url exist) --}}
                                @if(isset($program->cta['secondary_text']) && isset($program->cta['secondary_url']))
                                    <a href="{{ $program->cta['secondary_url'] }}" class="block text-center w-full bg-white hover:bg-gray-100 text-[#990000] font-bold py-3 px-4 rounded-xl border-2 border-[#990000]/20 transition-colors">
                                        {{ $program->cta['secondary_text'] }}
                                    </a>
                                @endif
                            @endif
                        </div>

                    </div>
                </aside>

            </div>
        </div>

        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </flux:main>

</x-layouts::app.iro-sidebar>
