@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mb-12">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our Blog</h1>
        <p class="text-xl text-gray-600">Discover the latest insights and information on various topics.</p>
    </div>

    @if($featured->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Featured Articles</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    @php $mainFeature = $featured->shift(); @endphp
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($mainFeature->image)
                            <img src="{{ asset($mainFeature->image) }}"
                                alt="{{ $mainFeature->title }}"
                                class="w-full h-80 object-cover">
                        @endif
                        <div class="p-6">
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
                    <x-article-card :article="$article" />
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
@endsection
