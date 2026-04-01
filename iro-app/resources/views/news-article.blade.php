<x-layouts::app.iro-sidebar>
<flux:main>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <a href="{{ route('news.index') }}" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-[#990000] mb-8 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to all news
            </a>

            <header class="mb-10">
                <div class="flex items-center gap-4 mb-4">
                    <span class="bg-[#990000] text-white text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded">
                        {{ $article->category ?? 'General' }}
                    </span>
                    <span class="text-sm font-medium text-gray-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article->published_at ? $article->published_at->format('F j, Y') : $article->created_at->format('F j, Y') }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6">
                    {{ $article->title }}
                </h1>

                <div class="text-gray-600 font-medium border-t border-b border-gray-100 py-3 mb-8">
                    By <span class="text-[#990000]">{{ $article->author ?? 'IRO Communications Team' }}</span>
                </div>
            </header>

            @if($article->cover_image)
            <figure class="mb-12">
                <div class="w-full h-100 md:h-125 rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
                @if($article->image_caption)
                    <figcaption class="mt-3 text-sm text-gray-500 text-center italic">
                        {{ $article->image_caption }}
                    </figcaption>
                @endif
            </figure>
            @endif

            <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed">

                @if($article->lede)
                <p class="text-2xl font-medium text-gray-900 leading-snug mb-8">
                    {{ $article->lede }}
                </p>
                @endif

                @if($article->nut_graf)
                <div class="p-6 bg-red-50 border-l-4 border-[#990000] rounded-r-lg mb-8">
                    <p class="m-0 text-gray-800 font-medium">
                        {{ $article->nut_graf }}
                    </p>
                </div>
                @endif

                <div class="space-y-6 mb-12">
                    {{-- nl2br converts your textarea line breaks into proper HTML <br> tags --}}
                    {!! nl2br(e($article->content)) !!}
                </div>

                @if($article->quote)
                <blockquote class="my-12 relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm text-center">
                    <svg class="w-12 h-12 text-red-100 absolute top-4 left-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                    <p class="text-2xl italic font-semibold text-gray-800 relative z-10 mb-6 leading-snug">
                        "{{ $article->quote }}"
                    </p>
                </blockquote>
                @endif

            </article>

            @if($article->tags)
            <div class="mt-12 pt-8 border-t border-gray-200 flex flex-wrap gap-2 items-center">
                <span class="text-sm font-bold text-gray-500 mr-2">Tags:</span>
                @foreach(explode(',', $article->tags) as $tag)
                    <a href="#" class="bg-gray-100 hover:bg-red-100 text-gray-700 hover:text-[#990000] text-xs font-semibold px-3 py-1.5 rounded-full transition-colors">
                        #{{ trim($tag) }}
                    </a>
                @endforeach
            </div>
            @endif

        </div>
    </flux:main>

</x-layouts::app.iro-sidebar>
