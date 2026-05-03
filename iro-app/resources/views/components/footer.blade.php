<footer class="bg-red-900 border-t-[6px] border-yellow-500 text-white pt-16 pb-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Top Section: 3 Columns --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">

            {{-- Column 1: Branding & Contact (Takes up more space) --}}
            <div class="md:col-span-5">
                <div class="flex items-center space-x-4 mb-6">
                    {{-- Make sure 'iro-seal.png' is in your public/images folder --}}
                    <img src="{{ asset('images/IMG_0518.PNG') }}" alt="WMSU IRO Seal" class="h-16 w-16 bg-white rounded-full p-1 shadow-md">
                    <div>
                        <h3 class="font-extrabold text-xl leading-tight tracking-wide text-white">WMSU IRO</h3>
                        <p class="text-white-400 text-xs font-bold uppercase tracking-widest mt-0.5">International Relations Office</p>
                    </div>
                </div>

                <p class="text-sm text-red-100 leading-relaxed mb-6 pr-4">
                    Connecting Western Mindanao State University to the world through global partnerships, academic exchange, and sustainable development initiatives.
                </p>

                <div class="space-y-3 text-sm text-red-200">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-white-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Normal Road, Baliwasan<br>Zamboanga City, 7000, Philippines</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-white-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:iro@wmsu.edu.ph" class="hover:text-white transition-colors">iro@wmsu.edu.ph</a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-white-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        {{-- Replace the dummy numbers with the actual IRO hotline --}}
                        <a href="tel:+63629911771" class="hover:text-white transition-colors">
                            (062) 991-1771
                        </a>
                    </div>
                </div>
            </div>

            {{-- Column 2: Explore Links --}}
            <div class="md:col-span-3 md:col-start-7">
                <h4 class="font-bold tracking-wider mb-6 text-white-400 uppercase text-sm">Explore</h4>
                <ul class="space-y-3 text-sm font-medium text-red-100">
                    <li><a href="/" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Home</a></li>
                    <li><a href="/about" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">About Us</a></li>
                    <li><a href="/academics" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Academics</a></li>
                    <li><a href="/global-affairs" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Global Affairs</a></li>
                </ul>
            </div>

            {{-- Column 3: Resources & Portals --}}
            <div class="md:col-span-3">
                <h4 class="font-bold tracking-wider mb-6 text-white-400 uppercase text-sm">Resources</h4>
                <ul class="space-y-3 text-sm font-medium text-red-100">
                    <li><a href="/izn-programs" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">IZN Partnerships</a></li>
                    <li><a href="/sustainability" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Sustainability & SDGs</a></li>
                    <li><a href="/news" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">News & Announcements</a></li>

                    {{-- Subtle Admin Login Link --}}
                    <li class="pt-4 mt-4 border-t border-red-800/50">
                        <a href="/login" class="text-red-300 hover:text-white text-xs uppercase tracking-widest flex items-center transition-colors">
                            <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Admin Portal
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Bottom Bar: Copyright & Socials --}}
        <div class="mt-16 pt-8 border-t border-red-800 text-sm text-red-300 flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} Western Mindanao State University. All rights reserved.</p>

            {{-- Social Media Icons --}}
            <div class="flex space-x-5 mt-4 md:mt-0">
                <a href="https://www.facebook.com/profile.php?id=61578906420658" class="text-red-300 hover:text-white transition-colors">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                {{-- Add more social icons here if the IRO has Twitter, Instagram, etc. --}}
            </div>
        </div>

    </div>
</footer>
