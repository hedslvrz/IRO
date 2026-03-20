<x-layouts::app.iro-sidebar>

    <flux:main>
        @php
            // 1. Featured/Latest News for the Hero Carousel
            $featuredNews = [
                [
                    'title' => 'WMSU Forges New Partnership with Global Tech University',
                    'date' => 'March 18, 2026',
                    'category' => 'Partnerships',
                    'excerpt' => 'In a landmark move for internationalization, WMSU has officially signed a Memorandum of Understanding to facilitate student and faculty exchanges starting next semester.',
                    'image' => 'https://placehold.co/1200x600/550000/ffffff?text=WMSU+Partnership',
                ],
                [
                    'title' => 'Application for Fall 2026 Exchange Programs Now Open',
                    'date' => 'March 15, 2026',
                    'category' => 'Mobility',
                    'excerpt' => 'Students interested in studying abroad can now submit their applications. Explore opportunities in Asia, Europe, and the Americas.',
                    'image' => 'https://placehold.co/1200x600/990000/ffffff?text=Exchange+Programs',
                ],
                [
                    'title' => 'International Research Symposium to be Hosted in Zamboanga',
                    'date' => 'March 10, 2026',
                    'category' => 'Research',
                    'excerpt' => 'Scholars from over 15 partner universities will gather at WMSU to present collaborative findings on sustainable development.',
                    'image' => 'https://placehold.co/1200x600/770000/ffffff?text=Research+Symposium',
                ]
            ];

            // 2. General News List (Left Column)
            $generalNews = [
                [
                    'title' => 'Visiting Professors Arrive for Cultural Exchange Month',
                    'date' => 'March 5, 2026',
                    'excerpt' => 'The IRO warmly welcomes delegates who will be conducting special lecture series across various colleges.',
                    'image' => 'https://placehold.co/400x300/eeeeee/990000?text=News+1',
                ],
                [
                    'title' => 'WMSU Delegates Attend ASEAN University Network Summit',
                    'date' => 'February 28, 2026',
                    'excerpt' => 'University officials traveled to Bangkok to participate in the annual strategic planning for regional higher education.',
                    'image' => 'https://placehold.co/400x300/eeeeee/990000?text=News+2',
                ],
                [
                    'title' => 'New Language Center Opens to Support Outbound Students',
                    'date' => 'February 20, 2026',
                    'excerpt' => 'A new facility dedicated to TOEFL and IELTS preparation has been inaugurated at the main campus.',
                    'image' => 'https://placehold.co/400x300/eeeeee/990000?text=News+3',
                ],
                [
                    'title' => 'International Alumni Network Officially Launched',
                    'date' => 'February 14, 2026',
                    'excerpt' => 'Connecting past exchange students and international graduates to foster lifelong global linkages.',
                    'image' => 'https://placehold.co/400x300/eeeeee/990000?text=News+4',
                ],
            ];

            // 3. Trending/Popular Posts (Right Column)
            $trendingPosts = [
                [
                    'title' => 'Step-by-Step Guide: How to Apply for an IRO Scholarship',
                    'views' => '2.4k Views',
                ],
                [
                    'title' => 'Top 5 Destinations for WMSU Exchange Students',
                    'views' => '1.8k Views',
                ],
                [
                    'title' => 'Visa Processing Updates for Spring 2026',
                    'views' => '1.2k Views',
                ],
                [
                    'title' => 'Meet the New International Student Ambassadors',
                    'views' => '950 Views',
                ],
            ];
        @endphp

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="mb-8 border-b-4 border-[#990000] pb-4">
                <h1 class="text-4xl font-bold text-[#990000]">News & Updates</h1>
                <p class="text-gray-600 mt-2">The latest announcements and global initiatives from the WMSU International Relations Office.</p>
            </div>

            <div x-data="{
                    activeSlide: 0,
                    totalSlides: {{ count($featuredNews) }},
                    next() { this.activeSlide = activeSlide === this.totalSlides - 1 ? 0 : this.activeSlide + 1 },
                    prev() { this.activeSlide = activeSlide === 0 ? this.totalSlides - 1 : this.activeSlide - 1 }
                }"
                class="relative w-full h-[400px] md:h-[500px] rounded-2xl overflow-hidden shadow-lg mb-12 group bg-gray-900">

                <div class="relative w-full h-full">
                    @foreach($featuredNews as $index => $news)
                        <div x-show="activeSlide === {{ $index }}"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-star    t="opacity-0 scale-105"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-300 absolute inset-0"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute inset-0 w-full h-full"
                             style="display: none;" x-cloak>

                            <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" class="w-full h-full object-cover opacity-60">

                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>

                            <div class="absolute bottom-0 left-0 w-full p-8 md:p-12 text-white">
                                <span class="bg-[#990000] text-white text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded mb-4 inline-block">
                                    {{ $news['category'] }}
                                </span>
                                <h2 class="text-3xl md:text-5xl font-bold mb-3 leading-tight drop-shadow-md">
                                    {{ $news['title'] }}
                                </h2>
                                <p class="text-gray-200 text-lg md:text-xl max-w-3xl mb-4 line-clamp-2">
                                    {{ $news['excerpt'] }}
                                </p>
                                <div class="flex items-center text-sm font-medium text-gray-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $news['date'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-[#990000] text-white rounded-full flex items-center justify-center backdrop-blur-sm transition-all opacity-0 group-hover:opacity-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-[#990000] text-white rounded-full flex items-center justify-center backdrop-blur-sm transition-all opacity-0 group-hover:opacity-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div class="absolute bottom-6 right-8 flex gap-2">
                    @foreach($featuredNews as $index => $news)
                        <button @click="activeSlide = {{ $index }}"
                                :class="activeSlide === {{ $index }} ? 'w-8 bg-[#990000]' : 'w-2 bg-white/50 hover:bg-white'"
                                class="h-2 rounded-full transition-all duration-300"></button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <div class="lg:col-span-2 space-y-8">
                    <h3 class="text-2xl font-bold text-gray-900 border-b-2 border-gray-100 pb-3 flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                        Recent Articles
                    </h3>

                    <div class="flex flex-col gap-6">
                        @foreach($generalNews as $news)
                            <a href="/news/article" class="group flex flex-col sm:flex-row gap-6 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-red-100 transition-all">
                                <div class="w-full sm:w-48 h-48 sm:h-32 shrink-0 overflow-hidden rounded-lg">
                                    <img src="{{ $news['image'] }}" alt="Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <div class="text-[#990000] text-sm font-semibold mb-1">{{ $news['date'] }}</div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#990000] transition-colors leading-snug">
                                        {{ $news['title'] }}
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ $news['excerpt'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="pt-4 flex justify-center">
                        <button class="px-6 py-2 border-2 border-[#990000] text-[#990000] font-semibold rounded-lg hover:bg-[#990000] hover:text-white transition-colors">
                            Load More News
                        </button>
                    </div>
                </div>

                <aside class="lg:col-span-1 space-y-8">

                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Trending Now
                        </h3>

                        <div class="flex flex-col gap-5">
                            @foreach($trendingPosts as $index => $post)
                                <a href="#" class="flex gap-4 group">
                                    <span class="text-3xl font-black text-gray-200 group-hover:text-[#990000] transition-colors">
                                        0{{ $index + 1 }}
                                    </span>
                                    <div>
                                        <h4 class="text-md font-bold text-gray-800 group-hover:text-[#990000] transition-colors leading-tight mb-1">
                                            {{ $post['title'] }}
                                        </h4>
                                        <span class="text-xs text-gray-500 font-medium">{{ $post['views'] }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-[#990000] p-6 rounded-2xl text-white shadow-lg text-center">
                        <svg class="w-12 h-12 mx-auto mb-4 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <h3 class="text-xl font-bold mb-2">Subscribe to IRO Newsletter</h3>
                        <p class="text-sm text-red-100 mb-6">Get the latest international opportunities delivered directly to your inbox.</p>
                        <div class="flex flex-col gap-2">
                            <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 rounded-lg text-gray-900 border-none focus:ring-2 focus:ring-red-300 outline-none">
                            <button class="w-full bg-gray-900 hover:bg-black text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Subscribe
                            </button>
                        </div>
                    </div>

                </aside>

            </div>
        </div>

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </flux:main>
</x-layouts::app.iro-sidebar>
