<x-layouts::app.iro-sidebar>
<flux:main>
        @php
            // SIMULATED DATABASE RECORD
            // Once your database is set up, you will delete this block
            // and pass the $article variable from your Laravel Controller.
            $article = [
                'category' => 'Partnerships',
                'date' => 'March 18, 2026',
                'author' => 'IRO Communications Team',
                'image' => 'https://placehold.co/1200x600/990000/ffffff?text=WMSU+Partnership+Signing',
                'image_caption' => 'WMSU and Global Tech University officials during the official signing of the Memorandum of Understanding in Tokyo, Japan.',

                // Headline: Downstyle (only first word and proper nouns capitalized)
                'headline' => 'WMSU forges new partnership with Global Tech University to boost student mobility',

                // Lede: Who, what, when, where
                'lede' => 'Western Mindanao State University (WMSU) officially signed a Memorandum of Understanding (MoU) with Global Tech University in Tokyo this Monday to facilitate fully-funded international student and faculty exchanges starting next semester.',

                // Nut Graf: Context and why it matters
                'nut_graf' => 'This landmark agreement aligns directly with the university’s strategic goal to enhance global competitiveness. It provides unprecedented opportunities for local students to gain international exposure in advanced technology sectors, a crucial step for producing graduates ready for the modern global workforce.',

                // Body Paragraphs: Details, evidence, context
                'body' => [
                    'The initial phase of the partnership will see five top-performing WMSU students from the College of Engineering fly to Tokyo for a semester-long exchange program. The grant covers tuition, accommodation, and a monthly stipend, ensuring that the opportunity is accessible to students regardless of financial background.',
                    'In return, WMSU will host visiting professors from Japan who will conduct specialized, intensive workshops on artificial intelligence, robotics, and sustainable urban planning across various colleges.',
                    'Furthermore, the MoU outlines a framework for joint research initiatives focusing on climate-resilient infrastructure. Researchers from both institutions have already begun drafting proposals for international grants to fund these vital projects.'
                ],

                // Quote: Insight from a key stakeholder
                'quote' => [
                    'text' => 'This partnership is a testament to our relentless commitment to internationalization. By bridging our students with global innovators, we are not just sharing knowledge; we are actively building the future leaders and problem-solvers of the Zamboanga Peninsula.',
                    'person' => 'Dr. Maria Santos',
                    'title' => 'Director, International Relations Office'
                ],

                // Call to Action / Links
                'cta' => [
                    'text' => 'Apply for the Fall 2026 Exchange Program',
                    'url' => '#',
                    'secondary_text' => 'Read more about WMSU Global Partnerships',
                    'secondary_url' => '#'
                ],

                'tags' => ['Student Mobility', 'Engineering', 'Japan', 'MoU']
            ];
        @endphp

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <a href="/news" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-[#990000] mb-8 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to all news
            </a>

            <header class="mb-10">
                <div class="flex items-center gap-4 mb-4">
                    <span class="bg-[#990000] text-white text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded">
                        {{ $article['category'] }}
                    </span>
                    <span class="text-sm font-medium text-gray-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article['date'] }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6">
                    {{ $article['headline'] }}
                </h1>

                <div class="text-gray-600 font-medium border-t border-b border-gray-100 py-3 mb-8">
                    By <span class="text-[#990000]">{{ $article['author'] }}</span>
                </div>
            </header>

            <figure class="mb-12">
                <div class="w-full h-[400px] md:h-[500px] rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ $article['image'] }}" alt="{{ $article['headline'] }}" class="w-full h-full object-cover">
                </div>
                @if(isset($article['image_caption']))
                    <figcaption class="mt-3 text-sm text-gray-500 text-center italic">
                        {{ $article['image_caption'] }}
                    </figcaption>
                @endif
            </figure>

            <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed">

                <p class="text-2xl font-medium text-gray-900 leading-snug mb-8">
                    {{ $article['lede'] }}
                </p>

                <div class="p-6 bg-red-50 border-l-4 border-[#990000] rounded-r-lg mb-8">
                    <p class="m-0 text-gray-800 font-medium">
                        {{ $article['nut_graf'] }}
                    </p>
                </div>

                <div class="space-y-6 mb-12">
                    @foreach($article['body'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                <blockquote class="my-12 relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm text-center">
                    <svg class="w-12 h-12 text-red-100 absolute top-4 left-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                    <p class="text-2xl italic font-semibold text-gray-800 relative z-10 mb-6 leading-snug">
                        "{{ $article['quote']['text'] }}"
                    </p>
                    <footer class="mt-4">
                        <div class="font-bold text-[#990000] text-lg">{{ $article['quote']['person'] }}</div>
                        <div class="text-sm text-gray-500 font-medium">{{ $article['quote']['title'] }}</div>
                    </footer>
                </blockquote>

            </article>

            <div class="mt-16 pt-10 border-t border-gray-200 flex flex-col items-center text-center bg-gray-50 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Take Action</h3>
                <p class="text-gray-600 mb-6">Interested in participating in this initiative or learning more?</p>

                <a href="{{ $article['cta']['url'] }}" class="bg-[#990000] hover:bg-red-800 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-colors w-full sm:w-auto text-center mb-4">
                    {{ $article['cta']['text'] }}
                </a>

                <a href="{{ $article['cta']['secondary_url'] }}" class="text-[#990000] font-semibold hover:underline flex items-center gap-1">
                    {{ $article['cta']['secondary_text'] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="mt-12 flex flex-wrap gap-2">
                <span class="text-sm font-bold text-gray-500 mr-2 py-1">Tags:</span>
                @foreach($article['tags'] as $tag)
                    <a href="#" class="bg-gray-100 hover:bg-red-100 text-gray-700 hover:text-[#990000] text-xs font-semibold px-3 py-1.5 rounded-full transition-colors">
                        #{{ $tag }}
                    </a>
                @endforeach
            </div>

        </div>
    </flux:main>

</x-layouts::app.iro-sidebar>
