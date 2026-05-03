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
<body class="font-sans antialiased bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    {{-- TOP HEADER: School Title & Seal --}}
    <header class="w-full bg-white py-4 flex flex-col items-center justify-center shrink-0">
        {{-- Replace 'images/school-seal.png' with your actual seal image path --}}
        <img src="{{ asset('images/wmsu-seal.png') }}" alt="School Seal" class="w-16 h-16 object-contain mb-2">
        <h1 class="text-xl font-bold text-red-900 uppercase tracking-normal text-center">
            Western Mindanao State University
        </h1>
    </header>

    {{-- TOP NAVIGATION BAR --}}
    <nav class="w-full bg-white shadow-sm border-b border-t border-gray-200 sticky top-0 z-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16">

                {{-- 1. IRO Logo & Title (Left Side) --}}
                <div class="flex items-center gap-3 shrink-0 pr-6 border-r border-gray-200 py-2">
                    <img src="{{ asset('images/IMG_0518.PNG') }}" alt="IRO Logo" class="w-10 h-10 object-contain">
                    <div class="font-bold text-sm leading-tight text-emerald-950 tracking-wide hidden lg:block">
                        International Relations<br>Office
                    </div>
                </div>

                {{-- 2. Navigation Links (Right Side / Horizontally Scrolling on small screens) --}}
                <div class="flex-1 overflow-x-auto flex items-center pl-6 space-x-2 no-scrollbar hidden md:flex items-center w-full justify-evenly">

                    {{-- Active Link Example --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('home') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('home') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Home
                    </a>

                    <a href="{{ route('about') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('about') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('about') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        About Us
                    </a>

                    {{-- Link with Dropdown Chevron --}}
                    <a href="{{ route('izn') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('izn') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('izn') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        IZN Programs
                    </a>

                    <a href="{{ route('academics') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('academics') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('academics') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Academics
                    </a>

                    {{-- Sustainability --}}
                    <a href="{{ route('sustainability') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('sustainability') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('sustainability') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Sustainability
                    </a>

                    {{-- News & Info --}}
                    <a href="{{ route('news.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('news') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('news') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        News & Info
                    </a>

                    {{-- Global Affairs --}}
                    <a href="{{ route('global-affairs') }}" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm whitespace-nowrap transition duration-200 group {{ request()->routeIs('global-affairs') ? 'bg-red-50 text-emerald-900 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 font-medium' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('global-affairs') ? 'opacity-75' : 'text-gray-400 group-hover:text-gray-600 transition' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Global Affairs
                    </a>
                </div>

            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT AREA --}}
    <main class="flex-1 w-full max-w-screen-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Add a little CSS to hide the scrollbar for the horizontal navigation --}}
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
    <x-footer />
</body>
</html>
