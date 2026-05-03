<x-layouts::app.iro-sidebar>

    {{-- 1. HERO SECTION --}}
    <div class="relative bg-red-900 overflow-hidden border-b-8 border-yellow-500">
        {{-- Optional Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 text-center flex flex-col items-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
                {{ $settings->hero_title }}<br>
                <span class="text-yellow-400">{{ $settings->hero_subtitle }}</span>
            </h1>
            <p class="mt-4 text-xl text-red-100 max-w-3xl mx-auto font-medium mb-12">
                {{ $settings->hero_description }}
            </p>

            {{-- Update the Seals Image --}}
            <div class="w-full max-w-5xl bg-white/95 backdrop-blur-sm p-4 md:p-6 rounded-xl shadow-2xl border border-red-800">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 text-left">Global Recognitions & Accreditations</p>
                @if($settings->seals_image_path)
                    <img src="{{ asset('storage/' . $settings->seals_image_path) }}" alt="WMSU Rankings and Accreditations" class="w-full h-auto object-contain">
                @else
                    <p class="text-sm text-gray-400 text-center py-4">Accreditation seals will appear here once uploaded by the administrator.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- 2. CORE PILLARS (Replaces the old Services section) --}}
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 border-b-4 border-red-700 inline-block pb-2">Explore International Relations Office</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Pillar 1: IZN --}}
                <a href="{{ route('izn') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-red-50 text-red-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-700 transition-colors">IZN Programs</h3>
                    <p class="text-gray-600">Discover our international certifications, quality assurance metrics, and global university partnerships.</p>
                </a>

                {{-- Pillar 2: Global Affairs --}}
                <a href="{{ route('global-affairs') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition-colors">Global Affairs Services</h3>
                    <p class="text-gray-600">Access resources for student and faculty mobility, foreign travel documentation, and research presentation support.</p>
                </a>

                {{-- Pillar 3: News & Announcements --}}
                <a href="{{ route('news.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-50 text-blue-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition-colors">News & Announcements</h3>
                    <p class="text-gray-600">Stay updated with the latest international events, visiting scholars, and cultural exchange activities.</p>
                </a>
            </div>
        </div>
    </div>

    {{-- 3. ORGANIZATIONAL CHART SECTION --}}
    <div class="text-center mb-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $settings->org_chart_title }}</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $settings->org_chart_description }}</p>
    </div>

    <div class="bg-gray-50 rounded-3xl p-4 md:p-8 border border-gray-200 shadow-inner">
        <div class="bg-white rounded-2xl p-2 md:p-6 shadow-sm overflow-hidden flex items-center justify-center min-h-100">
            @if($settings->org_chart_image_path)
                <img src="{{ asset('storage/' . $settings->org_chart_image_path) }}" alt="Organizational Structure" class="w-full h-auto object-contain rounded-lg">
            @else
                <div class="text-center text-gray-400 py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class="text-sm font-medium uppercase tracking-wider">Organizational Chart will be displayed here</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts::app.iro-sidebar>
