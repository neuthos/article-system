@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <x-article-list :articles="$articles" title="All Articles" />
@endsection
