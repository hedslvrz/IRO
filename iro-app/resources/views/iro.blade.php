<x-layouts::app.iro-sidebar>

    {{-- Everything you type here will appear in the <main> section of your sidebar layout --}}
    {{-- HERO SECTION --}}
    <div class="relative w-full h-125 flex items-center justify-center bg-gray-900 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">

        {{-- Dark Overlay to make text readable --}}
        <div class="absolute inset-0 bg-red-700/60"></div>

        {{-- Hero Content --}}
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                External Linkages &<br>International Relations Office
            </h1>

            <p class="text-lg md:text-sm text-gray-200 mb-10 max-w-6xl mx-auto">
                The International Relations Office (IRO) is the university's primary gateway for global engagement, fostering academic excellence through international partnerships, student mobility, and cross-cultural exchange.
            </p>

            {{-- Call to Action Button --}}
            <a href="{{ route('izn') }}" class="inline-block bg-red-700 hover:bg-red-800 text-white font-semibold text-sm px-4 py-3.5 rounded-md transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Explore IZN Programs
            </a>

        </div>
    </div>

    {{-- OTHER PAGE CONTENT CAN GO HERE BELOW THE HERO SECTION --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Our Services</h2>
            <p class="text-lg text-gray-600">
                We offer a wide range of services to support your international endeavors.
            </p>
        </div>
        <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CSS Grid: 1 column on mobile, 2 on tablets, 4 on desktops --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- CARD 1: Red --}}
                <a href="{{ route('izn') }}" class="flex flex-col p-8 rounded-xl bg-red-700 text-white hover:bg-red-800 transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 group">
                    {{-- Icon (Globe) --}}
                    <svg class="w-12 h-12 mb-5 text-red-100 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"></path></svg>
                    <h3 class="text-xl font-bold mb-3">IZN Programs</h3>
                    <p class="text-red-100 text-sm leading-relaxed flex-1">Explore opportunities for student exchange, cross-cultural learning, and global engagement.</p>
                </a>

                {{-- CARD 2: Emerald --}}
                <a href="{{ route('intl-net') }}" class="flex flex-col p-8 rounded-xl bg-emerald-700 text-white hover:bg-emerald-800 transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 group">
                    {{-- Icon (Handshake/Network) --}}
                    <svg class="w-12 h-12 mb-5 text-emerald-100 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <h3 class="text-xl font-bold mb-3">Intl. Networks</h3>
                    <p class="text-emerald-100 text-sm leading-relaxed flex-1">Connect with our global university partners and international academic organizations.</p>
                </a>

                {{-- CARD 3: Amber/Yellow --}}
                <a href="{{ route('global-affairs') }}" class="flex flex-col p-8 rounded-xl bg-amber-500 text-amber-950 hover:bg-amber-600 transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 group">
                    {{-- Icon (Briefcase) --}}
                    <svg class="w-12 h-12 mb-5 text-amber-900 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"></path></svg>
                    <h3 class="text-xl font-bold mb-3">Global Affairs</h3>
                    <p class="text-amber-900/80 text-sm leading-relaxed flex-1">Stay updated on international policies, visa requirements, and cross-border collaborations.</p>
                </a>

                {{-- CARD 4: Blue --}}
                <a href="{{ route('academics') }}" class="flex flex-col p-8 rounded-xl bg-blue-800 text-white hover:bg-blue-900 transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 group">
                    {{-- Icon (Academic Cap) --}}
                    <svg class="w-12 h-12 mb-5 text-blue-100 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                    <h3 class="text-xl font-bold mb-3">Academics</h3>
                    <p class="text-blue-100 text-sm leading-relaxed flex-1">View the diverse range of international degrees and globally accredited courses.</p>
                </a>

            </div>
        </div>
    </div>
    </div>

</x-layouts::app.iro-sidebar>
