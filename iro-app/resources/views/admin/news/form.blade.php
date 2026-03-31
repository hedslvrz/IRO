<x-layouts::app.sidebar>
    <flux:main>
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

            <div class="mb-8 border-b-2 border-[#990000] pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ $article->exists ? 'Edit Article' : 'Create News Article' }}
                    </h1>
                    <p class="text-gray-600 mt-1">Publish news, updates, and announcements for the IRO portal.</p>
                </div>
                <a href="{{ route('admin.news.index') }}" class="text-gray-500 hover:text-[#990000] font-medium transition-colors">
                    &larr; Back to List
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="font-bold text-sm">Please fix the following errors:</h3>
                    </div>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $article->exists ? route('admin.news.update', $article) : route('admin.news.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-6">

                @csrf
                @if($article->exists)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Article Title</label>
                        <input type="text" name="title" value="{{ old('title', $article->title) }}" required
                               class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">
                        @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <select name="category" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">
                            <option value="General" {{ old('category', $article->category) == 'General' ? 'selected' : '' }}>General</option>
                            <option value="Partnerships" {{ old('category', $article->category) == 'Partnerships' ? 'selected' : '' }}>Partnerships</option>
                            <option value="Mobility" {{ old('category', $article->category) == 'Mobility' ? 'selected' : '' }}>Mobility</option>
                            <option value="Research" {{ old('category', $article->category) == 'Research' ? 'selected' : '' }}>Research</option>
                        </select>
                    </div>
                </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Author</label>
                        <input type="text" name="author" value="{{ old('author', $article->author) }}" placeholder="e.g. Jane Doe"
                            class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">
                    </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Short Excerpt (Shows on landing page cards)</label>
                    <textarea name="excerpt" rows="2" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">{{ old('excerpt', $article->excerpt) }}</textarea>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lede (Introductory paragraph)</label>
                    <textarea name="lede" rows="3" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">{{ old('lede', $article->lede) }}</textarea>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nut Graf (Context / 'Why this matters')</label>
                    <textarea name="nut_graf" rows="3" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">{{ old('nut_graf', $article->nut_graf) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Body (Full Article Content)</label>
                    <textarea name="content" rows="8" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">{{ old('content', $article->content) }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">Later, we can easily upgrade this box to a rich-text editor (WYSIWYG).</p>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Notable Quote (Optional Pull-quote)</label>
                    <textarea name="quote" rows="2" class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm">{{ old('quote', $article->quote) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-gray-100 pt-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cover Image</label>
                        @if($article->cover_image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="Current Image" class="h-32 rounded-lg object-cover">
                            </div>
                        @endif
                        <input type="file" name="cover_image" accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-[#990000] hover:file:bg-red-100">

                        <label class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Image Caption / Credits</label>
                        <input type="text" name="image_caption" value="{{ old('image_caption', $article->image_caption) }}" placeholder="e.g. Photo by John Smith / IRO Media"
                               class="w-full rounded-lg border-gray-300 focus:border-[#990000] focus:ring-[#990000] shadow-sm text-sm">
                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <label class="block text-sm font-semibold text-gray-700 mb-4">Publishing Status</label>

                        <label class="flex items-center space-x-3 mb-4 cursor-pointer">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-[#990000] focus:ring-[#990000] w-5 h-5">
                            <span class="text-gray-900 font-medium">Publish this article to the live site</span>
                        </label>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Publish Date (Optional)</label>
                            <input type="date" name="published_at"
                                   value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d') : '') }}"
                                   class="w-full rounded-lg border-gray-300 text-sm focus:border-[#990000] focus:ring-[#990000] shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" class="bg-[#990000] hover:bg-red-900 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-colors">
                        {{ $article->exists ? 'Save Changes' : 'Create Article' }}
                    </button>
                </div>
            </form>

        </div>
    </flux:main>
</x-layouts::app.sidebar>
