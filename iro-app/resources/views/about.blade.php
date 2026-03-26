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
                {{-- Titles changed to deep red --}}
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">WMSU Profile</h2>
                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4">
                    <p>
                        Western Mindanao State University (WMSU) stands as a beacon of excellence in education in the region. Committed to academic distinction, the university fosters a vibrant learning environment that equips students with the knowledge, skills, and values needed to excel globally.
                    </p>
                    <p>
                        Our institution continuously adapts to the evolving educational landscape, emphasizing research, community extension, and internationalization to produce world-class professionals.
                    </p>
                </div>
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
                            By 2040, WMSU is a Smart Research University generating competent professionals and global citizens engendered by the knowledge from sciences and liberal education, empowering communities, promoting peace, harmony, and cultural diversity.
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
                            WMSU commits to create a vibrant atmosphere of learning where science, technology, innovation, research, the arts and humanities, and community engagement flourish, and produce world-class professionals committed to sustainable development and peace.
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
                        "The Western Mindanao State University is committed to deliver academic excellence, to produce globally competetive human resources, and to conduct innovative research for sustainable development beyond the ASEAN region. It is defined as a smart Research University, that adapts to the changing landscape of the stakeholders' needs."
                    </p>
                    <br>
                    <p class="italic text-gray-700 text-lg leading-relaxed text-center font-medium">
                        "WMSU also commits to continually enhance its Quality Management System by integrating risk-based thinking into all processes to achieve intended results and guarantee customer satisfaction in compliance with applicable quality assurance standards."
                    </p>
                </div>
            </section>

            {{-- SECTION 4: Office Function --}}
            <section id="office-function" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-red-900 mb-4 border-b-2 border-red-100 pb-3">Office Function</h2>
                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4">
                    <p>
                        The International Relations Office (IRO) serves as the primary arm of the university for global engagement. We bridge our local academic community with international partners to foster mutual growth, cultural exchange, and academic advancement.
                    </p>

                    <h4 class="font-bold text-gray-900 mt-6 mb-2">Key Responsibilities:</h4>
                    {{-- Bullets changed to red --}}
                    <ul class="list-disc pl-5 space-y-2 marker:text-red-600">
                        <li>Facilitating student and faculty exchange programs (IZN Programs).</li>
                        <li>Establishing and maintaining active partnerships with foreign educational institutions.</li>
                        <li>Ensuring the university's compliance with global educational frameworks and quality assurance.</li>
                        <li>Providing support services for inbound international students and scholars.</li>
                    </ul>
                </div>
            </section>

        </main>
    </div>

</x-layouts::app.iro-sidebar>




