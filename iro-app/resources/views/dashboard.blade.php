<x-layouts::app :title="__('Dashboard')">

        <h2 class="font-bold text-2xl text-red-900 leading-tight">
            {{ __('IRO Dashboard') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- 1. AT A GLANCE METRICS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Metric Card 1: Partnerships --}}
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6 flex items-center group hover:border-red-500 transition-colors">
                    <div class="p-3 rounded-lg bg-red-50 text-red-700 mr-4 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Active Partnerships</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $partnershipsCount }}</p>
                    </div>
                </div>

                {{-- Metric Card 2: Global Services (This one is live right now!) --}}
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6 flex items-center group hover:border-yellow-500 transition-colors">
                    <div class="p-3 rounded-lg bg-yellow-50 text-yellow-700 mr-4 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Global Services</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $servicesCount }}</p>
                    </div>
                </div>

                {{-- Metric Card 3: News --}}
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6 flex items-center group hover:border-blue-500 transition-colors">
                    <div class="p-3 rounded-lg bg-blue-50 text-blue-700 mr-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">News Articles</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $newsCount }}</p>
                    </div>
                </div>

                {{-- Metric Card 4: Certifications --}}
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6 flex items-center group hover:border-green-500 transition-colors">
                    <div class="p-3 rounded-lg bg-green-50 text-green-700 mr-4 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Certifications</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $certificationsCount }}</p>
                    </div>
                </div>
            </div>

            {{-- 2. SPLIT LAYOUT (Activity & Shortcuts) --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Side: Recent Activity (Takes up 2/3 of the space) --}}
                <div class="lg:col-span-2 bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">System Overview</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Welcome back to the IRO Admin Panel. Use the sidebar to manage your internationalization programs, global affairs services, and website settings.</p>

                        {{-- A visual placeholder for a future chart or activity feed --}}
                        <div class="h-48 rounded-lg border-2 border-dashed border-gray-200 flex items-center justify-center bg-gray-50">
                            <div class="text-center">
                                <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                <span class="text-sm text-gray-400 font-medium">Activity Chart (Coming Soon)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Quick Action Shortcuts (Takes up 1/3 of the space) --}}
                <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('home-settings.edit') }}" class="w-full flex items-center p-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-red-700 transition-colors shadow-sm">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Edit Home Page
                        </a>

                        <a href="{{ route('global-affairs.create') }}" class="w-full flex items-center p-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-red-700 transition-colors shadow-sm">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Add New Global Service
                        </a>

                        <a href="{{ route('about.edit') }}" class="w-full flex items-center p-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-red-700 transition-colors shadow-sm">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Update About Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::app>
