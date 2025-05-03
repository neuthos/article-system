<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-16 after:h-1 after:bg-blue-600 after:rounded-full">
            {{ $title ?? 'Latest Articles' }}
        </h1>

        <div class="relative">
            <input type="text" placeholder="Search articles..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <x-article-card :article="$article" />
        @empty
            <div class="col-span-3 bg-gray-50 rounded-xl p-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-1" />
                </svg>
                <p class="text-xl font-medium text-gray-600">No articles found</p>
                <p class="text-gray-500 mt-2">Check back later for new content</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $articles->links('vendor.pagination.tailwind') }}
    </div>
</div>
