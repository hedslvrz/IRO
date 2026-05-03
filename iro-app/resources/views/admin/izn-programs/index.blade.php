<x-layouts::app.sidebar>
    <flux:main>

        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-900 leading-tight">
                {{ __('Manage IZN Programs') }}
            </h2>
        </div>


    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 rounded-r-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- SECTION 1: CERTIFICATIONS --}}
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">IRO Seals & Certifications</h3>
                    <a href="{{ route('izn-programs.certifications.create') }}" class="inline-flex items-center bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition shadow-sm text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add Certification
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-700">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Logo</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($certifications as $cert)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            @if($cert->logo_path)
                                                <img src="{{ asset('storage/' . $cert->logo_path) }}" alt="Logo" class="h-10 w-10 rounded-md object-contain border">
                                            @else
                                                <span class="text-gray-400 text-xs">No Logo</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-3 text-sm font-semibold text-gray-900">{{ $cert->name }}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('izn-programs.certifications.edit', $cert->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form action="{{ route('izn-programs.certifications.destroy', $cert->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this certification?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">No certifications found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: PARTNERSHIPS (Below Certifications) --}}
            <div class="mt-12">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Partnership Highlights</h3>
                    <a href="{{ route('izn-programs.partnerships.create') }}" class="inline-flex items-center bg-gray-800 hover:bg-black text-white font-semibold py-2 px-4 rounded-md transition shadow-sm text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add Partnership Post
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Image</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Post Title</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($partnerships as $post)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            @if($post->image_path)
                                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image" class="h-10 w-16 rounded-md object-cover border">
                                            @elseif($post->video_path)
                                                <video class="h-10 w-16 rounded-md object-cover border bg-black" muted>
                                                    <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                                                </video>
                                            @else
                                                <span class="text-gray-400 text-xs">No Media</span>
                                            @endif  
                                        </td>
                                        <td class="px-6 py-3 text-sm font-semibold text-gray-900">{{ $post->title }}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('izn-programs.partnerships.edit', $post->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form action="{{ route('izn-programs.partnerships.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this post?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">No partnership posts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</flux:main>
</x-layouts::app.sidebar>
