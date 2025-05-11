@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="mb-12">
        <h1 class="text-4xl font-bold mb-4">{{ $category->name }}</h1>
        <p class="text-xl text-gray-600">{{ $category->description }}</p>
    </div>

    <x-article-list :articles="$articles" :title="'Articles in ' . $category->name" />
@endsection
