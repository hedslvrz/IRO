<x-layouts::app.iro-sidebar>
    <flux:main>
        @php
                // Define the SDGs in an array to manage titles and content.
                $sdgs = [
                    1 => [
                        'title' => 'No Poverty',
                        'image' => asset('images/sdg1.jpg'), // Path to your SDG 1 image
                        'overview' => 'End poverty in all its forms everywhere. The International Relations Office (IRO) contributes by facilitating inclusive international scholarships and partnering with global institutions to provide equitable access to education.',
                        'topics' => [
                            'Topic 1: Collaborative Academic Programs' => 'Detailed information about joint academic ventures focusing on economic development and research.',
                            'Topic 2: International Scholarship and Aid' => 'A description of WMSU\'s efforts in securing grants and aid for financially-disadvantaged international students.',
                            'Topic 3: Cross-Border Community Projects' => 'Information on global community outreach and development initiatives to provide essential services.',
                        ],
                    ],
                    2 => [
                        'title' => 'Life On Land',
                        'image' => asset('images/sdg1.jpg'), // Path to your SDG 1 image
                        'overview' => 'End poverty in all its forms everywhere. The International Relations Office (IRO) contributes by facilitating inclusive international scholarships and partnering with global institutions to provide equitable access to education.',
                        'topics' => [
                            'Topic 1: Collaborative Academic Programs' => 'Detailed information about joint academic ventures focusing on economic development and research.',
                            'Topic 2: International Scholarship and Aid' => 'A description of WMSU\'s efforts in securing grants and aid for financially-disadvantaged international students.',
                            'Topic 3: Cross-Border Community Projects' => 'Information on global community outreach and development initiatives to provide essential services.',
                        ],
                    ],
                    3 => [
                        'title' => 'Life Below Water',
                        'image' => asset('images/sdg1.jpg'), // Path to your SDG 1 image
                        'overview' => 'End poverty in all its forms everywhere. The International Relations Office (IRO) contributes by facilitating inclusive international scholarships and partnering with global institutions to provide equitable access to education.',
                        'topics' => [
                            'Topic 1: Collaborative Academic Programs' => 'Detailed information about joint academic ventures focusing on economic development and research.',
                            'Topic 2: International Scholarship and Aid' => 'A description of WMSU\'s efforts in securing grants and aid for financially-disadvantaged international students.',
                            'Topic 3: Cross-Border Community Projects' => 'Information on global community outreach and development initiatives to provide essential services.',
                        ],
                    ],
                ];
            @endphp

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ activeSdg: 1 }">

                <div class="mb-12 border-b-4 border-[#990000] pb-6">
                    <h1 class="text-4xl font-bold text-[#990000] mb-3">Sustainability at IRO</h1>
                    <p class="text-lg text-gray-600">
                        Our commitment to the United Nations Sustainable Development Goals (SDGs) through internationalization.
                    </p>
                </div>

                <div class="flex flex-col lg:flex-row gap-8">

                    <nav class="w-full lg:w-1/3 flex flex-col gap-2">
                        @foreach($sdgs as $num => $sdg)
                            <button
                                @click="activeSdg = {{ $num }}"
                                :class="activeSdg === {{ $num }} ? 'bg-[#990000] text-white shadow-md border-[#990000]' : 'bg-white text-gray-700 border-gray-200 hover:bg-red-50 hover:text-[#990000] hover:border-red-200'"
                                class="text-left px-5 py-4 rounded-lg font-medium transition-all duration-200 border flex items-center gap-3">

                                <span
                                    :class="activeSdg === {{ $num }} ? 'bg-white text-[#990000]' : 'bg-gray-100 text-gray-600'"
                                    class="flex items-center justify-center w-8 h-8 rounded-full text-sm font-bold transition-colors">
                                    {{ $num }}
                                </span>

                                {{ $sdg['title'] }}
                            </button>
                        @endforeach
                    </nav>

                    <main class="w-full lg:w-2/3">
                        <div class="bg-white p-8 md:p-10 rounded-xl shadow-sm border border-gray-200 min-h-[500px] sticky top-8">

                            @foreach($sdgs as $num => $sdg)
                                <div x-show="activeSdg === {{ $num }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-y-4"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    style="display: none;"
                                    x-cloak>

                                    <div class="flex items-center gap-4 border-b border-red-100 pb-6 mb-6">
                                        <span class="text-5xl font-black text-gray-200">{{ $num }}</span>
                                        <h2 class="text-3xl font-bold text-[#990000]">
                                            {{ $sdg['title'] }}
                                        </h2>
                                    </div>

                                    <div class="flex flex-col md:flex-row gap-6 mb-10">
                                        <img src="{{ $sdg['image'] }}" alt="{{ $sdg['title'] }}" class="w-full md:w-1/3 rounded-lg object-cover">
                                        <div class="prose max-w-none text-gray-700 text-lg md:w-2/3">
                                            <h3 class="text-xl font-semibold text-[#990000] mb-3">General SDG Overview</h3>
                                            <p class="leading-relaxed">{{ $sdg['overview'] }}</p>
                                        </div>
                                    </div>

                                    <div class="prose max-w-none text-gray-700 text-lg">
                                        <h3 class="text-xl font-semibold text-[#990000] mb-6">WMSU International Relations Office Topics for SDG {{ $num }}</h3>
                                        @foreach($sdg['topics'] as $topicTitle => $topicContent)
                                            <div class="mb-6 p-6 bg-[#990000]/5 rounded-xl border border-[#990000]/20">
                                                <h4 class="text-lg font-semibold text-[#990000] mb-3">{{ $topicTitle }}</h4>
                                                <p class="text-gray-700">{{ $topicContent }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </main>

                </div>
            </div>
            
    </flux:main>
</x-layouts::app.iro-sidebar>
