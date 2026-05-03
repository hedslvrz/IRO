<x-layouts::app.sidebar>
    <flux:main>
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b-2 border-[#990000] pb-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">News Management</h1>
                    <p class="text-gray-600 mt-1">Manage all IRO news articles, announcements, and updates.</p>
                </div>
                <a href="{{ route('admin.news.create') }}" class="bg-[#990000] hover:bg-red-900 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Create New Article
                </a>
            </div>

            <div class="mb-6 bg-gray-50 p-4 rounded-xl border border-gray-200">
                <form action="{{ route('admin.news.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                    <div class="grow relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>

                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Start typing to search articles..."
                               class="w-full pl-10 rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm text-sm"
                               oninput="clearTimeout(this.delay); this.delay = setTimeout(() => this.form.submit(), 500);"
                               {{ request('search') ? 'autofocus' : '' }}
                               onfocus="let val = this.value; this.value = ''; this.value = val;">
                    </div>

                    {{-- Only show the 'Clear' button if a search is currently active --}}
                    @if(request('search'))
                        <div class="flex gap-2">
                            <a href="{{ route('admin.news.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-lg transition-colors text-sm shadow-sm text-center flex items-center justify-center">
                                Clear Search
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-gray-900 font-semibold border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Publish Date</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($articles as $article)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $article->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-gray-200">
                                            {{ $article->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($article->is_published)
                                            <span class="text-green-600 bg-green-50 px-2.5 py-1 rounded-full text-xs font-bold flex items-center w-max gap-1">
                                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Published
                                            </span>
                                        @else
                                            <span class="text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full text-xs font-bold flex items-center w-max gap-1">
                                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span> Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->published_at ? $article->published_at->format('M d, Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-3">
                                        <a href="{{ route('admin.news.edit', $article) }}" class="text-blue-600 hover:text-blue-900 font-medium transition-colors">Edit</a>

                                        <form action="{{ route('admin.news.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this article? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium transition-colors">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        No news articles found. <a href="{{ route('admin.news.create') }}" class="text-[#990000] hover:underline font-medium">Create your first one!</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($articles->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $articles->links() }}
                    </div>
                @endif
            </div>

        </div>
    </flux:main>
</x-layouts::app.sidebar>
