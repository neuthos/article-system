<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-12">
                        <h1 class="text-4xl font-bold mb-4">All Categories</h1>
                        <p class="text-xl text-gray-600">Browse articles by category</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($categories as $category)
                            <div class="bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                                <div class="h-24 bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <h2 class="text-3xl font-bold text-white">{{ $category->name }}</h2>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-600 mb-5">{{ $category->description }}</p>

                                    <div class="flex items-center justify-between mt-auto">
                                        <span class="text-sm text-gray-500">{{ $category->articles_count }} articles</span>

                                        <a href="{{ route('categories.show', $category->slug) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 transform hover:translate-x-1">
                                            Browse
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
            </div>
        </div>
    </div>
</x-app-layout>
