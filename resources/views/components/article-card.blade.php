<div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px] border border-gray-100">
    @if($article->image)
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
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-semibold uppercase tracking-wide">Article</span>
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
