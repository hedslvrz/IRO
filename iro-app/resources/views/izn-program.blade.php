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

            {{-- SECTION 1: GLOBAL RANKINGS (Documents & PDFs) --}}
            <section id="global-rankings" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">Global Rankings</h2>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Western Mindanao State University's commitment to excellence is reflected in our international standing. Download the official reports and documents below to learn more about our global rankings and quality assurance metrics.
                </p>

                {{-- Document Cards Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- QS Stars University Ratings Methodology (PDF) --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-5 flex items-start gap-4 hover:border-red-300 hover:shadow-md transition group">
                        {{-- PDF Icon --}}
                        <div class="p-3 bg-red-50 text-red-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">QS Stars University Ratings Methodology</h4>
                            <p class="text-xs text-gray-500 mb-3">PDF Document</p>
                            <a href="{{ asset('documents/QS-Stars_University-Methodology_v6.0-2024.pdf') }}" class="text-sm font-semibold text-red-700 hover:text-red-900 flex items-center gap-1" target="_blank">
                                Download <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path></svg>
                            </a>
                        </div>
                    </div>

                    {{-- THE Impact Methodology 2026 (PDF) --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-5 flex items-start gap-4 hover:border-red-300 hover:shadow-md transition group">
                        <div class="p-3 bg-red-50 text-red-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">THE Impact Methodology 2026</h4>
                            <p class="text-xs text-gray-500 mb-3">PDF Document</p>
                            <a href="{{ asset('documents/THE Impact Methodology 2026.pdf') }}" class="text-sm font-semibold text-red-700 hover:text-red-900 flex items-center gap-1" target="_blank">
                                Download <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path></svg>
                            </a>
                        </div>
                    </div>

                    {{-- UI GreenMetric SUR Guideline 2026 (PDF) --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-5 flex items-start gap-4 hover:border-red-300 hover:shadow-md transition group">
                        <div class="p-3 bg-red-50 text-red-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">UI GreenMetric SUR Guideline 2026</h4>
                            <p class="text-xs text-gray-500 mb-3">PDF Document</p>
                            <a href="{{ asset('documents/UI_GreenMetric_SUR_Guideline_2026.pdf') }}" class="text-sm font-semibold text-red-700 hover:text-red-900 flex items-center gap-1" target="_blank">
                                Download <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path></svg>
                            </a>
                        </div>
                    </div>

                    {{-- QMSO-IRO CRITERIA for MTC Quality Awardees (Word) --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-5 flex items-start gap-4 hover:border-red-300 hover:shadow-md transition group">
                        {{-- Word Icon --}}
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">QMSO-IRO CRITERIA for MTC Quality Awardees</h4>
                            <p class="text-xs text-gray-500 mb-3">Word Document</p>
                            <a href="{{ asset('documents/QMSO-IRO CRITERIA-for-MTC-Quality-Awardeees.docx') }}" class="text-sm font-semibold text-red-700 hover:text-red-900 flex items-center gap-1" target="_blank">
                                Download <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path></svg>
                            </a>
                        </div>
                    </div>

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
