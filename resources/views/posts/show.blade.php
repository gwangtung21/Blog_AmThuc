@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mb-4">
    @endif

    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Quay lại danh sách</a>
</div>
@endsection
