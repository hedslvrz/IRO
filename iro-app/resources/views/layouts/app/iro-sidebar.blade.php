<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>International Relations Office</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 flex flex-col h-screen overflow-hidden">

    {{-- TOP HEADER: School Title & Seal --}}
    <header class="w-full bg-white border-b border-gray-200 py-4 flex flex-col items-center justify-center shrink-0">
        {{-- Replace 'images/school-seal.png' with your actual seal image path --}}
        <img src="{{ asset('images/wmsu-seal.png') }}" alt="School Seal" class="w-16 h-16 object-contain mb-2">
        <h1 class="text-xl font-bold text-red-900 uppercase tracking-widest text-center">
            Western Mindanao State University
        </h1>
    </header>

    {{-- BOTTOM AREA: Sidebar & Main Content Wrapper --}}
    <div class="flex flex-1 overflow-hidden">

        {{-- SIDEBAR NAVIGATION --}}
        <aside class="w-100 bg-white border-r border-gray-200 flex flex-col flex-shrink-0 h-full">

            {{-- 1. Logo & Office Title --}}
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col items-center text-center gap-2">
                    <img src="{{ asset('images/IMG_0518.PNG') }}" alt="IRO Logo" class="w-50 h-50">
                </div>
                <div class="font-bold text-base leading-tight text-emerald-950 tracking-wide text-center">
                    International Relations Office
                </div>
            </div>

            {{-- 2. Navigation Links --}}
            <nav class="flex-1 overflow-y-auto py-4 px-4 space-y-1.5">

                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 bg-red-50 text-emerald-900 rounded-lg font-semibold text-sm transition duration-200">
                    <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Home
                </a>

                <a href="{{ route('about') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    About Us
                </a>

                <a href="{{ route('izn') }}" class="flex items-center justify-between px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        IZN Programs
                    </div>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                </a>

                <a href="{{ route('academics') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Academics
                </a>

                <a href="{{ route('intl-net') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    International Networks
                </a>

                <a href="{{ route('sustainability') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Sustainability
                </a>

                <a href="{{ route('news') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    News & Info
                </a>

                <a href="{{ route('global-affairs') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition duration-200 group">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Global Affairs
                </a>
            </nav>
        </aside>

        {{-- MAIN CONTENT AREA --}}
        <main class="flex-1 overflow-y-auto bg-gray-50">
            {{ $slot }}
        </main>

    </div>

</body>
</html>
