<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-12">
                        <h1 class="text-4xl font-bold mb-4">Welcome to Our Blog</h1>
                        <p class="text-xl text-gray-600">Discover the latest insights and information across various categories.</p>
                    </div>

                    <!-- Categories Section -->
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold mb-6">Browse by Category</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                            @foreach(\App\Models\Category::withCount('articles')->get() as $category)
                                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-shadow p-4 text-center">
                                    <h3 class="font-semibold text-lg mb-2">{{ $category->name }}</h3>
                                    <p class="text-gray-500 text-sm mb-3">{{ $category->articles_count }} articles</p>
                                    <a href="{{ route('categories.show', $category->slug) }}"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">Browse Articles</a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Featured Articles Section -->
                    @if(isset($featured) && $featured->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold mb-6">Featured Articles</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="md:col-span-2">
                                    @php $mainFeature = $featured->shift(); @endphp
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                                        @if(isset($mainFeature->image) && $mainFeature->image)
                                            <img src="{{ asset($mainFeature->image) }}"
                                                alt="{{ $mainFeature->title }}"
                                                class="w-full h-80 object-cover">
                                        @else
                                            <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                                <h1 class="text-4xl font-bold text-white px-8 text-center">{{ $mainFeature->title }}</h1>
                                            </div>
                                        @endif
                                        <div class="p-6">
                                            <!-- Category and Level badges -->
                                            <div class="flex flex-wrap gap-2 mb-3">
                                                @if(isset($mainFeature->category) && $mainFeature->category)
                                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-semibold uppercase tracking-wide">
                                                    {{ $mainFeature->category->name }}
                                                </span>
                                                @endif

                                                @if(isset($mainFeature->level) && $mainFeature->level)
                                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold uppercase tracking-wide">
                                                    {{ $mainFeature->level->name }}
                                                </span>
                                                @endif
                                            </div>

                                            <h3 class="text-2xl font-bold mb-2">
                                                <a href="{{ route('articles.show', $mainFeature->slug) }}"
                                                class="text-blue-600 hover:text-blue-800">
                                                    {{ $mainFeature->title }}
                                                </a>
                                            </h3>
                                            <p class="text-gray-500 text-sm mb-3">
                                                By {{ $mainFeature->author }} • {{ $mainFeature->published_at->format('F j, Y') }}
                                            </p>
                                            <p class="text-gray-700 mb-4">{{ $mainFeature->summary }}</p>
                                            <a href="{{ route('articles.show', $mainFeature->slug) }}"
                                            class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @foreach($featured as $article)
                                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                                        @if(isset($article->image) && $article->image)
                                            <div class="relative overflow-hidden h-56">
                                                <img src="{{ asset($article->image) }}"
                                                    alt="{{ $article->title }}"
                                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-70"></div>
                                            </div>
                                        @else
                                            <div class="h-32 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-1M5 20a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M9 15L4 10m0 0l5-5m-5 5h12" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="p-6">
                                            <div class="flex items-center mb-3">
                                                @if(isset($article->category) && $article->category)
                                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-semibold uppercase tracking-wide">
                                                    {{ $article->category->name }}
                                                </span>
                                                @endif

                                                @if(isset($article->level) && $article->level)
                                                <span class="ml-2 inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold uppercase tracking-wide">
                                                    {{ $article->level->name }}
                                                </span>
                                                @endif

                                                <span class="mx-2 text-gray-300">•</span>
                                                <span class="text-gray-500 text-sm">{{ $article->published_at->format('F j, Y') }}</span>
                                            </div>

                                            <h2 class="text-xl font-bold mb-3 text-gray-800 line-clamp-2 group">
                                                <a href="{{ route('articles.show', $article->slug) }}"
                                                class="text-gray-800 hover:text-blue-600 transition-colors duration-200">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>

                                            <p class="text-gray-600 mb-5 line-clamp-3">{{ $article->summary }}</p>

                                            <div class="flex items-center justify-between mt-auto">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold">
                                                        {{ strtoupper(substr($article->author, 0, 1)) }}
                                                    </div>
                                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $article->author }}</span>
                                                </div>

                                                <a href="{{ route('articles.show', $article->slug) }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 transform hover:translate-x-1">
                                                    Read
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="text-center">
                        <a href="{{ route('articles.index') }}"
                        class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            View All Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
