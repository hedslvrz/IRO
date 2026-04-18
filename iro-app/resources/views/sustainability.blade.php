{{-- resources/views/sustainability.blade.php --}}
<x-layouts::app.iro-sidebar title="Sustainability">
    <flux:main>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ activeSdg: 1 }">

            <div class="mb-12 border-b-4 border-[#990000] pb-6">
                <h1 class="text-4xl font-bold text-[#990000] mb-3">Sustainability at IRO</h1>
                <p class="text-lg text-gray-600">
                    Western Mindanao State University's commitment to the United Nations Sustainable Development Goals (SDGs) through internationalization.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">

                <nav class="w-full lg:w-1/3 flex flex-col gap-2">
                    {{-- Drop the $num key, just loop the items --}}
                    @foreach($sdgs as $sdg)
                        <button
                            @click="activeSdg = {{ $sdg->sdg_number }}"
                            :class="activeSdg === {{ $sdg->sdg_number }} ? 'bg-[#990000] text-white shadow-md border-[#990000]' : 'bg-white text-gray-700 border-gray-200 hover:bg-red-50 hover:text-[#990000] hover:border-red-200'"
                            class="text-left px-5 py-4 rounded-lg font-medium transition-all duration-200 border flex items-center gap-3">

                            <span
                                :class="activeSdg === {{ $sdg->sdg_number }} ? 'bg-white text-[#990000]' : 'bg-gray-100 text-gray-600'"
                                class="flex items-center justify-center w-8 h-8 rounded-full text-sm font-bold transition-colors shrink-0">
                                {{-- Use the database column --}}
                                {{ $sdg->sdg_number }}
                            </span>

                            {{ $sdg->title }}
                        </button>
                    @endforeach
                </nav>

                <main class="w-full lg:w-2/3">
                    <div class="bg-white p-8 md:p-10 rounded-xl shadow-sm border border-gray-200 min-h-125 sticky top-8">

                        @foreach($sdgs as $sdg)
                            <div x-show="activeSdg === {{ $sdg->sdg_number }}"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-4"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                style="display: none;"
                                x-cloak>

                                <div class="flex items-center gap-4 border-b border-red-100 pb-6 mb-6">
                                    {{-- Use the database column --}}
                                    <span class="text-5xl font-black text-gray-200">{{ $sdg->sdg_number }}</span>
                                    <h2 class="text-3xl font-bold text-[#990000]">
                                        {{ $sdg->title }}
                                    </h2>
                                </div>

                                <div class="flex flex-col md:flex-row gap-6 mb-10">
                                    <div class="w-full md:w-1/3 shrink-0">
                                        @if($sdg->image_path)
                                            {{-- Show the database image uploaded via Admin --}}
                                            <img src="{{ asset('storage/' . $sdg->image_path) }}" alt="{{ $sdg->title }}" class="w-full h-auto rounded-lg object-cover shadow-sm bg-gray-100 aspect-square">
                                        @else
                                            {{-- Show a red placeholder if no image has been uploaded yet --}}
                                            <img src="https://placehold.co/400x400/eeeeee/990000?text=SDG+{{ $sdg->sdg_number }}" alt="{{ $sdg->title }}" class="w-full h-auto rounded-lg object-cover shadow-sm bg-gray-100 aspect-square">
                                        @endif
                                    </div>
                                    <div class="prose max-w-none text-gray-700 text-lg md:w-2/3">
                                        <h3 class="text-xl font-semibold text-[#990000] mb-3">General SDG Overview</h3>
                                        <p class="leading-relaxed">{{ $sdg['overview'] }}</p>
                                    </div>
                                </div>

                                <div class="prose max-w-none text-gray-700 text-lg">
                                    <h3 class="text-xl font-semibold text-[#990000] mb-6 border-b border-gray-100 pb-2">WMSU IRO Focus Areas for SDG {{ $sdg->sdg_number }}</h3>

                                    <div class="grid gap-4">
                                        @forelse($sdg->topics as $topic)
                                            <div class="p-5 bg-[#990000]/5 rounded-xl border border-[#990000]/20 hover:bg-[#990000]/10 transition-colors">
                                                <h4 class="text-lg font-bold text-[#990000] mb-2">{{ $topic->title }}</h4>
                                                <p class="text-gray-700 text-base m-0">{{ $topic->description }}</p>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-sm italic">No programs or topics added for this SDG yet.</p>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </main>

            </div>
        </div>

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </flux:main>
</x-layouts::app.iros-idebar>
