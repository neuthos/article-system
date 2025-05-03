@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <x-article-detail :article="$article" />
@endsection
