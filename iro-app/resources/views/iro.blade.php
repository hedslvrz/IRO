<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'International Relations Office'])
</head>
<body>
<div>
    <nav class="bg-white border-b border-gray-200 py-4 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <div class="flex items-center space-x-3">
                <div class="w-16 h-16 rounded-full bg-[#4a1c1c] overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/wmsu-seal.png') }}" alt="WMSU QMO Seal" class="w-full h-auto">
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold text-black leading-tight">WMSU QMO</span>
                    <span class="text-[10px] italic text-gray-500 uppercase tracking-widest">ISO 9001:2015 CERTIFIED</span>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <flux:navbar>
                    <flux:navbar.item href="#">Home</flux:navbar.item>
                    <flux:navbar.item href="#">About Us</flux:navbar.item>
                        <flux:dropdown position="bottom" align="end">
                                <flux:navbar.item icon-trailing="chevron-down">Global Rankings</flux:navbar.item>

                            <flux:navmenu>
                                <flux:navmenu.item href="#">QS STARS</flux:navmenu.item>
                                <flux:navmenu.item href="#">QS ASIA</flux:navmenu.item>
                                <flux:navmenu.item href="#">UI GREENMETRICS</flux:navmenu.item>
                                <flux:navmenu.item href="#">WURI 2026</flux:navmenu.item>
                                <flux:navmenu.item href="#">THE IMPACT RATINGS</flux:navmenu.item>
                            </flux:navmenu>
                        </flux:dropdown>
                    <flux:navbar.item href="#">News & Info</flux:navbar.item>
                    <flux:navbar.item href="#">Sustainability</flux:navbar.item>
                    <flux:navbar.item href="#">QMS</flux:navbar.item>
                </flux:navbar>

                <button class="text-black focus:outline-none ml-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <flux:button variant="danger">More</flux:button>
            </div>
        </div>
    </div>
</nav>
</div>
</bod   y>
</html>
